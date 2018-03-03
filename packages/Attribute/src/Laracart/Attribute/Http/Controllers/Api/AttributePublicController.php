<?php

namespace Laracart\Attribute\Http\Controllers\Api;

use App\Http\Controllers\Api\PublicController as BaseController;
use Laracart\Attribute\Interfaces\AttributeRepositoryInterface;
use Laracart\Attribute\Repositories\Presenter\AttributeItemTransformer;

/**
 * Pubic API controller class.
 */
class AttributePublicController extends BaseController
{
    /**
     * Constructor.
     *
     * @param type \Laracart\Attribute\Interfaces\AttributeRepositoryInterface $attribute
     *
     * @return type
     */
    public function __construct(AttributeRepositoryInterface $attribute)
    {
        $this->repository = $attribute;
        parent::__construct();
    }

    /**
     * Show attribute's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function index()
    {
        $attributes = $this->repository
            ->setPresenter('\\Laracart\\Attribute\\Repositories\\Presenter\\AttributeListPresenter')
            ->scopeQuery(function($query){
                return $query->orderBy('id','DESC');
            })->paginate();

        $attributes['code'] = 2000;
        return response()->json($attributes)
                ->setStatusCode(200, 'INDEX_SUCCESS');
    }

    /**
     * Show attribute.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show($slug)
    {
        $attribute = $this->repository
            ->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);

        if (!is_null($attribute)) {
            $attribute         = $this->itemPresenter($module, new AttributeItemTransformer);
            $attribute['code'] = 2001;
            return response()->json($attribute)
                ->setStatusCode(200, 'SHOW_SUCCESS');
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }

    }
}
