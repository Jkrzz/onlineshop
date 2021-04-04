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

@if ($paginator->lastPage() > 1)
<ul class="pagination room-box-padding">
    <li>
        <a href="{{ $paginator->url(1) }}" class="room-box"><i class="fa fa-arrow-left"></i></a>
    </li>
   @for  ($i = 1; $i <= $paginator->lastPage(); $i++)
   <li class="">
        <a href="{{ $paginator->url($i) }}" class="room-box {{ ($paginator->currentPage() == $i) ? 'room-box-pa' : '' }}">{{$i}}</a>
   </li>
   @endfor
    <li>
        <a href="{{ $paginator->url($paginator->currentPage()+1) }}" class="room-box"><i class="fa fa-arrow-right"></i></a>        
    </li>
</ul> 
@endif
