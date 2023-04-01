<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\Behaviors\HandleFiles;
use A17\Twill\Repositories\Behaviors\HandleRevisions;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\Review;

class ReviewRepository extends ModuleRepository
{
    use HandleMedias, HandleFiles, HandleRevisions;

    public function __construct(Review $model)
    {
        $this->model = $model;
    }
}
