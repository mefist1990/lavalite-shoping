<?php

namespace Laracart\Review\Http\Controllers;

use App\Http\Controllers\ClientController as BaseController;
use Form;
use Laracart\Review\Http\Requests\ReviewRequest;
use Laracart\Review\Interfaces\ReviewRepositoryInterface;
use Litepie\User\Interfaces\ClientRepositoryInterface;
use Laracart\Review\Models\Review;

class ReviewClientController extends BaseController
{
    /**
     * Initialize review controller.
     *
     * @param type ReviewRepositoryInterface $review
     *
     * @return type
     */
    public function __construct(ReviewRepositoryInterface $review,ClientRepositoryInterface $client)
    {
        $this->repository = $review;
         $this->client = $client;
        $this->repository
                ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
                ->pushCriteria(new \Laracart\Review\Repositories\Criteria\ReviewUserCriteria());
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(ReviewRequest $request)
    {
        $reviews = $this->repository->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();

        $this->theme->prependTitle(trans('review::review.names'));

        return $this->theme->of('review::user.review.index', compact('reviews'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Review $review
     *
     * @return Response
     */
    public function show(ReviewRequest $request, Review $review)
    {
        Form::populate($review);

        return $this->theme->of('review::user.review.show', compact('review'))->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(ReviewRequest $request)
    {

        $review = $this->repository->newInstance([]);
        Form::populate($review);

        $this->theme->prependTitle(trans('review::review.names'));
        return $this->theme->of('review::user.review.create', compact('review'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(ReviewRequest $request)
    { 
        try {
            $attributes = $request->all(); 
            $attributes['user_id'] = user_id();
            $review = $this->repository->create($attributes);

            return "true";

            return redirect(trans_url('/client/review/review'))
                -> with('message', trans('messages.success.created', ['Module' => trans('review::review.name')]))
                -> with('code', 201);

        } catch (Exception $e) {
            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param Review $review
     *
     * @return Response
     */
    public function edit(ReviewRequest $request, Review $review)
    {

        Form::populate($review);
        $this->theme->prependTitle(trans('review::review.names'));

        return $this->theme->of('review::user.review.edit', compact('review'))->render();
    }

    /**
     * Update the specified resource.
     *
     * @param Request $request
     * @param Review $review
     *
     * @return Response
     */
    public function update(ReviewRequest $request, Review $review)
    {
        try {
            $this->repository->update($request->all(), $review->getRouteKey());

            return redirect(trans_url('/client/review/review'))
                ->with('message', trans('messages.success.updated', ['Module' => trans('review::review.name')]))
                ->with('code', 204);

        } catch (Exception $e) {
            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);
        }
    }

    /**
     * Remove the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy(ReviewRequest $request, Review $review)
    {
        try {
            $this->repository->delete($review->getRouteKey());
            return redirect(trans_url('/client/review/review'))
                ->with('message', trans('messages.success.deleted', ['Module' => trans('review::review.name')]))
                ->with('code', 204);

        } catch (Exception $e) {

            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);

        }
    }
}
