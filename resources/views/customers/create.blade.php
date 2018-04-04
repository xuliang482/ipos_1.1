@extends('layouts.master')

@section('content')

    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
            	<div class="box box-info">

            	<div class="box-body">
            		<div class="fields-group">
	            	{!! Html::ul($errors->all()) !!}

					{!! Form::open(array('url' => 'customers', 'files' => true,'class'=>'form-horizontal')) !!}

					<div class="form-group">
						{!! Form::label('name', trans('customer.name') .' *', array('class' => 'col-sm-2 control-label')) !!}
						<div class="col-sm-8">
						{!! Form::text('name', Input::old('name'), array('class' => 'form-control')) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('gender', trans('customer.gender') .' *', array('class' => 'col-sm-2 control-label')) !!}
						<div class="col-sm-8">
						{!! Form::text('gender', Input::old('gender'), array('class' => 'form-control')) !!}
						</div>
					</div>

					<div class="form-group">
						{!! Form::label('phone_number', trans('customer.phone_number'),array('class' => 'col-sm-2 control-label')) !!}
						<div class="col-sm-8">
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
						{!! Form::file('avatar', Input::old('avatar'), array('class' => 'form-control')) !!}
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
					{!! Form::label('account', trans('customer.account') .' #',array('class' => 'col-sm-2 control-label')) !!}
						<div class="col-sm-8">
						{!! Form::text('account', Input::old('account'), array('class' => 'form-control')) !!}
						</div>
					</div>
					<div class="pull-right">
					{!! Form::submit(trans('customer.submit'), array('class' => 'btn btn-primary btn-flat')) !!}
					</div>
					{!! Form::close() !!}
					</div>
				</div>
			</div>
            </div>
        </div>
    </section>
@endsection