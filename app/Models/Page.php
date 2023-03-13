<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasBlocks;
use A17\Twill\Models\Behaviors\HasSlug;
use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasFiles;
use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Model;

class Page extends Model
{
    use HasBlocks, HasSlug, HasMedias, HasFiles, HasRevisions;

    protected $fillable = [
        "published",
        "title",
        "seo_title",
        "seo_description",
    ];

    public $slugAttributes = ["title"];
}
