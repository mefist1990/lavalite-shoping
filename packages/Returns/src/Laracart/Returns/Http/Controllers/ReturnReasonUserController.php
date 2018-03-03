<?php

namespace Laracart\Returns\Http\Controllers;

use App\Http\Controllers\UserController as BaseController;
use Form;
use Laracart\Returns\Http\Requests\ReturnReasonRequest;
use Laracart\Returns\Interfaces\ReturnReasonRepositoryInterface;
use Laracart\Returns\Models\ReturnReason;

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
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(ReturnReasonRequest $request)
    {
        $return_reasons = $this->repository->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();

        $this->theme->prependTitle(trans('returns::return_reason.names'));

        return $this->theme->of('returns::user.return_reason.index', compact('return_reasons'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param ReturnReason $return_reason
     *
     * @return Response
     */
    public function show(ReturnReasonRequest $request, ReturnReason $return_reason)
    {
        Form::populate($return_reason);

        return $this->theme->of('returns::user.return_reason.show', compact('return_reason'))->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(ReturnReasonRequest $request)
    {

        $return_reason = $this->repository->newInstance([]);
        Form::populate($return_reason);

        $this->theme->prependTitle(trans('returns::return_reason.names'));
        return $this->theme->of('returns::user.return_reason.create', compact('return_reason'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(ReturnReasonRequest $request)
    {
        try {
            $attributes = $request->all();
            $attributes['user_id'] = user_id();
            $return_reason = $this->repository->create($attributes);

            return redirect(trans_url('/user/returns/return_reason'))
                -> with('message', trans('messages.success.created', ['Module' => trans('returns::return_reason.name')]))
                -> with('code', 201);

        } catch (Exception $e) {
            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param ReturnReason $return_reason
     *
     * @return Response
     */
    public function edit(ReturnReasonRequest $request, ReturnReason $return_reason)
    {

        Form::populate($return_reason);
        $this->theme->prependTitle(trans('returns::return_reason.names'));

        return $this->theme->of('returns::user.return_reason.edit', compact('return_reason'))->render();
    }

    /**
     * Update the specified resource.
     *
     * @param Request $request
     * @param ReturnReason $return_reason
     *
     * @return Response
     */
    public function update(ReturnReasonRequest $request, ReturnReason $return_reason)
    {
        try {
            $this->repository->update($request->all(), $return_reason->getRouteKey());

            return redirect(trans_url('/user/returns/return_reason'))
                ->with('message', trans('messages.success.updated', ['Module' => trans('returns::return_reason.name')]))
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
    public function destroy(ReturnReasonRequest $request, ReturnReason $return_reason)
    {
        try {
            $this->repository->delete($return_reason->getRouteKey());
            return redirect(trans_url('/user/returns/return_reason'))
                ->with('message', trans('messages.success.deleted', ['Module' => trans('returns::return_reason.name')]))
                ->with('code', 204);

        } catch (Exception $e) {

            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);

        }
    }
}
