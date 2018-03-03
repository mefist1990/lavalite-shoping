<?php

namespace Laracart\Attribute\Http\Controllers\Api;

use App\Http\Controllers\Api\PublicController as BaseController;
use Laracart\Attribute\Interfaces\AttributeGroupRepositoryInterface;
use Laracart\Attribute\Repositories\Presenter\AttributeGroupItemTransformer;

/**
 * Pubic API controller class.
 */
class AttributeGroupPublicController extends BaseController
{
    /**
     * Constructor.
     *
     * @param type \Laracart\AttributeGroup\Interfaces\AttributeGroupRepositoryInterface $attribute_group
     *
     * @return type
     */
    public function __construct(AttributeGroupRepositoryInterface $attribute_group)
    {
        $this->repository = $attribute_group;
        parent::__construct();
    }

    /**
     * Show attribute_group's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function index()
    {
        $attribute_groups = $this->repository
            ->setPresenter('\\Laracart\\Attribute\\Repositories\\Presenter\\AttributeGroupListPresenter')
            ->scopeQuery(function($query){
                return $query->orderBy('id','DESC');
            })->paginate();

        $attribute_groups['code'] = 2000;
        return response()->json($attribute_groups)
                ->setStatusCode(200, 'INDEX_SUCCESS');
    }

    /**
     * Show attribute_group.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show($slug)
    {
        $attribute_group = $this->repository
            ->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);

        if (!is_null($attribute_group)) {
            $attribute_group         = $this->itemPresenter($module, new AttributeGroupItemTransformer);
            $attribute_group['code'] = 2001;
            return response()->json($attribute_group)
                ->setStatusCode(200, 'SHOW_SUCCESS');
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }

    }
}
