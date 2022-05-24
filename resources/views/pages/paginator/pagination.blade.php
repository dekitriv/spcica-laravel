
@if ($paginator->lastPage() > 1)
    <div class="styled-pagination d-flex justify-content-around">
        <ul class="clearfix">
            <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
                <a href="{{ $paginator->url(1) }}"><span class="fa fa-angle-left"></span></a>
            </li>
            @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                    <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
                </li>
            @endfor
            <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
                <a href="{{ $paginator->url($paginator->currentPage()+1) }}" ><span class="fa fa-angle-right"></span></a>
            </li>
        </ul>
    </div>
@endif
