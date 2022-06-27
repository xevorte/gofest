@if ($paginator->hasPages())
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
    <a class="prev text-decoration-none btn-outline-base fw-bolder d-none" aria-disabled="true" aria-label="@lang('pagination.previous')" aria-hidden="true">&#10094;</a>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" class="prev text-decoration-none btn-outline-base fw-bolder" rel="prev" aria-label="@lang('pagination.previous')">&#10094;</a>
    @endif

    {{-- Pagination Elements --}}
    <div class="text-center">
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="dot mx-2 d-none" aria-disabled="true"></span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="dot mx-2 active" aria-current="page"></span>
                    @else
                        <a href="{{ $url }}" class="dot mx-2"></a>
                    @endif
                @endforeach
            @endif
        @endforeach
    </div>

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="next text-decoration-none btn-outline-base fw-bolder" rel="next" aria-label="@lang('pagination.next')">&#10095;</a>
    @else
        <a class="next text-decoration-none btn-outline-base fw-bolder d-none" aria-disabled="true" aria-label="@lang('pagination.next')">&#10095;</a>
    @endif
@endif
