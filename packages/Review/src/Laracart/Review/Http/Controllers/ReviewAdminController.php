<?php

namespace Laracart\Review\Http\Controllers;

use App\Http\Controllers\AdminController as BaseController;
use Form;
use Laracart\Review\Http\Requests\ReviewRequest;
use Laracart\Review\Interfaces\ReviewRepositoryInterface;
use Laracart\Review\Models\Review;

/**
 * Admin web controller class.
 */
class ReviewAdminController extends BaseController
{
    // use ReviewWorkflow;
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
     * @return Response
     */
    public function index(ReviewRequest $request)
    {
        if ($request->wantsJson()) {
            return $this->getJson($request);
        }
        $this   ->theme->prependTitle(trans('review::review.names').' :: ');
        return $this->theme->of('review::admin.review.index')->render();
    }

    /**
     * Display a list of review.
     *
     * @return Response
     */
    public function getJson(ReviewRequest $request)
    {
        $pageLimit = $request->input('pageLimit');

        $reviews  = $this->repository
                ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
                ->setPresenter('\\Laracart\\Review\\Repositories\\Presenter\\ReviewListPresenter')
                ->scopeQuery(function($query){
                    return $query->orderBy('id','DESC');
                })->paginate($pageLimit);
        $reviews['recordsTotal']    = $reviews['meta']['pagination']['total'];
        $reviews['recordsFiltered'] = $reviews['meta']['pagination']['total'];
        $reviews['request']         = $request->all();
        return response()->json($reviews, 200);

    }

    /**
     * Display review.
     *
     * @param Request $request
     * @param Model   $review
     *
     * @return Response
     */
    public function show(ReviewRequest $request, Review $review)
    {
        if (!$review->exists) {
            return response()->view('review::admin.review.new', compact('review'));
        }

        Form::populate($review);
        return response()->view('review::admin.review.show', compact('review'));
    }

    /**
     * Show the form for creating a new review.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(ReviewRequest $request)
    {

        $review = $this->repository->newInstance([]);

        Form::populate($review);

        return response()->view('review::admin.review.create', compact('review'));

    }

    /**
     * Create new review.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(ReviewRequest $request)
    {
        try {
            $attributes             = $request->all();
            $attributes['user_id']  = user_id('admin.web');
            $review          = $this->repository->create($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('review::review.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/review/review/'.$review->getRouteKey())
            ], 201);


        } catch (Exception $e) {
            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
            ], 400);
        }
    }

    /**
     * Show review for editing.
     *
     * @param Request $request
     * @param Model   $review
     *
     * @return Response
     */
    public function edit(ReviewRequest $request, Review $review)
    {
        Form::populate($review);
        return  response()->view('review::admin.review.edit', compact('review'));
    }

    /**
     * Update the review.
     *
     * @param Request $request
     * @param Model   $review
     *
     * @return Response
     */
    public function update(ReviewRequest $request, Review $review)
    {
        try {

            $attributes = $request->all();

            $review->update($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('review::review.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/review/review/'.$review->getRouteKey())
            ], 201);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/review/review/'.$review->getRouteKey()),
            ], 400);

        }
    }

    /**
     * Remove the review.
     *
     * @param Model   $review
     *
     * @return Response
     */
    public function destroy(ReviewRequest $request, Review $review)
    {

        try {

            $t = $review->delete();

            return response()->json([
                'message'  => trans('messages.success.deleted', ['Module' => trans('review::review.name')]),
                'code'     => 202,
                'redirect' => trans_url('/admin/review/review/0'),
            ], 202);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/review/review/'.$review->getRouteKey()),
            ], 400);
        }
    }

}
