@if ($paginator->hasPages())

        <div class="btn-group" style="margin-right: 25px;">
            {!! Form::open(array('url' => 'customers', 'class'=>'form-horizontal','method' => 'get')) !!}
                <div class="form-group">
                    {!! Form::label('total', trans('customer.total').$paginator->total().trans('customer.unit').',', array('class' => 'control-label')) !!}
                    {!! Form::label('per_page', trans('customer.per_page'), array('class' => 'control-label')) !!}
                    {!! Form::select('per_page', array('10' => '10', '20' => '20', '50' => '50'), array('class' => 'form-control'),['onchange' => 'submit();'] )!!}
                    {!! Form::label('unit', trans('customer.unit'), array('class' => 'control-label')) !!}
                </div>
            {!! Form::close() !!}
        </div>

        <div class="btn-group">
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" ><span class="page-link" style="border-radius:0;">&laquo;</span></li>
                @else
                    <li class="page-item"><a class="page-link btn-flat" href="{{ $paginator->previousPageUrl() }}" rel="prev" style="border-radius:0;">&laquo;</a></li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" style="border-radius:0;">&raquo;</a></li>
                @else
                    <li class="page-item disabled"><span class="page-link" style="border-radius:0;">&raquo;</span></li>
                @endif
            </ul>
        </div>
@endif
