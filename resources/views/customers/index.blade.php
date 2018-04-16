@extends('layouts.master')

@section('content')
<section class="content-header">
    <h1>{{trans('customer.title')}}
        <small>{{trans('customer.list')}}</small>
    </h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
            	<div class="box-header with-border">
                    <div class="pull-right">
                        <div class="btn-group" style="margin-right: 5px">
                            <a href="{{ route('customers.create') }}" class="btn btn-sm btn-success btn-flat">
                                <i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;{{trans('customer.create')}}
                            </a>
                        </div>
                        <div class="btn-group">
                            <a href="" class="btn btn-sm btn-primary btn-flat"><i class="glyphicon glyphicon-import"></i>&nbsp;&nbsp;{{trans('customer.import')}}</a>
                         </div>
                    </div>
                </div>
                {!! Form::open(array('url' => 'customers', 'method' => 'PUT','class'=>'form-horizontal')) !!}
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                             	<th width="10px;"><input type="checkbox" class="check"></th>
                                <th>{{trans('customer.id')}}</th>
                                <th>{{trans('customer.avatar')}}</th>
                                <th>{{trans('customer.name')}}</th>
                                <th>{{trans('customer.email')}}</th>
                                <th>{{trans('customer.phone_number')}}</th>
                                <th>{{trans('customer.comment')}}</th>
                                <th>{{trans('customer.operation')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customer as $value)
                            <tr>
                            	<td><input type="checkbox" class="check" name="ids[]" id="customer_id_{{ $value->id }}" value="{{ $value->id }}"></td>
                                <td>{{ $value->id }}</td>
                                <td>{!! Html::image('/images/customers/' . $value->avatar, 'a picture', array('class' => 'thumb')) !!}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->email }}</td>
                                <td>{{ $value->phone_number }}</td>
                                <td>{{ $value->description }}</td>
                                <td>
                                <a href="{{ URL::to('customers/' . $value->id . '/edit') }}">
                                	<i class="fa fa-edit"></i>
                                </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            	</div>
                <div class="box-footer">
                    <div class="pull-left">
                        <input type="checkbox" id="check-all">
                        {!! Form::submit(trans('customer.delete'), array('class' => 'btn btn-default btn-flat')) !!}
                    </div>

                    <div class="pull-right">
                        {{ $customer->links('partials.paginator') }}
                    </div>
                </div>
                {!! Form::close() !!}
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

