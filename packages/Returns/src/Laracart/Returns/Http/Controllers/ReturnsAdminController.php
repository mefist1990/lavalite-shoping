<?php

namespace Laracart\Returns\Http\Controllers;

use App\Http\Controllers\AdminController as BaseController;
use Form;
use Laracart\Returns\Http\Requests\ReturnsRequest;
use Laracart\Returns\Interfaces\ReturnsRepositoryInterface;
use Laracart\Returns\Models\Returns;

/**
 * Admin web controller class.
 */
class ReturnsAdminController extends BaseController
{
    // use ReturnsWorkflow;
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
        parent::__construct();
    }

    /**
     * Display a list of returns.
     *
     * @return Response
     */
    public function index(ReturnsRequest $request)
    {
        if ($request->wantsJson()) {
            return $this->getJson($request);
        }
        $this   ->theme->prependTitle(trans('returns::returns.names').' :: ');
        return $this->theme->of('returns::admin.returns.index')->render();
    }

    /**
     * Display a list of returns.
     *
     * @return Response
     */
    public function getJson(ReturnsRequest $request)
    {
        $pageLimit = $request->input('pageLimit');

        $returns  = $this->repository
                ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
                ->setPresenter('\\Laracart\\Returns\\Repositories\\Presenter\\ReturnsListPresenter')
                ->scopeQuery(function($query){
                    return $query->orderBy('id','DESC');
                })->paginate($pageLimit);
        $returns['recordsTotal']    = $returns['meta']['pagination']['total'];
        $returns['recordsFiltered'] = $returns['meta']['pagination']['total'];
        $returns['request']         = $request->all();
        return response()->json($returns, 200);

    }

    /**
     * Display returns.
     *
     * @param Request $request
     * @param Model   $returns
     *
     * @return Response
     */
    public function show(ReturnsRequest $request, Returns $returns)
    {
        if (!$returns->exists) {
            return response()->view('returns::admin.returns.new', compact('returns'));
        }

        Form::populate($returns);
        return response()->view('returns::admin.returns.show', compact('returns'));
    }

    /**
     * Show the form for creating a new returns.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(ReturnsRequest $request)
    {

        $returns = $this->repository->newInstance([]);

        Form::populate($returns);

        return response()->view('returns::admin.returns.create', compact('returns'));

    }

    /**
     * Create new returns.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(ReturnsRequest $request)
    {
        try {
            $attributes             = $request->all();
            $attributes['user_id']  = user_id('admin.web');
            $returns          = $this->repository->create($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('returns::returns.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/returns/returns/'.$returns->getRouteKey())
            ], 201);


        } catch (Exception $e) {
            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
            ], 400);
        }
    }

    /**
     * Show returns for editing.
     *
     * @param Request $request
     * @param Model   $returns
     *
     * @return Response
     */
    public function edit(ReturnsRequest $request, Returns $returns)
    {
        Form::populate($returns);
        return  response()->view('returns::admin.returns.edit', compact('returns'));
    }

    /**
     * Update the returns.
     *
     * @param Request $request
     * @param Model   $returns
     *
     * @return Response
     */
    public function update(ReturnsRequest $request, Returns $returns)
    {
        try {

            $attributes = $request->all();

            $returns->update($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('returns::returns.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/returns/returns/'.$returns->getRouteKey())
            ], 201);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/returns/returns/'.$returns->getRouteKey()),
            ], 400);

        }
    }

    /**
     * Remove the returns.
     *
     * @param Model   $returns
     *
     * @return Response
     */
    public function destroy(ReturnsRequest $request, Returns $returns)
    {

        try {

            $t = $returns->delete();

            return response()->json([
                'message'  => trans('messages.success.deleted', ['Module' => trans('returns::returns.name')]),
                'code'     => 202,
                'redirect' => trans_url('/admin/returns/returns/0'),
            ], 202);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/returns/returns/'.$returns->getRouteKey()),
            ], 400);
        }
    }

    /**
     * Add action and status to returns.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function returnAction(ReturnsRequest $request, Returns $returns)
    { 
    
    try {

            $attributes = $request->all();        
            
            $returns->update($attributes);


            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('returns::returns.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/returns/returns/'.$returns->getRouteKey())
            ], 201);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/returns/returns/'.$returns->getRouteKey()),
            ], 400);

        }   
            
    }

}
