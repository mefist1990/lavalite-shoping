<?php

namespace Laracart\Product\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Litepie\Database\Model;
use Litepie\Database\Traits\Slugger;
use Litepie\Filer\Traits\Filer;
use Litepie\Hashids\Traits\Hashids;
use Litepie\Repository\Traits\PresentableTrait;
use Litepie\Revision\Traits\Revision;
use Litepie\Trans\Traits\Translatable;
// use Litepie\Workflow\Model\Workflow;

class Product extends Model
{
    use Filer, SoftDeletes, Hashids, Slugger, Translatable, Revision, PresentableTrait;
    // use Workflow;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
     protected $config = 'laracart.product.product';

    public function categories()
    {
        return $this->belongsToMany('Laracart\Category\Models\Category');

    }

    public function coupons()
    {
        return $this->belongsToMany('Laracart\Coupon\Models\Coupon');

    }

    public function favourite()
    {
        return $this->belongsToMany('App\Client');
    }
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

     public function attributes()
    {
        return $this->belongsToMany('Laracart\Attribute\Models\Attribute');

    }

     public function orders()
    {
        return $this->belongsToMany('Laracart\Order\Models\Order')->withPivot('quantity');

    }

}

