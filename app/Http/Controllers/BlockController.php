<?php

namespace App\Http\Controllers;

use A17\Twill\Services\MediaLibrary\ImageService;

class BlockController extends Controller
{
    public static $idArray = [];
    public static $firstLayerIdArray = [];
    public static $removeableFirstLayerIdArray = [];
    public static $currentReq = false;

    /**
     * Blocks
     * @param Request $request
     * @return Response
     */
    public static function getBlocks($current)
    {
        self::$currentReq = $current;
        $blocks_data = [];
        if ($current->blocks()->get()) {
            $blocks = $current->blocks()->get();

            $blocks_data = $blocks->map(function ($block) {
                // check if id is already in array
                if (in_array($block->id, self::$idArray)) {
                    return;
                }

                // add id to first layer id array
                self::$firstLayerIdArray[] = $block->id;

                return self::getBlockData($block);
            });

            // remove blocks with id matching to removeable first layer id array from blocks data
            foreach ($blocks_data as $index => $block) {
                // if block is null, unset
                if (is_null($block)) {
                    unset($blocks_data[$index]);
                }

                // if array key is in removeable first layer id array, unset
                if (is_array($block) && isset($block["id"])) {
                    if (
                        in_array(
                            $block["id"],
                            self::$removeableFirstLayerIdArray
                        )
                    ) {
                        unset($blocks_data[$index]);
                    }
                }
            }

            // reindex array
            $blocks_data = array_values($blocks_data->toArray());

            return [
                "block_data" => $blocks_data,
            ];
        }

        return null;
    }

    /**
     * Get block data
     * @param Block $block
     * @return array
     */
    public static function recursiveChildren($blocks)
    {
        // if blocks is empty array, return null
        if (count($blocks) == 0) {
            return null;
        }

        $blocks_data = [];
        foreach ($blocks as $block) {
            // check if id is already in array
            if (in_array($block->id, self::$idArray)) {
                continue;
            }
            // add to id array
            self::$idArray[] = $block->id;

            // if id is in first layer id array, add to removeable first layer id array
            if (in_array($block->id, self::$firstLayerIdArray)) {
                self::$removeableFirstLayerIdArray[] = $block->id;
            }

            $blocks_data[] = self::getBlockData($block);
        }
        // sort blocks with different values of key "type" into different arrays
        $blocks_data = collect($blocks_data)
            ->groupBy("type")
            ->toArray();

        return $blocks_data;
    }

    /**
     * Get block data
     * @param Block $block
     * @return array
     */
    public static function getBlockData($block)
    {
        // get medias data
        $block->medias = $block->medias->map(function ($image) {
            return [
                "role" => optional($image)->pivot->role,
                "metadatas" => json_decode(
                    optional($image)->pivot->metadatas,
                    true
                ),
                "url" => $image
                    ? ImageService::getRawUrl(optional($image)->uuid)
                    : null,
                "alt" => optional($image)->alt_text,
                "width" => optional($image)->width,
                "height" => optional($image)->height,
            ];
        });

        $block->medias = collect($block->medias)
            ->groupBy("role")
            ->toArray();

        // if medias is empty array, set to null
        if (count($block->medias) == 0) {
            $block->medias = null;
        }

        // get files data
        $block->files = $block->files->map(function ($file) {
            return [
                "url" => $file
                    ? ImageService::getRawUrl(optional($file)->uuid)
                    : null,
                "role" => optional($file)->pivot->role,
            ];
        });

        $block->files = collect($block->files)
            ->groupBy("role")
            ->toArray();

        // if files is empty array, set to null
        if (count($block->files) == 0) {
            $block->files = null;
        }

        // return all relevant block data
        return [
            "id" => $block->id,
            "type" => $block->type,
            "content" => self::getContent($block->content),
            "position" => $block->position,
            "children" => self::recursiveChildren($block->children),
            "medias" => $block->medias,
            "files" => $block->files,
            "extra_data" => self::extraBlockData($block),
        ];
    }

    /**
     * Extra block data
     * @param Block $block
     * @return Response
     */
    public static function extraBlockData($block)
    {
        switch ($block->type) {
            // case "featured-blogs":
            //     return FeaturedBlogs::getBrowserBlogsDynamic($block);

            default:
                return null;
        }
    }

    /**
     * Get content
     * @param Content $content
     * @return Response
     */
    public static function getContent($content)
    {
        // Get browser data items
        if (array_key_exists("browsers", $content)) {
            $browsers = $content["browsers"];
            foreach ($browsers as $key => $value) {
                // key make first letter uppercase
                $key_uppercase = ucfirst($key);
                // if ends with s remove s
                if (substr($key_uppercase, -1) == "s") {
                    $key_uppercase = substr($key_uppercase, 0, -1);
                }
                // get items that match the value
                $model = "App\Models\\$key_uppercase";
                $items = $model::whereIn("id", $value)->get();
                // get resource
                $resource = "App\Http\Resources\\{$key_uppercase}Resource";
                $items = $resource::collection($items);

                $content["browsers"][$key] = $items;
            }
        }
        return $content;
    }
}
