<?php

namespace Laracart\Review;

use User;

class Review
{
    /**
     * $review object.
     */
    protected $review;

    /**
     * Constructor.
     */
    public function __construct(\Laracart\Review\Interfaces\ReviewRepositoryInterface $review)
    {
        $this->review = $review;
    }

    /**
     * Returns count of review.
     *
     * @param array $filter
     *
     * @return int
     */
    public function count($product_id)
    {
        return $this->review->scopeQuery(function ($query) use ($product_id) {
            return $query->whereStatus('Published')->whereProductId($product_id)->orderBy('id', 'DESC');  
        })->count();

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
    public function gadget($view = 'admin.review.gadget', $count = 10)
    {

        if (User::hasRole('user')) {
            $this->review->pushCriteria(new \Litepie\Laracart\Repositories\Criteria\ReviewUserCriteria());
        }

        $review = $this->review->scopeQuery(function ($query) use ($count) {
            return $query->orderBy('id', 'DESC')->take($count);
        })->all();

        return view('review::' . $view, compact('review'))->render();
    }

    public function review($product_id)
    {
        $review = $this->review->scopeQuery(function ($query) use ($product_id) {
            return $query->whereStatus('Published')->whereProductId($product_id)->orderBy('id', 'DESC');  
        })->all();        

        return $review;
    }

    public function total($product_id)
    {
    
        $review = $this->review->scopeQuery(function ($query) use ($product_id) {
            return $query->selectRaw('sum(score) as total')->whereStatus('Published')->whereProductId($product_id)->orderBy('id', 'DESC');  
        })->first();  

        return $review->total;    
    }
    //  public function average($product_id)
    // {
    
    //     return $this->review->scopeQuery(function ($query) use ($product_id) {
    //         return $query->selectRaw('average(score) as average')->whereStatus('Published')->whereProductId($product_id)->orderBy('id', 'DESC');  
    //     })->first();      
    // }

}
