<?php

namespace Laracart\Review\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Litepie\Database\Model;
use Litepie\Database\Traits\Slugger;
use Litepie\Filer\Traits\Filer;
use Litepie\Hashids\Traits\Hashids;
use Litepie\Repository\Traits\PresentableTrait;
use Litepie\Revision\Traits\Revision;
use Litepie\Trans\Traits\Translatable;
// use Litepie\Workflow\Model\Workflow;

class Review extends Model
{
    use Filer, SoftDeletes, Hashids, Slugger, Translatable, Revision, PresentableTrait;
    // use Workflow;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
     protected $config = 'laracart.review.review';

      /* Take the products
     * @return int
     */
    public function product()
    {
        return $this->belongsTo('Laracart\Product\Models\Product', 'product_id');

    }
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }


}
