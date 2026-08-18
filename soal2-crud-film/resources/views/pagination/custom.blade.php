@if ($paginator->hasPages())
    <nav aria-label="Navigasi halaman">
        <ul class="pagination">
            @if ($paginator->onFirstPage())
                <li><span>&laquo; Sebelumnya</span></li>
            @else
                <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo; Sebelumnya</a></li>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <li><span>{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active" aria-current="page"><span>{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">Berikutnya &raquo;</a></li>
            @else
                <li><span>Berikutnya &raquo;</span></li>
            @endif
        </ul>
    </nav>
@endif
