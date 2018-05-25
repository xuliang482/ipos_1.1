@if(Session::has('toastr'))
    @php
        $toastr     = Session::get('toastr');
        $type       = array_get($toastr, 'type', 'success');
        $message    = array_get($toastr, 'message', '');
   		$options    = json_encode(array_get($toastr, 'options', ''),JSON_PRETTY_PRINT);
    @endphp
    <script>
    	$(function () {
       		toastr.{{$type}}('{!!  $message  !!}', null, {!! $options !!});
    	});
    </script>
@endif