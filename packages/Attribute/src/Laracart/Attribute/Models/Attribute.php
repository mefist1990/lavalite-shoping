<?php

namespace Laracart\Attribute\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Litepie\Database\Model;
use Litepie\Database\Traits\Slugger;
use Litepie\Filer\Traits\Filer;
use Litepie\Hashids\Traits\Hashids;
use Litepie\Repository\Traits\PresentableTrait;
use Litepie\Revision\Traits\Revision;
use Litepie\Trans\Traits\Translatable;
// use Litepie\Workflow\Model\Workflow;

class Attribute extends Model
{
    use Filer, SoftDeletes, Hashids, Slugger, Translatable, Revision, PresentableTrait;
    // use Workflow;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
     protected $config = 'laracart.attribute.attribute';

     /**
     * Take the attribute group
     * @return int
     */
    public function group()
    {
        return $this->belongsTo('Laracart\Attribute\Models\AttributeGroup', 'group_id');

    }

     public function products()
    {
        return $this->belongsToMany('Laracart\Product\Models\Product');

    }

}
