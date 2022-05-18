<div class="row">
    <div class="col-lg-12">
        <nav>
            @if($paginator->hasPages())
                <ul class="pagination pagination-style-one justify-content-center pt-80">

                    @if($paginator->onFirstPage())

                    @else
                    <li class="page-item page-arrow">
                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}"><i class="bi bi-chevron-double-left"></i></a>
                    </li>
                    @endif


                    @foreach ($elements as $element)
                        @foreach ($element as $page => $url)
                            @if($paginator->currentPage() == $page)
                                <li class="page-item active"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endforeach

                    @if($paginator->hasMorePages())
                        <li class="page-item page-arrow">
                            <a class="page-link" href="{{ $paginator->nextPageUrl() }}"><i class="bi bi-chevron-double-right"></i></a>
                        </li>
                    @endif
                </ul>

            @endif
        </nav>
    </div>
</div>
