<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\MenuCollection;
use App\Models\Menu;
use A17\Twill\Services\MediaLibrary\ImageService;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Arr;
use App\Http\Controllers\BlockController;

class ReviewResource extends JsonResource
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
            return [
                "id" => $this->id,
                "title" => $this->title,
                "author" => $this->author,
                "date" => $this->date,
                "content" => $this->content,
                "stars" => $this->stars,
            ];
        } catch (\Exception $e) {
            return response()->json($e);
        }
    }
}
