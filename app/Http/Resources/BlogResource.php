<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\MenuCollection;
use App\Models\Menu;
use A17\Twill\Services\MediaLibrary\ImageService;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Arr;
use App\Http\Controllers\BlockController;

class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        try {
            $image = $this->medias->first();
            $this->image = $image
                ? ImageService::getRawUrl(optional($image)->uuid)
                : null;

            return [
                "id" => $this->id,
                "slug" => $this->slug,
                "title" => $this->title,
                "blocks" => BlockController::getBlocks($this)["block_data"],
                "created_at" => $this->created_at,
                "updated_at" => $this->updated_at,
                "meta" => [
                    "title" => $this->seo_title ?? $this->title,
                    "description" => $this->seo_description ?? null,
                ],
                "image" => $this->image,
                "author" => $this->author,
                "date" => $this->date,
                "content" => $this->content,
                "excerpt" => $this->excerpt,
                "button_title" => $this->button_title,
                "button_link" => $this->button_link,
                "menus" => new MenuCollection(Menu::all()),
            ];
        } catch (\Exception $e) {
            return response()->json($e);
        }
    }
}
