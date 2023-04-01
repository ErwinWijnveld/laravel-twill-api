<?php

namespace App\Blocks;

use App\Models\Review;

class FeaturedReviews
{
    public static function getReviewStats()
    {
        $reviews = Review::all();
        $reviewStats = [
            "total" => $reviews->count(),
            "average" => $reviews->avg("stars"),
            "stars" => [
                "1star" => $reviews->where("stars", 1)->count(),
                "2star" => $reviews->where("stars", 2)->count(),
                "3star" => $reviews->where("stars", 3)->count(),
                "4star" => $reviews->where("stars", 4)->count(),
                "5star" => $reviews->where("stars", 5)->count(),
            ],
        ];

        return $reviewStats;
    }
}
