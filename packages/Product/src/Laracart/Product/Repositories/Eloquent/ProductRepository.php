<?php

namespace Laracart\Product\Repositories\Eloquent;

use Laracart\Product\Interfaces\ProductRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{


    public function boot()
    {
        $this->fieldSearchable = config('laracart.product.product.search');

    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('laracart.product.product.model');
    }

//     public function products($cat)
//     {
// dd($cat);
//         return $this->model->categories()->get();
       
//     }
}
