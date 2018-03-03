<?php

namespace Laracart\Returns\Repositories\Eloquent;

use Laracart\Returns\Interfaces\ReturnsRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class ReturnsRepository extends BaseRepository implements ReturnsRepositoryInterface
{


    public function boot()
    {
        $this->fieldSearchable = config('laracart.returns.returns.search');

    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('laracart.returns.returns.model');
    }
}
