<?php

namespace Laracart\Order\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Litepie\Database\Model;
use Litepie\Database\Traits\Slugger;
use Litepie\Filer\Traits\Filer;
use Litepie\Hashids\Traits\Hashids;
use Litepie\Repository\Traits\PresentableTrait;
use Litepie\Revision\Traits\Revision;
use Litepie\Trans\Traits\Translatable;
// use Litepie\Workflow\Model\Workflow;

class Order extends Model
{
    use Filer, SoftDeletes, Hashids, Slugger, Translatable, Revision, PresentableTrait;
    // use Workflow;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
     protected $config = 'laracart.order.order';

     /**
     * Take the status
     * @return int
     */
    public function status()
    {
        return $this->belongsTo('Laracart\Order\Models\OrderStatus', 'order_status_id');

    }

    public function coupon()
    {
        return $this->belongsTo('Laracart\Coupon\Models\Coupon', 'coupon_id');

    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function client()
    {
        return $this->belongsTo('App\Client','user_id');
    }


    public function products()
    {
        return $this->belongsToMany('Laracart\Product\Models\Product')->withPivot('quantity');

    }

}
