<?php

namespace Laracart\Returns\Repositories\Eloquent;

use Laracart\Returns\Interfaces\ReturnReasonRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class ReturnReasonRepository extends BaseRepository implements ReturnReasonRepositoryInterface
{


    public function boot()
    {
        $this->fieldSearchable = config('laracart.returns.return_reason.search');

    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('laracart.returns.return_reason.model');
    }
}
