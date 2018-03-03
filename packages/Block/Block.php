<?php

namespace Litepie\Block;

class Block
{
    
    /**
     * $block object.
     */
    protected $block;

    /**
     * Constructor.
     */
    public function __construct( \Litepie\Block\Interfaces\BlockRepositoryInterface $block) {       
        $this->block = $block;
    }

    /**
     * Returns count of block 
     *
     * @param array $filter
     *
     * @return int
     */
    public function count()
    {

        return $this->block->count();
       

    }
     /**
     * Returns list of block 
     *
     * @param array $filter
     *
     * @return int
     */
    public function get($category="What We Do",$view="default")
    {

        $blocks= $this->block->scopeQuery(function($query)use($category){
            return $query->whereCategory($category)->orderBy('order');
        })->all();
       
       return view('block::public.'.$view,compact('blocks'));

    }










}
