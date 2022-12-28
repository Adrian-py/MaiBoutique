<div class="pagination">
    <a href="{{ $list->previousPageUrl() }}" class="pagination__link">Previous</a>
    <div class="pagination__pages">
        @if($list->currentPage() > 6)
            @for($i = 1; $i <= 3; $i++)
                <a class="pagination__page-link" href="{{ $list->url($i) }}">{{ $i }}</a>
            @endfor
            <p>...</p>
        @endif

        @for($i = $list->currentPage()-3; $i < $list->currentPage(); $i++)
            @if($i >0)
                <a class="pagination__page-link" href="{{ $list->url($i) }}">{{ $i }}</a>
            @endif
        @endfor

        @for($i = $list->currentPage(); $i <= $list->lastPage() && $i<=$list->currentPage()+3; $i++)
            <a class="pagination__page-link" href="{{ $list->url($i) }}">{{ $i }}</a>
        @endfor
    </div>
    <a href="{{ $list->nextPageUrl() }}" class="pagination__link">Next</a>
</div>