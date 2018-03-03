<?php

namespace Litecms\Newsletter\Http\Controllers\Api;

use App\Http\Controllers\Api\UserController as BaseController;
use Litecms\Newsletter\Http\Requests\NewsletterRequest;
use Litecms\Newsletter\Interfaces\NewsletterRepositoryInterface;
use Litecms\Newsletter\Models\Newsletter;

/**
 * User API controller class.
 */
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
     * Display a list of newsletter.
     *
     * @return json
     */
    public function index(NewsletterRequest $request)
    {
        $newsletters  = $this->repository
            ->setPresenter('\\Litecms\\Newsletter\\Repositories\\Presenter\\NewsletterListPresenter')
            ->scopeQuery(function($query){
                return $query->orderBy('id','DESC');
            })->all();
        $newsletters['code'] = 2000;
        return response()->json($newsletters) 
            ->setStatusCode(200, 'INDEX_SUCCESS');

    }

    /**
     * Display newsletter.
     *
     * @param Request $request
     * @param Model   Newsletter
     *
     * @return Json
     */
    public function show(NewsletterRequest $request, Newsletter $newsletter)
    {

        if ($newsletter->exists) {
            $newsletter         = $newsletter->presenter();
            $newsletter['code'] = 2001;
            return response()->json($newsletter)
                ->setStatusCode(200, 'SHOW_SUCCESS');;
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }

    }

    /**
     * Show the form for creating a new newsletter.
     *
     * @param Request $request
     *
     * @return json
     */
    public function create(NewsletterRequest $request, Newsletter $newsletter)
    {
        $newsletter         = $newsletter->presenter();
        $newsletter['code'] = 2002;
        return response()->json($newsletter)
            ->setStatusCode(200, 'CREATE_SUCCESS');
    }

    /**
     * Create new newsletter.
     *
     * @param Request $request
     *
     * @return json
     */
    public function store(NewsletterRequest $request)
    {
        try {
            $attributes             = $request->all();
            $attributes['user_id']  = user_id('admin.api');
            $newsletter          = $this->repository->create($attributes);
            $newsletter          = $newsletter->presenter();
            $newsletter['code']  = 2004;

            return response()->json($newsletter)
                ->setStatusCode(201, 'STORE_SUCCESS');
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'code'    => 4004,
            ])->setStatusCode(400, 'STORE_ERROR');
        }

    }

    /**
     * Show newsletter for editing.
     *
     * @param Request $request
     * @param Model   $newsletter
     *
     * @return json
     */
    public function edit(NewsletterRequest $request, Newsletter $newsletter)
    {
        if ($newsletter->exists) {
            $newsletter         = $newsletter->presenter();
            $newsletter['code'] = 2003;
            return response()-> json($newsletter)
                ->setStatusCode(200, 'EDIT_SUCCESS');;
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }
    }

    /**
     * Update the newsletter.
     *
     * @param Request $request
     * @param Model   $newsletter
     *
     * @return json
     */
    public function update(NewsletterRequest $request, Newsletter $newsletter)
    {
        try {

            $attributes = $request->all();

            $newsletter->update($attributes);
            $newsletter         = $newsletter->presenter();
            $newsletter['code'] = 2005;

            return response()->json($newsletter)
                ->setStatusCode(201, 'UPDATE_SUCCESS');


        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 4005,
            ])->setStatusCode(400, 'UPDATE_ERROR');

        }
    }

    /**
     * Remove the newsletter.
     *
     * @param Request $request
     * @param Model   $newsletter
     *
     * @return json
     */
    public function destroy(NewsletterRequest $request, Newsletter $newsletter)
    {

        try {

            $t = $newsletter->delete();

            return response()->json([
                'message'  => trans('messages.success.delete', ['Module' => trans('newsletter::newsletter.name')]),
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
