<?php

namespace Laracart\Returns\Http\Controllers\Api;

use App\Http\Controllers\Api\UserController as BaseController;
use Laracart\Returns\Http\Requests\ReturnsRequest;
use Laracart\Returns\Interfaces\ReturnsRepositoryInterface;
use Laracart\Returns\Models\Returns;

/**
 * User API controller class.
 */
class ReturnsUserController extends BaseController
{
    /**
     * Initialize returns controller.
     *
     * @param type ReturnsRepositoryInterface $returns
     *
     * @return type
     */
    public function __construct(ReturnsRepositoryInterface $returns)
    {
        $this->repository = $returns;
        $this->repository
                ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
                ->pushCriteria(new \Laracart\Returns\Repositories\Criteria\ReturnsUserCriteria());
        parent::__construct();
    }

    /**
     * Display a list of returns.
     *
     * @return json
     */
    public function index(ReturnsRequest $request)
    {
        $returns  = $this->repository
            ->setPresenter('\\Laracart\\Returns\\Repositories\\Presenter\\ReturnsListPresenter')
            ->scopeQuery(function($query){
                return $query->orderBy('id','DESC');
            })->all();
        $returns['code'] = 2000;
        return response()->json($returns) 
            ->setStatusCode(200, 'INDEX_SUCCESS');

    }

    /**
     * Display returns.
     *
     * @param Request $request
     * @param Model   Returns
     *
     * @return Json
     */
    public function show(ReturnsRequest $request, Returns $returns)
    {

        if ($returns->exists) {
            $returns         = $returns->presenter();
            $returns['code'] = 2001;
            return response()->json($returns)
                ->setStatusCode(200, 'SHOW_SUCCESS');;
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }

    }

    /**
     * Show the form for creating a new returns.
     *
     * @param Request $request
     *
     * @return json
     */
    public function create(ReturnsRequest $request, Returns $returns)
    {
        $returns         = $returns->presenter();
        $returns['code'] = 2002;
        return response()->json($returns)
            ->setStatusCode(200, 'CREATE_SUCCESS');
    }

    /**
     * Create new returns.
     *
     * @param Request $request
     *
     * @return json
     */
    public function store(ReturnsRequest $request)
    {
        try {
            $attributes             = $request->all();
            $attributes['user_id']  = user_id('admin.api');
            $returns          = $this->repository->create($attributes);
            $returns          = $returns->presenter();
            $returns['code']  = 2004;

            return response()->json($returns)
                ->setStatusCode(201, 'STORE_SUCCESS');
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'code'    => 4004,
            ])->setStatusCode(400, 'STORE_ERROR');
        }

    }

    /**
     * Show returns for editing.
     *
     * @param Request $request
     * @param Model   $returns
     *
     * @return json
     */
    public function edit(ReturnsRequest $request, Returns $returns)
    {
        if ($returns->exists) {
            $returns         = $returns->presenter();
            $returns['code'] = 2003;
            return response()-> json($returns)
                ->setStatusCode(200, 'EDIT_SUCCESS');;
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }
    }

    /**
     * Update the returns.
     *
     * @param Request $request
     * @param Model   $returns
     *
     * @return json
     */
    public function update(ReturnsRequest $request, Returns $returns)
    {
        try {

            $attributes = $request->all();

            $returns->update($attributes);
            $returns         = $returns->presenter();
            $returns['code'] = 2005;

            return response()->json($returns)
                ->setStatusCode(201, 'UPDATE_SUCCESS');


        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 4005,
            ])->setStatusCode(400, 'UPDATE_ERROR');

        }
    }

    /**
     * Remove the returns.
     *
     * @param Request $request
     * @param Model   $returns
     *
     * @return json
     */
    public function destroy(ReturnsRequest $request, Returns $returns)
    {

        try {

            $t = $returns->delete();

            return response()->json([
                'message'  => trans('messages.success.delete', ['Module' => trans('returns::returns.name')]),
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
