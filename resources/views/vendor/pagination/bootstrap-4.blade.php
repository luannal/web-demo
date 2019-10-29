@if ($paginator->hasPages())
    <nav class="pagination" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            
            <span class="pagination__page pagination__page--current" aria-hidden="true">&lsaquo;</span>
            
        @else
            
            <a class="page-link pagination__page" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
            
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="pagination__page pagination__page--current">{{ $element }}</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="pagination__page pagination__page--current">{{ $page }}</span>
                    @else
                        <a class="page-link pagination__page" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
           
            <a class="page-link pagination__page" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
           
        @else
            
            <span class="pagination__page pagination__page--current" aria-hidden="true">&rsaquo;</span>
            
        @endif
    </nav>
@endif
