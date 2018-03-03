<?php

namespace Laracart\Returns\Http\Controllers;

use App\Http\Controllers\AdminController as BaseController;
use Form;
use Laracart\Returns\Http\Requests\ReturnReasonRequest;
use Laracart\Returns\Interfaces\ReturnReasonRepositoryInterface;
use Laracart\Returns\Models\ReturnReason;

/**
 * Admin web controller class.
 */
class ReturnReasonAdminController extends BaseController
{
    // use ReturnReasonWorkflow;
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
        parent::__construct();
    }

    /**
     * Display a list of return_reason.
     *
     * @return Response
     */
    public function index(ReturnReasonRequest $request)
    {
        if ($request->wantsJson()) {
            return $this->getJson($request);
        }
        $this   ->theme->prependTitle(trans('returns::return_reason.names').' :: ');
        return $this->theme->of('returns::admin.return_reason.index')->render();
    }

    /**
     * Display a list of return_reason.
     *
     * @return Response
     */
    public function getJson(ReturnReasonRequest $request)
    {
        $pageLimit = $request->input('pageLimit');

        $return_reasons  = $this->repository
                ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
                ->setPresenter('\\Laracart\\Returns\\Repositories\\Presenter\\ReturnReasonListPresenter')
                ->scopeQuery(function($query){
                    return $query->orderBy('id','DESC');
                })->paginate($pageLimit);
        $return_reasons['recordsTotal']    = $return_reasons['meta']['pagination']['total'];
        $return_reasons['recordsFiltered'] = $return_reasons['meta']['pagination']['total'];
        $return_reasons['request']         = $request->all();
        return response()->json($return_reasons, 200);

    }

    /**
     * Display return_reason.
     *
     * @param Request $request
     * @param Model   $return_reason
     *
     * @return Response
     */
    public function show(ReturnReasonRequest $request, ReturnReason $return_reason)
    {
        if (!$return_reason->exists) {
            return response()->view('returns::admin.return_reason.new', compact('return_reason'));
        }

        Form::populate($return_reason);
        return response()->view('returns::admin.return_reason.show', compact('return_reason'));
    }

    /**
     * Show the form for creating a new return_reason.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(ReturnReasonRequest $request)
    {

        $return_reason = $this->repository->newInstance([]);

        Form::populate($return_reason);

        return response()->view('returns::admin.return_reason.create', compact('return_reason'));

    }

    /**
     * Create new return_reason.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(ReturnReasonRequest $request)
    {
        try {
            $attributes             = $request->all();
            $attributes['user_id']  = user_id('admin.web');
            $return_reason          = $this->repository->create($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('returns::return_reason.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/returns/return_reason/'.$return_reason->getRouteKey())
            ], 201);


        } catch (Exception $e) {
            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
            ], 400);
        }
    }

    /**
     * Show return_reason for editing.
     *
     * @param Request $request
     * @param Model   $return_reason
     *
     * @return Response
     */
    public function edit(ReturnReasonRequest $request, ReturnReason $return_reason)
    {
        Form::populate($return_reason);
        return  response()->view('returns::admin.return_reason.edit', compact('return_reason'));
    }

    /**
     * Update the return_reason.
     *
     * @param Request $request
     * @param Model   $return_reason
     *
     * @return Response
     */
    public function update(ReturnReasonRequest $request, ReturnReason $return_reason)
    {
        try {

            $attributes = $request->all();

            $return_reason->update($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('returns::return_reason.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/returns/return_reason/'.$return_reason->getRouteKey())
            ], 201);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/returns/return_reason/'.$return_reason->getRouteKey()),
            ], 400);

        }
    }

    /**
     * Remove the return_reason.
     *
     * @param Model   $return_reason
     *
     * @return Response
     */
    public function destroy(ReturnReasonRequest $request, ReturnReason $return_reason)
    {

        try {

            $t = $return_reason->delete();

            return response()->json([
                'message'  => trans('messages.success.deleted', ['Module' => trans('returns::return_reason.name')]),
                'code'     => 202,
                'redirect' => trans_url('/admin/returns/return_reason/0'),
            ], 202);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/returns/return_reason/'.$return_reason->getRouteKey()),
            ], 400);
        }
    }

}
