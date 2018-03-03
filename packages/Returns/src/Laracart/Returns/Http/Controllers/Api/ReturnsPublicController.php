<?php

namespace Laracart\Returns\Http\Controllers\Api;

use App\Http\Controllers\Api\PublicController as BaseController;
use Laracart\Returns\Interfaces\ReturnsRepositoryInterface;
use Laracart\Returns\Repositories\Presenter\ReturnsItemTransformer;

/**
 * Pubic API controller class.
 */
class ReturnsPublicController extends BaseController
{
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
            ->setPresenter('\\Laracart\\Returns\\Repositories\\Presenter\\ReturnsListPresenter')
            ->scopeQuery(function($query){
                return $query->orderBy('id','DESC');
            })->paginate();

        $returns['code'] = 2000;
        return response()->json($returns)
                ->setStatusCode(200, 'INDEX_SUCCESS');
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
        $returns = $this->repository
            ->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);

        if (!is_null($returns)) {
            $returns         = $this->itemPresenter($module, new ReturnsItemTransformer);
            $returns['code'] = 2001;
            return response()->json($returns)
                ->setStatusCode(200, 'SHOW_SUCCESS');
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }

    }
}
