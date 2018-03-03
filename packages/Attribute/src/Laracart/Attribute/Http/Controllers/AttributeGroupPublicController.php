<?php

namespace Laracart\Attribute\Http\Controllers;

use App\Http\Controllers\PublicController as BaseController;
use Laracart\Attribute\Interfaces\AttributeGroupRepositoryInterface;

class AttributeGroupPublicController extends BaseController
{
    // use AttributeGroupWorkflow;

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
        ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
        ->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();

        return $this->theme->of('attribute::public.attribute_group.index', compact('attribute_groups'))->render();
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
        $attribute_group = $this->repository->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);

        return $this->theme->of('attribute::public.attribute_group.show', compact('attribute_group'))->render();
    }

}
