<?php

namespace Laracart\Returns\Http\Controllers;

use App\Http\Controllers\PublicController as BaseController;
use Laracart\Returns\Interfaces\ReturnsRepositoryInterface;

class ReturnsPublicController extends BaseController
{
    // use ReturnsWorkflow;

    /**
     * Constructor.
     *
     * @param type \Laracart\Returns\Interfaces\ReturnsRepositoryInterface $returns
     *
     * @return type
     */
    public function __construct(ReturnsRepositoryInterface $returns)
    {
        $this->repository = $returns;
        parent::__construct();
    }

    /**
     * Show returns's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function index()
    {
        $returns = $this->repository
        ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
        ->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();

        return $this->theme->of('returns::public.returns.index', compact('returns'))->render();
    }

    /**
     * Show returns.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show($slug)
    {
        $returns = $this->repository->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);

        return $this->theme->of('returns::public.returns.show', compact('returns'))->render();
    }

}
