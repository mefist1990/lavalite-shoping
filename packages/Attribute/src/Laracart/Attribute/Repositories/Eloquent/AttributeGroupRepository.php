<?php

namespace Laracart\Attribute\Repositories\Eloquent;

use Laracart\Attribute\Interfaces\AttributeGroupRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class AttributeGroupRepository extends BaseRepository implements AttributeGroupRepositoryInterface
{


    public function boot()
    {
        $this->fieldSearchable = config('laracart.attribute.attribute_group.search');

    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('laracart.attribute.attribute_group.model');
    }
}
