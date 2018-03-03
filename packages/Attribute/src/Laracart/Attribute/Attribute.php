<?php

namespace Laracart\Attribute;

use User;

class Attribute
{
    /**
     * $attribute object.
     */
    protected $attribute;
    /**
     * $attribute_group object.
     */
    protected $attribute_group;

    /**
     * Constructor.
     */
    public function __construct(\Laracart\Attribute\Interfaces\AttributeRepositoryInterface $attribute,
        \Laracart\Attribute\Interfaces\AttributeGroupRepositoryInterface $attribute_group)
    {
        $this->attribute = $attribute;
        $this->attribute_group = $attribute_group;
    }

    /**
     * Returns count of attribute.
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
    public function gadget($view = 'admin.attribute.gadget', $count = 10)
    {

        if (User::hasRole('user')) {
            $this->attribute->pushCriteria(new \Litepie\Laracart\Repositories\Criteria\AttributeUserCriteria());
        }

        $attribute = $this->attribute->scopeQuery(function ($query) use ($count) {
            return $query->orderBy('id', 'DESC')->take($count);
        })->all();

        return view('attribute::' . $view, compact('attribute'))->render();
    }
    
    public function groups()
    {
        $temp = [];
        $groups = $this->attribute_group->scopeQuery(function ($query) {
            return $query->orderBy('name','ASC');  })->all();
    
                foreach ($groups as $key => $value) {
            $temp[$value->id] = ucfirst($value->name);
        }

        return $temp;

    }

    public function attributeGroups()
    {
        $attribute_group = $this->attribute_group->scopeQuery(function ($query) {return $query->with('attribute')->orderBy('name','ASC');  })->all();        

        return $attribute_group;
    }


}
