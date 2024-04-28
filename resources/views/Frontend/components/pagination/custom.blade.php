@if ($paginator->hasPages())
    <ul class="pager-pagination">
        @php
            $range=getPaginationArrays($paginator)
        @endphp
        {{--Previous Page Link--}}
        @if($range[0]>1)
            @if ($paginator->onFirstPage())
                <li class="disabled"><a href="{{ $paginator->url(1)}}" rel="prev">«</a></li>
                <li class="disabled"><span>‹</span></li>
            @else
                <li><a href="{{ $paginator->url(1)}}" rel="prev">«</a></li>
                <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">‹</a></li>
            @endif
        @endif
        {{--element--}}

        @foreach(range($range[0], $range[1]) as $i)
            @if ($i == $paginator->currentPage())
                <li class="active"><span>{{ $i }}</span></li>
            @else
                <li><a href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
            @endif
        @endforeach

        {{--Next Page Link--}}
        @if($range[1]<$paginator->lastPage())
            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">›</a></li>
                <li><a href="{{ $paginator->url($paginator->lastPage()) }}" rel="next">»</a></li>
            @else
                <li class="disabled"><span>›</span></li>
                <li class="disabled"><a href="{{ $paginator->url($paginator->lastPage()) }}" rel="next">»</a></li>
            @endif
        @endif
    </ul>

@endif
