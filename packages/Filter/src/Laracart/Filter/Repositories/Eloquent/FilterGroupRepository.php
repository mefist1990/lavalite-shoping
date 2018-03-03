<?php

namespace Laracart\Filter\Repositories\Eloquent;

use Laracart\Filter\Interfaces\FilterGroupRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class FilterGroupRepository extends BaseRepository implements FilterGroupRepositoryInterface
{


    public function boot()
    {
        $this->fieldSearchable = config('laracart.filter.filter_group.search');

    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('laracart.filter.filter_group.model');
    }
}
