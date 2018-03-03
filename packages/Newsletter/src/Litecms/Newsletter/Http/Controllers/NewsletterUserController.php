<?php

namespace Litecms\Newsletter\Http\Controllers;

use App\Http\Controllers\UserController as BaseController;
use Form;
use Litecms\Newsletter\Http\Requests\NewsletterRequest;
use Litecms\Newsletter\Interfaces\NewsletterRepositoryInterface;
use Litecms\Newsletter\Models\Newsletter;

class NewsletterUserController extends BaseController
{
    /**
     * Initialize newsletter controller.
     *
     * @param type NewsletterRepositoryInterface $newsletter
     *
     * @return type
     */
    public function __construct(NewsletterRepositoryInterface $newsletter)
    {
        $this->repository = $newsletter;
        $this->repository
                ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
                ->pushCriteria(new \Litecms\Newsletter\Repositories\Criteria\NewsletterUserCriteria());
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(NewsletterRequest $request)
    {
        $newsletters = $this->repository->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();

        $this->theme->prependTitle(trans('newsletter::newsletter.names'));

        return $this->theme->of('newsletter::user.newsletter.index', compact('newsletters'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Newsletter $newsletter
     *
     * @return Response
     */
    public function show(NewsletterRequest $request, Newsletter $newsletter)
    {
        Form::populate($newsletter);

        return $this->theme->of('newsletter::user.newsletter.show', compact('newsletter'))->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(NewsletterRequest $request)
    {

        $newsletter = $this->repository->newInstance([]);
        Form::populate($newsletter);

        $this->theme->prependTitle(trans('newsletter::newsletter.names'));
        return $this->theme->of('newsletter::user.newsletter.create', compact('newsletter'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(NewsletterRequest $request)
    {
        try {
            $attributes = $request->all();
            $attributes['user_id'] = user_id();
            $newsletter = $this->repository->create($attributes);

            return redirect(trans_url('/user/newsletter/newsletter'))
                -> with('message', trans('messages.success.created', ['Module' => trans('newsletter::newsletter.name')]))
                -> with('code', 201);

        } catch (Exception $e) {
            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param Newsletter $newsletter
     *
     * @return Response
     */
    public function edit(NewsletterRequest $request, Newsletter $newsletter)
    {

        Form::populate($newsletter);
        $this->theme->prependTitle(trans('newsletter::newsletter.names'));

        return $this->theme->of('newsletter::user.newsletter.edit', compact('newsletter'))->render();
    }

    /**
     * Update the specified resource.
     *
     * @param Request $request
     * @param Newsletter $newsletter
     *
     * @return Response
     */
    public function update(NewsletterRequest $request, Newsletter $newsletter)
    {
        try {
            $this->repository->update($request->all(), $newsletter->getRouteKey());

            return redirect(trans_url('/user/newsletter/newsletter'))
                ->with('message', trans('messages.success.updated', ['Module' => trans('newsletter::newsletter.name')]))
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
    public function destroy(NewsletterRequest $request, Newsletter $newsletter)
    {
        try {
            $this->repository->delete($newsletter->getRouteKey());
            return redirect(trans_url('/user/newsletter/newsletter'))
                ->with('message', trans('messages.success.deleted', ['Module' => trans('newsletter::newsletter.name')]))
                ->with('code', 204);

        } catch (Exception $e) {

            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);

        }
    }
}
