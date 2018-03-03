<?php

namespace Laracart\Returns\Http\Controllers\Api;

use App\Http\Controllers\Api\UserController as BaseController;
use Laracart\Returns\Http\Requests\ReturnReasonRequest;
use Laracart\Returns\Interfaces\ReturnReasonRepositoryInterface;
use Laracart\Returns\Models\ReturnReason;

/**
 * User API controller class.
 */
class ReturnReasonUserController extends BaseController
{
    /**
     * Initialize return_reason controller.
     *
     * @param type ReturnReasonRepositoryInterface $return_reason
     *
     * @return type
     */
    public function __construct(ReturnReasonRepositoryInterface $return_reason)
    {
        $this->repository = $return_reason;
        $this->repository
                ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
                ->pushCriteria(new \Laracart\Returns\Repositories\Criteria\ReturnReasonUserCriteria());
        parent::__construct();
    }

    /**
     * Display a list of return_reason.
     *
     * @return json
     */
    public function index(ReturnReasonRequest $request)
    {
        $return_reasons  = $this->repository
            ->setPresenter('\\Laracart\\Returns\\Repositories\\Presenter\\ReturnReasonListPresenter')
            ->scopeQuery(function($query){
                return $query->orderBy('id','DESC');
            })->all();
        $return_reasons['code'] = 2000;
        return response()->json($return_reasons) 
            ->setStatusCode(200, 'INDEX_SUCCESS');

    }

    /**
     * Display return_reason.
     *
     * @param Request $request
     * @param Model   ReturnReason
     *
     * @return Json
     */
    public function show(ReturnReasonRequest $request, ReturnReason $return_reason)
    {

        if ($return_reason->exists) {
            $return_reason         = $return_reason->presenter();
            $return_reason['code'] = 2001;
            return response()->json($return_reason)
                ->setStatusCode(200, 'SHOW_SUCCESS');;
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }

    }

    /**
     * Show the form for creating a new return_reason.
     *
     * @param Request $request
     *
     * @return json
     */
    public function create(ReturnReasonRequest $request, ReturnReason $return_reason)
    {
        $return_reason         = $return_reason->presenter();
        $return_reason['code'] = 2002;
        return response()->json($return_reason)
            ->setStatusCode(200, 'CREATE_SUCCESS');
    }

    /**
     * Create new return_reason.
     *
     * @param Request $request
     *
     * @return json
     */
    public function store(ReturnReasonRequest $request)
    {
        try {
            $attributes             = $request->all();
            $attributes['user_id']  = user_id('admin.api');
            $return_reason          = $this->repository->create($attributes);
            $return_reason          = $return_reason->presenter();
            $return_reason['code']  = 2004;

            return response()->json($return_reason)
                ->setStatusCode(201, 'STORE_SUCCESS');
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'code'    => 4004,
            ])->setStatusCode(400, 'STORE_ERROR');
        }

    }

    /**
     * Show return_reason for editing.
     *
     * @param Request $request
     * @param Model   $return_reason
     *
     * @return json
     */
    public function edit(ReturnReasonRequest $request, ReturnReason $return_reason)
    {
        if ($return_reason->exists) {
            $return_reason         = $return_reason->presenter();
            $return_reason['code'] = 2003;
            return response()-> json($return_reason)
                ->setStatusCode(200, 'EDIT_SUCCESS');;
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }
    }

    /**
     * Update the return_reason.
     *
     * @param Request $request
     * @param Model   $return_reason
     *
     * @return json
     */
    public function update(ReturnReasonRequest $request, ReturnReason $return_reason)
    {
        try {

            $attributes = $request->all();

            $return_reason->update($attributes);
            $return_reason         = $return_reason->presenter();
            $return_reason['code'] = 2005;

            return response()->json($return_reason)
                ->setStatusCode(201, 'UPDATE_SUCCESS');


        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 4005,
            ])->setStatusCode(400, 'UPDATE_ERROR');

        }
    }

    /**
     * Remove the return_reason.
     *
     * @param Request $request
     * @param Model   $return_reason
     *
     * @return json
     */
    public function destroy(ReturnReasonRequest $request, ReturnReason $return_reason)
    {

        try {

            $t = $return_reason->delete();

            return response()->json([
                'message'  => trans('messages.success.delete', ['Module' => trans('returns::return_reason.name')]),
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
