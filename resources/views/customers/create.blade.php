@extends('layouts.master')

@section('content')

    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
            	<div class="box box-info">
					<!-- header start -->
					<div class="box-header with-border">
						<h3 class="box-title">{{trans('customer.title')}}</h3>
						<div class="box-tools">
							<div class="btn-group pull-right" style="margin-right: 10px">
								<a href="{{ URL::route('customers.index') }}" class="btn btn-sm btn-default btn-flat"><i class="fa fa-list"></i>&nbsp;{{trans('customer.list')}}</a>
							</div> <div class="btn-group pull-right" style="margin-right: 10px">
								<a class="btn btn-sm btn-default form-history-back btn-flat"><i class="fa fa-arrow-left"></i>&nbsp;{{trans('customer.back')}}</a>
							</div>
						</div>
					</div>
					<!-- form start -->
					{!! Form::open(array('url' => 'customers', 'files' => true,'class'=>'form-horizontal')) !!}
					<div class="box-body">
						<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">

							{!! Form::label('name', trans('customer.name'), array('class' => 'col-sm-2 control-label')) !!}
							<div class="col-sm-8">
							@if($errors->has('name'))
								@foreach($errors->get('name') as $message)
									<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>{{$message}}</label></br>
								@endforeach
							@endif
							{!! Form::text('name', Input::old('name'), array('class' => 'form-control','placeholder'=>'Customer name...')) !!}
							</div>
						</div>
						<div class="form-group">
							{!! Form::label('gender', trans('customer.gender'), array('class' => 'col-sm-2 control-label')) !!}
							<div class="col-sm-8">
							{!! Form::text('gender', Input::old('gender'), array('class' => 'form-control')) !!}
							</div>
						</div>
						<div class="form-group {{ $errors->has('phone_number') ? 'has-error' : '' }}">
							{!! Form::label('phone_number', trans('customer.phone_number'),array('class' => 'col-sm-2 control-label')) !!}
							<div class="col-sm-8">
							@if($errors->has('phone_number'))
								@foreach($errors->get('phone_number') as $message)
									<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>{{$message}}</label></br>
								@endforeach
							@endif
							{!! Form::text('phone_number', Input::old('phone_number'), array('class' => 'form-control')) !!}
							</div>
						</div>
						<div class="form-group">
							{!! Form::label('email', trans('customer.email'),array('class' => 'col-sm-2 control-label')) !!}
							<div class="col-sm-8">
							{!! Form::text('email', Input::old('email'), array('class' => 'form-control')) !!}
							</div>
						</div>
						<div class="form-group">
							{!! Form::label('avatar', trans('customer.avatar'),array('class' => 'col-sm-2 control-label')) !!}

							<div class="col-sm-8">
								<input name="avatar" type="file" class="file" multiple data-show-upload="false" data-show-caption="true" >
							</div>
						</div>
						<div class="form-group">
						{!! Form::label('address', trans('customer.address'),array('class' => 'col-sm-2 control-label')) !!}
							<div class="col-sm-8">
							{!! Form::text('address', Input::old('address'), array('class' => 'form-control')) !!}
							</div>
						</div>
						<div class="form-group">
						{!! Form::label('zip', trans('customer.zip'),array('class' => 'col-sm-2 control-label')) !!}
							<div class="col-sm-8">
							{!! Form::text('zip', Input::old('zip'), array('class' => 'form-control')) !!}
							</div>
						</div>
						<div class="form-group">
						{!! Form::label('company_name', trans('customer.company_name'),array('class' => 'col-sm-2 control-label')) !!}
							<div class="col-sm-8">
							{!! Form::text('company_name', Input::old('company_name'), array('class' => 'form-control')) !!}
							</div>
						</div>
						<div class="form-group">
						{!! Form::label('comment', trans('customer.comment'),array('class' => 'col-sm-2 control-label')) !!}
							<div class="col-sm-8">
							{!! Form::text('comment', Input::old('comment'), array('class' => 'form-control')) !!}
							</div>
						</div>
						<div class="form-group">
						{!! Form::label('account', trans('customer.account'),array('class' => 'col-sm-2 control-label')) !!}
							<div class="col-sm-8">
							{!! Form::text('account', Input::old('account'), array('class' => 'form-control')) !!}
							</div>
						</div>

					</div>
					<div class="box-footer">
						{{ csrf_field() }}
						<div class="col-sm-2"></div>
						<div class="col-sm-8">
							<div class="pull-left">
								{!! Form::reset(trans('customer.reset'), array('class' => 'btn btn-warning btn-flat')) !!}
							</div>
							<div class="pull-right">
								{!! Form::submit(trans('customer.submit'), array('class' => 'btn btn-primary btn-flat')) !!}
							</div>
						</div>
					</div>
					{!! Form::close() !!}
					</div>
				</div>
            </div>
        </div>
    </section>

@endsection
