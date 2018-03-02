<?php

namespace Litepie\User\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Litepie\Database\Model;
use Litepie\Database\Traits\Slugger;
use Litepie\Filer\Traits\Filer;
use Litepie\Hashids\Traits\Hashids;
use Litepie\Repository\Traits\PresentableTrait;
use Litepie\Revision\Traits\Revision;
use Litepie\Trans\Traits\Translatable;
// use Litepie\Workflow\Model\Workflow;

class Team extends Model
{
    use Filer, Hashids, Slugger, Translatable, Revision, PresentableTrait;
    // use Workflow;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
     protected $config = 'litepie.user.team';


    /**
     * The users that belong to the team.
     */
    public function users(){
        return $this->hasManyThrough('User\Team\Models\User');
    }

    /**
     * The member that belong to the team.
     */
    public function manager()
    {
        return $this->belongsTo('App\User','manager_id');
    }
    /**
     * The member that belong to the team.
     */
    public function member()
    {
        return $this->belongsToMany('App\User')->withPivot('reporting_to');
    }
}
