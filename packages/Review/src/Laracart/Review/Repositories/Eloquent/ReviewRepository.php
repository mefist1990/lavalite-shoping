<?php

namespace Laracart\Review\Repositories\Eloquent;

use Laracart\Review\Interfaces\ReviewRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class ReviewRepository extends BaseRepository implements ReviewRepositoryInterface
{


    public function boot()
    {
        $this->fieldSearchable = config('laracart.review.review.search');

    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('laracart.review.review.model');
    }
}
