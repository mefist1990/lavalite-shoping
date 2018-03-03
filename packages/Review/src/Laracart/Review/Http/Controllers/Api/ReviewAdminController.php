<?php

namespace Laracart\Review\Http\Controllers\Api;

use App\Http\Controllers\Api\AdminController as BaseController;
use Laracart\Review\Http\Requests\ReviewRequest;
use Laracart\Review\Interfaces\ReviewRepositoryInterface;
use Laracart\Review\Models\Review;

/**
 * Admin API controller class.
 */
class ReviewAdminController extends BaseController
{
    /**
     * Initialize review controller.
     *
     * @param type ReviewRepositoryInterface $review
     *
     * @return type
     */
    public function __construct(ReviewRepositoryInterface $review)
    {
        $this->repository = $review;
        parent::__construct();
    }

    /**
     * Display a list of review.
     *
     * @return json
     */
    public function index(ReviewRequest $request)
    {
        $reviews  = $this->repository
            ->setPresenter('\\Laracart\\Review\\Repositories\\Presenter\\ReviewListPresenter')
            ->scopeQuery(function($query){
                return $query->orderBy('id','DESC');
            })->all();
        $reviews['code'] = 2000;
        return response()->json($reviews) 
                         ->setStatusCode(200, 'INDEX_SUCCESS');

    }

    /**
     * Display review.
     *
     * @param Request $request
     * @param Model   Review
     *
     * @return Json
     */
    public function show(ReviewRequest $request, Review $review)
    {
        $review         = $review->presenter();
        $review['code'] = 2001;
        return response()->json($review)
                         ->setStatusCode(200, 'SHOW_SUCCESS');;

    }

    /**
     * Show the form for creating a new review.
     *
     * @param Request $request
     *
     * @return json
     */
    public function create(ReviewRequest $request, Review $review)
    {
        $review         = $review->presenter();
        $review['code'] = 2002;
        return response()->json($review)
                         ->setStatusCode(200, 'CREATE_SUCCESS');

    }

    /**
     * Create new review.
     *
     * @param Request $request
     *
     * @return json
     */
    public function store(ReviewRequest $request)
    {
        try {
            $attributes             = $request->all();
            $attributes['user_id']  = user_id('admin.api');
            $review          = $this->repository->create($attributes);
            $review          = $review->presenter();
            $review['code']  = 2004;

            return response()->json($review)
                             ->setStatusCode(201, 'STORE_SUCCESS');
        } catch (Exception $e) {
            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 4004,
            ])->setStatusCode(400, 'STORE_ERROR');
        }
    }

    /**
     * Show review for editing.
     *
     * @param Request $request
     * @param Model   $review
     *
     * @return json
     */
    public function edit(ReviewRequest $request, Review $review)
    {
        $review         = $review->presenter();
        $review['code'] = 2003;
        return response()-> json($review)
                        ->setStatusCode(200, 'EDIT_SUCCESS');;
    }

    /**
     * Update the review.
     *
     * @param Request $request
     * @param Model   $review
     *
     * @return json
     */
    public function update(ReviewRequest $request, Review $review)
    {
        try {

            $attributes = $request->all();

            $review->update($attributes);
            $review         = $review->presenter();
            $review['code'] = 2005;

            return response()->json($review)
                             ->setStatusCode(201, 'UPDATE_SUCCESS');


        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 4005,
            ])->setStatusCode(400, 'UPDATE_ERROR');

        }
    }

    /**
     * Remove the review.
     *
     * @param Request $request
     * @param Model   $review
     *
     * @return json
     */
    public function destroy(ReviewRequest $request, Review $review)
    {
        try {
            $t = $review->delete();

            return response()->json([
                'message'  => trans('messages.success.delete', ['Module' => trans('review::review.name')]),
                'code'     => 2006
            ])->setStatusCode(202, 'DESTROY_SUCCESS');

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 4006,
            ])->setStatusCode(400, 'DESTROY_ERROR');
        }
    }
}
