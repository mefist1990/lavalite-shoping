<?php

namespace Litecms\Blog;

use User;

class Blog
{
    /**
     * $blog object.
     */
    protected $blog;
    /**
     * $category object.
     */
    protected $category;

    /**
     * Constructor.
     */
    public function __construct(\Litecms\Blog\Interfaces\BlogRepositoryInterface $blog,
        \Litecms\Blog\Interfaces\CategoryRepositoryInterface $category)
    {
        $this->blog = $blog;
        $this->category = $category;
    }

    /**
     * Returns count of blog.
     *
     * @param array $filter
     *
     * @return int
     */
    public function count()
    {
        return  0;
    }

    /**
     * Make gadget View
     *
     * @param string $view
     *
     * @param int $count
     *
     * @return View
     */
    public function gadget($view = 'admin.blog.gadget', $count = 10)
    {

        if (User::hasRole('user')) {
            $this->blog->pushCriteria(new \Litepie\Litecms\Repositories\Criteria\BlogUserCriteria());
        }

        $blog = $this->blog->scopeQuery(function ($query) use ($count) {
            return $query->orderBy('id', 'DESC')->take($count);
        })->all();

        return view('blog::' . $view, compact('blog'))->render();
    }
    /**
     * Make gadget View
     *
     * @param string $view
     *
     * @param int $count
     *
     * @return View
     */
    public function categories()
    {
         $array=[];
         $this->category->pushCriteria(new \Litecms\Blog\Repositories\Criteria\CategoryPublicCriteria());
         $data=$this->category->scopeQuery(function($query){
                return $query->orderBy('name');
         })->all();
         foreach($data as $key => $value) {
            $array[$value->id]=$value->name;
         }
         return $array;

    }  
    /**
     * Make latest View
     *   
     * @param int $count
     *
     * @return View
     */
    public function latest($view = 'latest', $count = 4)
    {
   
        $this->blog->pushCriteria(new \Litecms\Blog\Repositories\Criteria\BlogPublicCriteria());       

        $blogs = $this->blog->scopeQuery(function ($query) use ($count) {
                return $query->orderBy('id', 'DESC')->take($count);
            })->all();
      
        return view('blog::public.blog.' . $view, compact('blogs'))->render();
    }  

     /**
     * Make latest View
     *   
     * @param int $count
     *
     * @return View
     */
    public function categoryList()
    {
      
        $this->category->pushCriteria(new \Litecms\Blog\Repositories\Criteria\CategoryPublicCriteria());       

        $categories = $this->category->scopeQuery(function ($query) {
                return $query->orderBy('name');
            })->paginate(6);

        return view('blog::public.category.list', compact('categories'))->render();
    }     
}
