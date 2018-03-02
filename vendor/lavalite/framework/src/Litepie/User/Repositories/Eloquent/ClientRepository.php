<?php

namespace Litepie\User\Repositories\Eloquent;

use Litepie\User\Interfaces\ClientRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class ClientRepository extends BaseRepository implements ClientRepositoryInterface
{
    /**
     * @var array
     */


    public function boot()
    {

    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        $this->fieldSearchable = config('litepie.user.client.search');
        return config('litepie.user.client.model');
    }

    public function product()
    {
        return $this->model->find(user_id('client.web'))->product()->paginate(6);
    }
}
