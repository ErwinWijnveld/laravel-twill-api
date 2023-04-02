<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;
use App\Http\Controllers\BlockController;

class MenuResource extends JsonResource
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
                "blocks" => BlockController::getBlocks($this)["block_data"],
            ];
        } catch (\Exception $e) {
            return response()->json($e);
        }
    }
}
