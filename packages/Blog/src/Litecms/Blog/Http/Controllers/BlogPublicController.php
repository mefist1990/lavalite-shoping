<?php

namespace Litecms\Blog\Http\Controllers;

use App\Http\Controllers\PublicController as BaseController;
use Litecms\Blog\Interfaces\BlogRepositoryInterface;

class BlogPublicController extends BaseController
{
    // use BlogWorkflow;

    /**
     * Constructor.
     *
     * @param type \Litecms\Blog\Interfaces\BlogRepositoryInterface $blog
     *
     * @return type
     */
    public function __construct(BlogRepositoryInterface $blog)
    {
        $this->repository = $blog;
        parent::__construct();
    }

    /**
     * Show blog's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function index()
    {
        $blogs = $this->repository
        ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
        ->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate(4);

        return $this->theme->of('blog::public.blog.index', compact('blogs'))->render();
    }

    /**
     * Show blog.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show($slug)
    {
        $blog = $this->repository->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);
        $next = $this->repository->scopeQuery(function($query) use ($blog) {
            return $query->orderBy('id','ASC')
                         ->where('id','>',$blog->id);
        })->first(['*']);
        $prev = $this->repository->scopeQuery(function($query) use ($blog) {
            return $query->orderBy('id','DESC')
                         ->where('id','<',$blog->id);
        })->first(['*']);

        return $this->theme->of('blog::public.blog.show', compact('blog','next','prev'))->render();
    }

}
