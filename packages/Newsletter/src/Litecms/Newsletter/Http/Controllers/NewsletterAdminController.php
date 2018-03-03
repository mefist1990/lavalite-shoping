<?php

namespace Litecms\Newsletter\Http\Controllers;

use App\Http\Controllers\AdminController as BaseController;
use Form;
use Litecms\Newsletter\Http\Requests\NewsletterRequest;
use Litecms\Newsletter\Interfaces\NewsletterRepositoryInterface;
use Litecms\Newsletter\Models\Newsletter;

/**
 * Admin web controller class.
 */
class NewsletterAdminController extends BaseController
{
    // use NewsletterWorkflow;
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
        parent::__construct();
    }

    /**
     * Display a list of newsletter.
     *
     * @return Response
     */
    public function index(NewsletterRequest $request)
    {
        if ($request->wantsJson()) {
            return $this->getJson($request);
        }
        $this   ->theme->prependTitle(trans('newsletter::newsletter.names').' :: ');
        return $this->theme->of('newsletter::admin.newsletter.index')->render();
    }

    /**
     * Display a list of newsletter.
     *
     * @return Response
     */
    public function getJson(NewsletterRequest $request)
    {
        $pageLimit = $request->input('pageLimit');

        $newsletters  = $this->repository
                ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
                ->setPresenter('\\Litecms\\Newsletter\\Repositories\\Presenter\\NewsletterListPresenter')
                ->scopeQuery(function($query){
                    return $query->orderBy('id','DESC');
                })->paginate($pageLimit);
        $newsletters['recordsTotal']    = $newsletters['meta']['pagination']['total'];
        $newsletters['recordsFiltered'] = $newsletters['meta']['pagination']['total'];
        $newsletters['request']         = $request->all();
        return response()->json($newsletters, 200);

    }

    /**
     * Display newsletter.
     *
     * @param Request $request
     * @param Model   $newsletter
     *
     * @return Response
     */
    public function show(NewsletterRequest $request, Newsletter $newsletter)
    {
        if (!$newsletter->exists) {
            return response()->view('newsletter::admin.newsletter.new', compact('newsletter'));
        }

        Form::populate($newsletter);
        return response()->view('newsletter::admin.newsletter.show', compact('newsletter'));
    }

    /**
     * Show the form for creating a new newsletter.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(NewsletterRequest $request)
    {

        $newsletter = $this->repository->newInstance([]);

        Form::populate($newsletter);

        return response()->view('newsletter::admin.newsletter.create', compact('newsletter'));

    }

    /**
     * Create new newsletter.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(NewsletterRequest $request)
    {
        try {
            $attributes             = $request->all();
            $attributes['user_id']  = user_id('admin.web');
            $newsletter          = $this->repository->create($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('newsletter::newsletter.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/newsletter/newsletter/'.$newsletter->getRouteKey())
            ], 201);


        } catch (Exception $e) {
            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
            ], 400);
        }
    }

    /**
     * Show newsletter for editing.
     *
     * @param Request $request
     * @param Model   $newsletter
     *
     * @return Response
     */
    public function edit(NewsletterRequest $request, Newsletter $newsletter)
    {
        Form::populate($newsletter);
        return  response()->view('newsletter::admin.newsletter.edit', compact('newsletter'));
    }

    /**
     * Update the newsletter.
     *
     * @param Request $request
     * @param Model   $newsletter
     *
     * @return Response
     */
    public function update(NewsletterRequest $request, Newsletter $newsletter)
    {
        try {

            $attributes = $request->all();

            $newsletter->update($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('newsletter::newsletter.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/newsletter/newsletter/'.$newsletter->getRouteKey())
            ], 201);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/newsletter/newsletter/'.$newsletter->getRouteKey()),
            ], 400);

        }
    }

    /**
     * Remove the newsletter.
     *
     * @param Model   $newsletter
     *
     * @return Response
     */
    public function destroy(NewsletterRequest $request, Newsletter $newsletter)
    {

        try {

            $t = $newsletter->delete();

            return response()->json([
                'message'  => trans('messages.success.deleted', ['Module' => trans('newsletter::newsletter.name')]),
                'code'     => 202,
                'redirect' => trans_url('/admin/newsletter/newsletter/0'),
            ], 202);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/newsletter/newsletter/'.$newsletter->getRouteKey()),
            ], 400);
        }
    }

}
