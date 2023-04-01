<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasFiles;
use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Behaviors\HasPosition;
use A17\Twill\Models\Behaviors\Sortable;
use A17\Twill\Models\Model;

class Review extends Model implements Sortable
{
    use HasMedias, HasFiles, HasRevisions, HasPosition;

    protected $fillable = [
        "published",
        "title",
        "content",
        "date",
        "stars",
        "author",
        "position",
    ];
    public $dates = ["date"];
}
