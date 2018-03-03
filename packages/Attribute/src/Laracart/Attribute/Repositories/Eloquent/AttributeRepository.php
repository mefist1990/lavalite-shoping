<?php

namespace Laracart\Attribute\Repositories\Eloquent;

use Laracart\Attribute\Interfaces\AttributeRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class AttributeRepository extends BaseRepository implements AttributeRepositoryInterface
{


    public function boot()
    {
        $this->fieldSearchable = config('laracart.attribute.attribute.search');

    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('laracart.attribute.attribute.model');
    }
}
