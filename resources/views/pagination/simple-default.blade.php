<nav class="pagination is-right" role="navigation" aria-label="pagination">
        @if ($paginator->hasPages())
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    {{-- <li class="disabled"><span>@lang('pagination.previous')</span></li> --}}
                    <a class="pagination-previous" disabled>Predhodno</a>
                @else
                    {{-- <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a></li> --}}
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="pagination-previous">Predhodno</a>
                @endif

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                  <a href="{{ $paginator->nextPageUrl() }}" rel="next"  class="pagination-next">Sljedeće</a>
                  {{-- <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a></li> --}}
                @else
                  <a class="pagination-next" disabled>Sljedeće</a>
                  {{-- <li class="disabled"><span>@lang('pagination.next')</span></li> --}}
                @endif
        @endif
</nav>
