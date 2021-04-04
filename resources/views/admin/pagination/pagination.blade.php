{{-- @if ($paginator->lastPage() > 1)
<ul class="pagination">
    <li class="{{ ($paginator->currentPage() == 1) ? ' bg-danger' : '' }}">
        <a href="{{ $paginator->url(1) }}">Previous</a>
    </li>
    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
        <li class="{{ ($paginator->currentPage() == $i) ? ' bg-success' : '' }}">
            <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
        </li>
    @endfor
    <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' bg-danger' : '' }}">
        <a href="{{ $paginator->url($paginator->currentPage()+1) }}" >Next</a>
    </li>
</ul>
@endif --}}
@if($paginator->lastPage() > 1)
<nav aria-label="Page navigation example">
    <ul class="pagination">
      <li class="page-item">
        <a class="page-link" href="{{ $paginator->url(1) }}" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
          <span class="sr-only">Previous</span>
        </a>
      </li>
      @for ($i = 1; $i  <= $paginator->lastPage(); $i++)
      <li class="page-item {{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
        <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
      @endfor
      <li class="page-item">
        <a class="page-link" href="{{ $paginator->url($paginator->currentPage()+1) }}" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
          <span class="sr-only">Next</span>
        </a>
      </li>
    </ul>
  </nav>
  @endif