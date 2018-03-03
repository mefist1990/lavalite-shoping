<?php

namespace Laracart\Category;

use User;

class Category
{
    /**
     * $category object.
     */
    protected $category;

    /**
     * Constructor.
     */
    public function __construct(\Laracart\Category\Interfaces\CategoryRepositoryInterface $category)
    {
        $this->category = $category;
    }

    /**
     * Returns count of category.
     *
     * @param array $filter
     *
     * @return int
     */
    public function count()
    {
        return  $this->category->count();
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
    public function gadget($view = 'admin.category.gadget', $count = 10)
    {

        if (User::hasRole('user')) {
            $this->category->pushCriteria(new \Litepie\Laracart\Repositories\Criteria\CategoryUserCriteria());
        }

        $category = $this->category->scopeQuery(function ($query) use ($count) {
            return $query->orderBy('id', 'DESC')->take($count);
        })->all();

        return view('category::' . $view, compact('category'))->render();
    }

    public function parents()
    {
        $temp = [];
        $parents = $this->category->scopeQuery(function ($query) {return $query->orderBy('name','ASC');  })->all();
    
        $temp[0] = 'Root';

        foreach ($parents as $key => $value) {
            $temp[$value->id] = ucfirst($value->name);
        }

        return $temp;
    }

    public function category()
    {
        $category = $this->category->scopeQuery(function ($query) {return $query->whereParentId(0)->with('child')->orderBy('name','ASC');  })->all();        

        return $category;
    }


     public function parentNode()
    {
        $temp = [];
          $temp[0] = 'Root';

        $parents = $this->category->all()->listsNested('name','id','___'); 
         foreach ($parents as $key => $value) {
            $temp[$key] =ucfirst($value);
        }

            return $temp;
      
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
    public function categoryAside()
    {
         $category = $this->category->scopeQuery(function ($query) {return $query->whereParentId(0)->with('child')->orderBy('name','ASC');  })->all(); 
       
          return view('category::public.category.category', compact('category'))->render();
    }

}
