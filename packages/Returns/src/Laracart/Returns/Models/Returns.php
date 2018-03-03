<?php

namespace Laracart\Returns\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Litepie\Database\Model;
use Litepie\Database\Traits\Slugger;
use Litepie\Filer\Traits\Filer;
use Litepie\Hashids\Traits\Hashids;
use Litepie\Repository\Traits\PresentableTrait;
use Litepie\Revision\Traits\Revision;
use Litepie\Trans\Traits\Translatable;
// use Litepie\Workflow\Model\Workflow;

class Returns extends Model
{
    use Filer, SoftDeletes, Hashids, Slugger, Translatable, Revision, PresentableTrait;
    // use Workflow;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
     protected $config = 'laracart.returns.returns';

    public function orders()
    {
        return $this->belongsTo('Laracart\Order\Models\Order', 'order_id');

    }

    public function reasons()
    {
        return $this->belongsTo('Laracart\Returns\Models\ReturnReason', 'return_reason_id');

    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function client()
    {
        return $this->belongsTo('App\Client','user_id');
    }
}
