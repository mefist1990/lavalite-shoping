<?php

namespace Litecms\Blog\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Litepie\Database\Model;
use Litepie\Database\Traits\Slugger;
use Litepie\Filer\Traits\Filer;
use Litepie\Hashids\Traits\Hashids;
use Litepie\Repository\Traits\PresentableTrait;
use Litepie\Revision\Traits\Revision;
use Litepie\Trans\Traits\Translatable;
// use Litepie\Workflow\Model\Workflow;

class Blog extends Model
{
    use Filer, SoftDeletes, Hashids, Slugger, Translatable, Revision, PresentableTrait;
    // use Workflow;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
     protected $config = 'litecms.blog.blog';


    /**
     * The blog_categories that belong to the blog.
     */
    public function category(){
        return $this->belongsTo('Litecms\Blog\Models\Category','category_id');
    }
       /**
     * The blog_categories that belong to the blog.
     */
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    /**
     * posted_on format 
     * @return int
     */
    public function getPostedOnAttribute($val)
    {
        if(empty($this->attributes['posted_on'])) return date("d M, Y");

        return format_date($this->attributes['posted_on']);
    }
}
