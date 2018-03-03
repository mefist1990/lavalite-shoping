@forelse($categories as $key=>$category)
  <li class="{{(Request::is('*category/'.$category->slug))? 'active' : ''}}"><a href="{!!url('blog/category/'.$category->slug)!!}">{!!$category->name!!}</a></li>
@endforeach


                             