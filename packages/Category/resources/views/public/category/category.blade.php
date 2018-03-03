<!-- @forelse($category as $key => $val)
<div class="category-gadget-box">
	<ul class="categories">
	    <li class="{{(Request::is('*categories/'.$val->slug))? 'active' : ''}}" id="{!!$val->id!!}"><a href="{!!url('categories')!!}/{{@$val['slug']}}">{!!$val->name!!}</a></li>
	    @forelse($val['child'] as $key=> $child)
	    <ul class="categories">
	       <li class="{{(Request::is('*categories/'.$child->slug))? 'active' : ''}}" id="{!!$child->id!!}"><a href="{!!url('categories')!!}/{{@$child['slug']}}">&nbsp;&nbsp;&nbsp;{!!$child->name!!}</a></li>
	        @forelse($child['child'] as $key=> $subchild)
		    <ul class="categories">
		       <li class="{{(Request::is('*categories/'.$subchild->slug))? 'active' : ''}}" id="{!!$subchild->id!!}"><a href="{!!url('categories')!!}/{{@$subchild['slug']}}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!!$subchild->name!!}</a></li>
		    </ul>
		    @empty
		    @endif
	    </ul>
	    @empty
	    @endif
	</ul> 
</div>
@empty
<div class="category-gadget-box">
    <p>No Category</p>
</div>
@endif -->

<!-- <div class="category-gadget-box">
	<div class="head"><i class="icon fa fa-align-justify fa-fw"></i>Categories</div>
	<ul class="categories">
		@forelse($category as $key => $val)
		<li class="{{(Request::is('*categories/'.$val->slug))? 'active' : ''}}" id="{!!$val->id!!}">
			<a href="{!!url('categories')!!}/{{@$val['slug']}}">{!!$val->name!!}</a>
			@forelse($val['child'] as $key=> $child)
			<ul class="category-child">
				<li class="{{(Request::is('*categories/'.$child->slug))? 'active' : ''}}" id="{!!$child->id!!}">
					<a href="{!!url('categories')!!}/{{@$child['slug']}}">{!!$child->name!!}</a>
					@forelse($child['child'] as $key=> $subchild)
					<ul class="child-subcategory">
						<li class="{{(Request::is('*categories/'.$subchild->slug))? 'active' : ''}}" id="{!!$subchild->id!!}">
							<a href="{!!url('categories')!!}/{{@$subchild['slug']}}">{!!$subchild->name!!}</a>
						</li>
					</ul>
					@empty
		    		@endif
				</li>
			</ul>
			@empty
		    @endif
		</li>
		@empty
		@endif
	</ul>
</div>
 -->



<!-- <div class="category-gadget-box">
	<div class="head"><i class="icon fa fa-align-justify fa-fw"></i>Categories</div>
	<ul class="cd-accordion-menu animated">
		@forelse($category as $key => $val)
		<li class="has-children">
			<input type="checkbox" name ="{!!$val->id!!}" id="group-{!!$key!!}">
			<label for="group-{!!$key!!}">{!!$val->name!!}</label>
			@forelse($val['child'] as $keys=> $child)
	  		<ul>
	  			<li class="has-children">
	  				<input type="checkbox" name ="{!!$child->id!!}" id="{!!$val->id!!}_sub-group-{!!$keys!!}">
					<label for="{!!$val->id!!}_sub-group-{!!$keys!!}">{!!$child->name!!}</label>
					@forelse($child['child'] as $keyss=> $subchild)
					<ul>
						<li>
							<input type="checkbox" name ="{!!$subchild->id!!}" id="{!!$val->id!!}_sub-group-level-{!!$keyss!!}">
							<label for="{!!$val->id!!}_sub-group-level-{!!$keyss!!}">{!!$subchild->name!!}</label>
						</li>
					</ul>
					@empty
		    		@endif
	  			</li>
	  		</ul>
	  		@empty
	    	@endif
		</li>
		@empty
		@endif
	</ul>
</div> -->

<div class="jquery-accordion-menu clearfix" id="jquery-accordion-menu">
    <div class="jquery-accordion-menu-header">
        Categories
    </div>
    <ul>
    	@forelse($category as $key => $val)
        <li>
            <a href="{!!url('categories')!!}/{{@$val['slug']}}">
                <i class="fa fa-cog"></i>{!!$val->name!!}
            </a>
            @forelse($val['child'] as $key=> $child)
            <ul class="submenu">
                <li>
                    <a href="{!!url('categories')!!}/{{@$child['slug']}}">{!!$child->name!!}</a>
                    @forelse($child['child'] as $key=> $subchild)
                    <ul class="submenu">
                        <li>
                            <a href="{!!url('categories')!!}/{{@$subchild['slug']}}">
                                {!!$subchild->name!!}
                            </a>
                        </li>
                    </ul>
                    @empty
		    		@endif
                </li>
            </ul>
            @empty
		    @endif
        </li>
        @empty
		@endif
    </ul>
</div>

<script>

jQuery(document).ready(function(){
	jQuery("#jquery-accordion-menu").jqueryAccordionMenu();
});


</script>