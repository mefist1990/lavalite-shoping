<?php

namespace Laracart\Filter\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Litepie\Database\Model;
use Litepie\Database\Traits\Slugger;
use Litepie\Filer\Traits\Filer;
use Litepie\Hashids\Traits\Hashids;
use Litepie\Repository\Traits\PresentableTrait;
use Litepie\Revision\Traits\Revision;
use Litepie\Trans\Traits\Translatable;
// use Litepie\Workflow\Model\Workflow;

class FilterGroup extends Model
{
    use Filer, SoftDeletes, Hashids, Slugger, Translatable, Revision, PresentableTrait;
    // use Workflow;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
     protected $config = 'laracart.filter.filter_group';


    /**
     * The filters that belong to the filter_group.
     */
    public function filters(){
        return $this->belongsTo('Filter\FilterGroup\Models\Filter');
    }
}
