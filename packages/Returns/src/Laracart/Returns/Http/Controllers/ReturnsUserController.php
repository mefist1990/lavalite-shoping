<?php

namespace Laracart\Returns\Http\Controllers;

use App\Http\Controllers\UserController as BaseController;
use Form;
use Laracart\Returns\Http\Requests\ReturnsRequest;
use Laracart\Returns\Interfaces\ReturnsRepositoryInterface;
use Laracart\Returns\Models\Returns;

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
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(ReturnsRequest $request)
    {
        $returns = $this->repository->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();

        $this->theme->prependTitle(trans('returns::returns.names'));

        return $this->theme->of('returns::user.returns.index', compact('returns'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Returns $returns
     *
     * @return Response
     */
    public function show(ReturnsRequest $request, Returns $returns)
    {
        Form::populate($returns);

        return $this->theme->of('returns::user.returns.show', compact('returns'))->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(ReturnsRequest $request)
    {

        $returns = $this->repository->newInstance([]);
        Form::populate($returns);

        $this->theme->prependTitle(trans('returns::returns.names'));
        return $this->theme->of('returns::user.returns.create', compact('returns'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(ReturnsRequest $request)
    {
        try {
            $attributes = $request->all();
            $attributes['user_id'] = user_id();
            $returns = $this->repository->create($attributes);

            return redirect(trans_url('/user/returns/returns'))
                -> with('message', trans('messages.success.created', ['Module' => trans('returns::returns.name')]))
                -> with('code', 201);

        } catch (Exception $e) {
            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param Returns $returns
     *
     * @return Response
     */
    public function edit(ReturnsRequest $request, Returns $returns)
    {

        Form::populate($returns);
        $this->theme->prependTitle(trans('returns::returns.names'));

        return $this->theme->of('returns::user.returns.edit', compact('returns'))->render();
    }

    /**
     * Update the specified resource.
     *
     * @param Request $request
     * @param Returns $returns
     *
     * @return Response
     */
    public function update(ReturnsRequest $request, Returns $returns)
    {
        try {
            $this->repository->update($request->all(), $returns->getRouteKey());

            return redirect(trans_url('/user/returns/returns'))
                ->with('message', trans('messages.success.updated', ['Module' => trans('returns::returns.name')]))
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
    public function destroy(ReturnsRequest $request, Returns $returns)
    {
        try {
            $this->repository->delete($returns->getRouteKey());
            return redirect(trans_url('/user/returns/returns'))
                ->with('message', trans('messages.success.deleted', ['Module' => trans('returns::returns.name')]))
                ->with('code', 204);

        } catch (Exception $e) {

            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);

        }
    }
}
