<?php

namespace App\Http\Controllers\Twill;

use A17\Twill\Models\Contracts\TwillModelContract;
use A17\Twill\Services\Listings\Columns\Text;
use A17\Twill\Services\Listings\TableColumns;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Http\Controllers\Admin\ModuleController as BaseModuleController;

use Illuminate\Support\Facades\Cache;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use App\Models\Slugs\BlogSlug;

class BlogController extends BaseModuleController
{
    protected $moduleName = "blogs";
    /**
     * Get accurate api data for the module
     */
    public function apiIndex($slug)
    {
        $previewing = request()->has("preview_token");

        if ($previewing) {
            $blog = Cache::get(request("preview_token"));
        } else {
            $blog = Blog::where("published", 1)
                ->whereHas("slugs", function ($query) use ($slug) {
                    $query->where("slug", $slug);
                })
                ->first();
        }

        return $blog ? new BlogResource($blog) : abort(404);
    }

    public function slugs()
    {
        return BlogSlug::whereIn(
            "blog_id",
            Blog::where("published", 1)->pluck("id")
        )->pluck("slug");
    }

    /**
     * This method can be used to enable/disable defaults. See setUpController in the docs for available options.
     */
    protected function setUpController(): void
    {
        $this->enableDuplicate();
        $this->enableReorder();
        $this->enableFeature();
    }

    /**
     * See the table builder docs for more information. If you remove this method you can use the blade files.
     * When using twill:module:make you can specify --bladeForm to use a blade form instead.
     */
    public function getForm(TwillModelContract $model): Form
    {
        $form = parent::getForm($model);

        return $form;
    }

    /**
     * This is an example and can be removed if no modifications are needed to the table.
     */
    protected function additionalIndexTableColumns(): TableColumns
    {
        $table = parent::additionalIndexTableColumns();

        $table->add(
            Text::make()
                ->field("description")
                ->title("Description")
        );

        return $table;
    }
}
