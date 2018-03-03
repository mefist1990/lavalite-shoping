<?php

namespace Litecms\Newsletter\Http\Controllers;

use App\Http\Controllers\PublicController as BaseController;
use Litecms\Newsletter\Interfaces\NewsletterRepositoryInterface;
use Form;
use Illuminate\Http\Request as Request;
use Litecms\Newsletter\Models\Newsletter;

class NewsletterPublicController extends BaseController
{
    // use NewsletterWorkflow;

    /**
     * Constructor.
     *
     * @param type \Litecms\Newsletter\Interfaces\NewsletterRepositoryInterface $newsletter
     *
     * @return type
     */
    public function __construct(NewsletterRepositoryInterface $newsletter)
    {
        $this->repository = $newsletter;
        parent::__construct();
    }

    /**
     * Show newsletter's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function index()
    {
        $newsletters = $this->repository
        ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
        ->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();

        return $this->theme->of('newsletter::public.newsletter.index', compact('newsletters'))->render();
    }

    /**
     * Show newsletter.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show(Request $request)
    {
       
         try {
            $this->theme->asset()->usepath()->add('sweet-alert','packages/sweetalert/dist/sweetalert.css');
            $this->theme->asset()->container('footer')->usepath()->add('sweet-alert.js','packages/sweetalert/dist/sweetalert.min.js');
            $this->theme->asset()->usepath()->add('toastr-alert','packages/toastr/toastr.min.css');
            $this->theme->asset()->container('footer')->usepath()->add('toastr-js','packages/toastr/toastr.js');

          
            $attributes = $request->all();
            $newsletter = $this->repository->create($attributes); 

            return $this->theme->of('newsletter::public.newsletter.show', compact('newsletter'))->render();

           

        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'code'    => 400,
            ], 400);
        }
        

    }
     

    /**
     * update newsletter.
     *
     * @param Request $request
     *
     * @return response
     */
    protected function update(Request $request,$slug)
    {
        $newsletter=$this->repository->scopeQuery(function($query)use($slug){
                return $query->whereSlug($slug);
        })->first();

        try {
           
            $attributes = $request->all();   
            
            $newsletter->update($attributes);

             return response()->json(['message' =>'News Letter subscribed successfully','code'=> 204] , 204);

        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'code'    => 400,
            ], 400);
        }
    }


}
