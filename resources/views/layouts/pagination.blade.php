@if ($paginator->lastPage() > 1)
    <ul class="uk-pagination" uk-margin>
        <li><a class="{{ $paginator->currentPage() == 1 ? ' uk-disabled' : '' }}" href="{{ $paginator->previousPageUrl() }}"><span uk-pagination-previous></span></a></li>
        
        <?php $firstPage = $paginator->currentPage() - 5 > 0 ? $paginator->currentPage() - 5 : 1 ?>
        <?php $lastPage = $paginator->currentPage() + 10 > $paginator->lastPage() ? $paginator->lastPage() : $firstPage + 10 ?>
        @for ($i = $firstPage; $i < $lastPage; $i++)
            <li><a class="{{ $paginator->currentPage() == $i ? ' uk-active' : '' }}" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
        @endfor

        <li><a class="{{ $paginator->currentPage() == $paginator->lastPage() ? ' uk-disabled' : '' }}" href="{{ $paginator->nextPageUrl() }}"><span uk-pagination-next></span></a></li>
    </ul>
@endif