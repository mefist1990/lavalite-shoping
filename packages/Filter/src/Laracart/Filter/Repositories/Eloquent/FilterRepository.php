<?php

namespace Laracart\Filter\Repositories\Eloquent;

use Laracart\Filter\Interfaces\FilterRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class FilterRepository extends BaseRepository implements FilterRepositoryInterface
{


    public function boot()
    {
        $this->fieldSearchable = config('laracart.filter.filter.search');

    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('laracart.filter.filter.model');
    }
}
