@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li style="border-radius: 4px" class="mdui-float-right mdui-btn mdui-btn-dense mdui-color-theme-accent mdui-ripple">上一页</li>
            @else
                <li style="border-radius: 4px" class="mdui-float-right mdui-btn mdui-btn-dense mdui-color-theme-accent mdui-ripple">
                    <a href="{{ $paginator->previousPageUrl() }}" style="color: #ffffff">上一页</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li style="border-radius: 4px" class="mdui-color-theme-accent mdui-float-right mdui-btn mdui-btn-dense">{{ $element }}</li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li style="border-radius: 4px" class="mdui-color-theme-accent mdui-float-right mdui-btn mdui-btn-dense">第{{ $page }}页</li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a style="border-radius: 4px" href="{{ $paginator->nextPageUrl() }}" class="mdui-float-right mdui-btn mdui-btn-dense mdui-color-theme-accent mdui-ripple">下一页</a>
                </li>
            @else
                <li style="border-radius: 4px" class="mdui-float-right mdui-btn mdui-btn-dense mdui-color-theme-accent mdui-ripple">下一页</li>
            @endif
        </ul>
    </nav>
@endif
