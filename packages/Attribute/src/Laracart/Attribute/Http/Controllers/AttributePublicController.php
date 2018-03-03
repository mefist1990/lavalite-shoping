<?php

namespace Laracart\Attribute\Http\Controllers;

use App\Http\Controllers\PublicController as BaseController;
use Laracart\Attribute\Interfaces\AttributeRepositoryInterface;

class AttributePublicController extends BaseController
{
    // use AttributeWorkflow;

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
        ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
        ->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();

        return $this->theme->of('attribute::public.attribute.index', compact('attributes'))->render();
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
        $attribute = $this->repository->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);

        return $this->theme->of('attribute::public.attribute.show', compact('attribute'))->render();
    }

}
