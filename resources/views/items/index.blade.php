@extends('layouts.master')

@section('content')

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
            	<div class="box-header">
            		<div class="pull-right">
                        <div class="btn-group pull-right" style="margin-right: 10px">
                            <a href="" class="btn btn-sm btn-primary btn-flat"><i class="glyphicon glyphicon-import"></i>&nbsp;&nbsp;{{trans('customer.import')}}</a>
                         </div>
            	
                		<div class="btn-group pull-right" style="margin-right: 5px">
                            <a href="{{ route('items.create') }}" class="btn btn-sm btn-success btn-flat">
                                <i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;{{trans('item.create')}}
                            </a>
                        </div>
                    </div>
            	</div>
            	<div class="box-body table-responsive no-padding">
    		 		<table class="table table-hover">
                        <thead>
                            <tr>
                             	<th><input type="checkbox" class="check"></th>
                                <th class="sorting">{{trans('item.id')}}</th>
                                <th class="sorting">{{trans('item.avatar')}}</th>
                                <th class="sorting">{{trans('item.upc_ean_isbn')}}</th>
                                <th class="sorting">{{trans('item.name')}}</th>
                                <th class="sorting">{{trans('item.category')}}</th>
                                <th class="sorting">{{trans('item.cost_price')}}</th>
                                <th class="sorting">{{trans('item.selling_price')}}</th>
                                <th class="sorting">{{trans('item.quantity')}}</th>
                                <th class="sorting">{{trans('item.description')}}</th>
                                <th class="sorting">{{trans('item.operation')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($item as $value)
                            <tr>
                            	<td><input type="checkbox" class="check" name="ids[]" id="customer_id_{{ $value->id }}" value="{{ $value->id }}"></td>
                                <td>{{ $value->id }}</td>
                                <td>{!! Html::image('/images/items/' . $value->avatar, 'a picture', array('class' => 'thumb')) !!}</td>
                                <td>{{ $value->upc_ean_isbn }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->category }}</td>
                                <td>{{ $value->cost_price }}</td>
                                <td>{{ $value->selling_price }}</td>
                                <td>{{ $value->selling_price }}</td>
                                <td>{{ $value->description }}</td>
                                <td>
                                <a href="{{ URL::to('items/' . $value->id . '/edit') }}">
                                	<i class="fa fa-edit"></i>
                                </a>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot></tfoot>
                    </table>
        		 
        		 	<div class="box-footer clearfix">
        		 		<div class="col-sm-7">
    						<div class="pull-right">
                    			{{ $item->links('partials.paginator') }}
                    		</div>
                    	</div>
        		 	</div>
            	</div>
           		 </div>
         </div>
     </div>
</section>
 	
@endsection

@section('scripts')

   <script>
    $("div.alert").not('.alert-important').delay(4000).slideUp(200, function() {
        $(this).alert('close');
    });

    //iCheck for checkbox
    $(document).ready(function(){
        $('input').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            increaseArea: '20%' // optional
        });
    });

    $('#check-all').on('ifChecked', function(event) {
        $('.check').iCheck('check');
    });
    $('#check-all').on('ifUnchecked', function(event) {
        $('.check').iCheck('uncheck');
    });
    // Removed the checked state from "All" if any checkbox is unchecked
    $('#check-all').on('ifChanged', function(event){
        if(!this.changed) {
            this.changed=true;
            $('#check-all').iCheck('check');
        } else {
            this.changed=false;
            $('#check-all').iCheck('uncheck');
        }
        $('#check-all').iCheck('update');
    });
	</script>
	
@endsection

