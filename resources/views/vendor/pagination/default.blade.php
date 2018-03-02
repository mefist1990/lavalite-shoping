@if ($paginator->hasPages())
     <div class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><a class="prev btn-primary"><b class="fa fa-ban"></b></a></li> 
        @else
           <a class="prev" href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="fa fa-angle-left"></i>Previous</a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <a ><span class="disabled">{{ $element }}</span></a>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span>{{ $page }}</span>
                    @else
                        <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="next" href="{{ $paginator->nextPageUrl() }}" rel="next">Next<i class="fa fa-angle-right"></i></a>
        @else
             <li class="disabled"><a class="next btn-primary"><b class="fa fa-ban"></b></a> </li>
        @endif
  </div>
@endif

                                                       