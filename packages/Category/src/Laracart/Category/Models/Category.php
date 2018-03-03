<?php

namespace Laracart\Category\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Litepie\Database\Model;
use Litepie\Database\Traits\Slugger;
use Litepie\Filer\Traits\Filer;
use Litepie\Hashids\Traits\Hashids;
use Litepie\Node\Traits\NestedNode;
use Litepie\Repository\Traits\PresentableTrait;
use Litepie\Revision\Traits\Revision;
use Litepie\Trans\Traits\Translatable;

//use Litepie\Node\Traits\SimpleNode;
// use Litepie\Workflow\Model\Workflow;

class Category extends Model
{
    use Filer, SoftDeletes, Hashids, Slugger, Translatable, Revision, PresentableTrait, NestedNode;

// use Workflow;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
    protected $config = 'laracart.category.category';

    /**
     * Take the parent category
     * @return int
     */
    public function parent()
    {
        return $this->belongsTo('Laracart\Category\Models\Category', 'parent_id');

    }

    public function child()
    {
        return $this->hasMany('Laracart\Category\Models\Category', 'parent_id');

    }

    /**
     * Returns list of products for a particular category.
     * 
     */
    public function products()
    {
        return $this->belongsToMany('Laracart\Product\Models\Product');

    }

    public function getPathNameAttribute($value)
    {
       
        $parents = $this->getParents()->implode('name', ' > '); 
        return ($parents == '') ? $this->name : $parents." > ".$this->name;
   
    }

     public function coupons()
    {
        return $this->belongsToMany('Laracart\Coupon\Models\Coupon');

    }

}
