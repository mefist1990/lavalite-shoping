<?php

namespace Laracart\Review\Http\Controllers\Api;

use App\Http\Controllers\Api\PublicController as BaseController;
use Laracart\Review\Interfaces\ReviewRepositoryInterface;
use Laracart\Review\Repositories\Presenter\ReviewItemTransformer;

/**
 * Pubic API controller class.
 */
class ReviewPublicController extends BaseController
{
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
            ->setPresenter('\\Laracart\\Review\\Repositories\\Presenter\\ReviewListPresenter')
            ->scopeQuery(function($query){
                return $query->orderBy('id','DESC');
            })->paginate();

        $reviews['code'] = 2000;
        return response()->json($reviews)
                ->setStatusCode(200, 'INDEX_SUCCESS');
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
        $review = $this->repository
            ->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);

        if (!is_null($review)) {
            $review         = $this->itemPresenter($module, new ReviewItemTransformer);
            $review['code'] = 2001;
            return response()->json($review)
                ->setStatusCode(200, 'SHOW_SUCCESS');
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }

    }
}
