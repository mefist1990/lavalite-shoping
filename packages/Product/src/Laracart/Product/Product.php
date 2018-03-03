<?php

namespace Laracart\Product;

use User;

class Product
{
    /**
     * $product object.
     */
    protected $product;

    /**
     * Constructor.
     */
    public function __construct(\Laracart\Product\Interfaces\ProductRepositoryInterface $product)
    {
        $this->product = $product;
    }

    /**
     * Returns count of product.
     *
     * @param array $filter
     *
     * @return int
     */
    public function count()
    {
        return  $this->product->count();
    }

    /**
     * Make gadget View
     *
     * @param string $view
     *
     * @param int $count
     *
     * @return View
     */
    public function gadget($view = 'admin.product.gadget', $count = 10)
    {

        if (User::hasRole('user')) {
            $this->product->pushCriteria(new \Litepie\Laracart\Repositories\Criteria\ProductUserCriteria());
        }

        $product = $this->product->scopeQuery(function ($query) use ($count) {
            return $query->orderBy('id', 'DESC')->take($count);
        })->all();

        return view('product::' . $view, compact('product'))->render();
    }

/**
     * Make gadget View
     *
     * @param string $view
     *
     * @param int $count
     *
     * @return View
     */
    public function premium($view ='public.product.premium',$count = 5)
    {       
        // $this->car->pushCriteria(new \Laraautos\Car\Repositories\Criteria\CarPublicCriteria());
        $premiums = $this->product->scopeQuery(function ($query) use ($count) {
            return $query->wherePremium(1)->orderBy('id', 'DESC')->take($count);
        })->all();

        return view('product::'.$view, compact('premiums'))->render();
    }

   
    /**
     * Make gadget View
     *
     * @param string $view
     *
     * @param int $count
     *
     * @return View
     */
    public function featured($count = 8)
    {       
        // $this->car->pushCriteria(new \Laraautos\Car\Repositories\Criteria\CarPublicCriteria());
        $featured = $this->product->scopeQuery(function ($query) use ($count) {
            return $query->whereFeatured(1)->orderBy('id', 'DESC')->take($count);
        })->all();

        return view('product::public.product.featured', compact('featured'))->render();
    }

    /**
     * Take product View
     *
     * @param string $view
     *
     * @param int $count
     *
     * @return View
     */

    public function productsList()
    {
         $products = $this->product->scopeQuery(function ($query) {return $query->orderBy('name','ASC');  })->all();
       
         foreach ($products as $key => $value) {
            $temp[$value->id] = ucfirst($value->name);
        }
        return $temp;
    }
    /**
     * Take product Details
     *
     * @param string $view
     *
     * @param int $count
     *
     * @return View
     */

    public function productDetails($id)
    {
         $products = $this->product->scopeQuery(function ($query) use($id){return $query->whereId($id)->orderBy('name','ASC');  })->first();
       
         
        return $products;
    }
}
