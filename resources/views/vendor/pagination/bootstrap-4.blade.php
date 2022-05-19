@if ($paginator->hasPages())
    <nav>
        <ul class="pagination-list">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="pagination-item pagination-item-prev disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <a aria-hidden="true">Назад</a>
                </li>
            @else
                <li class="pagination-item pagination-item-prev">
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">Назад</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="pagination-item disabled" aria-disabled="true"><a>{{ $element }}</a></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="pagination-item pagination-item-active" aria-current="page"><a>{{ $page }}</a></li>
                        @else
                            <li class="pagination-item"><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="pagination-item pagination-item-next active">
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">Вперёд</a>
                </li>
            @else
                <li class="pagination-item pagination-item-next" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <a aria-hidden="true">Вперёд</a>
                </li>
            @endif
        </ul>
    </nav>
@endif
