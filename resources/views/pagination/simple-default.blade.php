<ul class="pagination" role="navigation" aria-label="Pagination">
  @if ($paginator->hasPages())
          {{-- Previous Page Link --}}
          @if ($paginator->onFirstPage())
                <li class="pagination-previous disabled">Previous</li>
          @else
              <li class="pagination-previous"><a href="{{ $paginator->previousPageUrl() }}">Predhodno</a></li>
          @endif

          {{-- Next Page Link --}}
          @if ($paginator->hasMorePages())
            <li class="pagination-next float-right"><a href="{{ $paginator->nextPageUrl() }}">Sljedeće</a></li>
          @else
            <li class="pagination-next disabled float-right">Sljedeće</li>
          @endif
  @endif
</ul>
