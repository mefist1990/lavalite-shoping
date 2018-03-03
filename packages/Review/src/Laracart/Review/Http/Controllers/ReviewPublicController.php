<?php

namespace Laracart\Review\Http\Controllers;

use App\Http\Controllers\PublicController as BaseController;
use Laracart\Review\Interfaces\ReviewRepositoryInterface;

class ReviewPublicController extends BaseController
{
    // use ReviewWorkflow;

    /**
     * Constructor.
     *
     * @param type \Laracart\Review\Interfaces\ReviewRepositoryInterface $review
     *
     * @return type
     */
    public function __construct(ReviewRepositoryInterface $review)
    {
        $this->repository = $review;
        parent::__construct();
    }

    /**
     * Show review's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function index()
    {
        $reviews = $this->repository
        ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
        ->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();

        return $this->theme->of('review::public.review.index', compact('reviews'))->render();
    }

    /**
     * Show review.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show($slug)
    {
        $review = $this->repository->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);

        return $this->theme->of('review::public.review.show', compact('review'))->render();
    }

}
