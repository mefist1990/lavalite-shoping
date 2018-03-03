<?php

namespace Laracart\Coupon\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Litepie\Database\Model;
use Litepie\Database\Traits\Slugger;
use Litepie\Filer\Traits\Filer;
use Litepie\Hashids\Traits\Hashids;
use Litepie\Repository\Traits\PresentableTrait;
use Litepie\Revision\Traits\Revision;
use Litepie\Trans\Traits\Translatable;
// use Litepie\Workflow\Model\Workflow;

class Coupon extends Model
{
    use Filer, SoftDeletes, Hashids, Slugger, Translatable, Revision, PresentableTrait;
    // use Workflow;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
    protected $config = 'laracart.coupon.coupon';

	/**
	* start_date format 
	* @return int
	*/
    public function getStartDateAttribute($val)
    {
        if(empty($this->attributes['start_date'])) return date("d M, Y");

        return format_date($this->attributes['start_date']);
    }

    /**
	* end_date format 
	* @return int
	*/
    public function getEndDateAttribute($val)
    {
        if(empty($this->attributes['end_date'])) return date("d M, Y");

        return format_date($this->attributes['end_date']);
    }

    public function categories()
    {
        return $this->belongsToMany('Laracart\Category\Models\Category');

    }

    public function products()
    {
        return $this->belongsToMany('Laracart\Product\Models\Product');

    }

    /**
     * start_date format 
     * @return int
     */
    public function setStartDateAttribute($val)
    {
        if ($val == '') return '';

        return $this->attributes['start_date'] = date('Y-m-d', strtotime($val));
    }

    /**
     * end_date format 
     * @return int
     */
    public function setEndDateAttribute($val)
    {
        if ($val == '') return '';

        return $this->attributes['end_date'] = date('Y-m-d', strtotime($val));
    }


}
