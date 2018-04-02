@extends('layouts.master')

@section('content')

    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="pull-right">
                            <div class="pull-right-btn" style="margin-right: 10px">

                                <a href="" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#filter-modal">
                                    <i class="fa fa-plus"></i>
                                    {{trans('customer.create')}}
                                </a>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-warning btn-flat">{{trans('customer.export')}}</button>
                                    <button type="button" class="btn btn-warning btn-flat dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <span class="fa fa-ellipsis-h"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <td>{{trans('customer.id')}}</td>
                                <td>{{trans('customer.avatar')}}</td>
                                <td>{{trans('customer.name')}}</td>
                                <td>{{trans('customer.email')}}</td>
                                <td>{{trans('customer.phone_number')}}</td>
                                <td>{{trans('customer.description')}}</td>
                                <td>{{trans('customer.operation')}}</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customer as $value)
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td>{!! Html::image('/images/' . $value->avatar, 'a picture', array('class' => 'thumb')) !!}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->email }}</td>
                                <td>{{ $value->phone_number }}</td>
                                <td>{{ $value->description }}</td>
                                <td>

                                    <div class="pull-right">
                                        <a class="btn btn-primary btn-flat" style="margin-right: 10px" href="{{ URL::to('customers/' . $value->id . '/edit') }}">{{trans('customer.edit')}}</a>
                                        {!! Form::open(array('url' => 'customers/' . $value->id, 'class' => 'pull-right')) !!}
                                            {!! Form::hidden('_method', 'DELETE') !!}
                                            {!! Form::submit(trans('customer.delete'), array('class' => 'btn btn-warning btn-flat')) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </td>

                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </<section>
    
@endsection