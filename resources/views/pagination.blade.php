@if ($paginator->hasPages())
    <ul id="pagination">
        @if (!$paginator->onFirstPage())
            <li>
                <a id="previous" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                    <i class="fas fa-chevron-left"></i>
                </a>
            </li>
        @endif
        @foreach ($elements as $page)
            @foreach ($page as $page => $url)
                @if ($paginator->currentPage() > 4 && $page === 2)
                    <li>
                        <span class="dots">...</span>
                    </li>
                @endif
                @if ($page == $paginator->currentPage())
                    <li>
                        <a href="{{ $url }}" class="current">
                            {{ $page }}
                        </a>
                    </li>
                @elseif ($page === $paginator->currentPage() + 1 || $page === $paginator->currentPage() + 2 || $page === $paginator->currentPage() - 1 || $page === $paginator->currentPage() - 2 || $page === $paginator->lastPage() || $page === 1)
                    <li>
                        <a href="{{ $url }}">
                            {{ $page }}
                        </a>
                    </li>
                @endif
                @if ($paginator->currentPage() < $paginator->lastPage() - 3 && $page === $paginator->lastPage() - 1)
                    <li>
                        <span class="dots">...</span>
                    </li>
                @endif
            @endforeach
        @endforeach
        @if ($paginator->hasMorePages())
            <li>
                <a id="next" href="{{ $paginator->nextPageUrl() }}" rel="next">
                    <i class="fas fa-chevron-right"></i>
                </a>
            </li>
        @endif
    </ul>
@endif
