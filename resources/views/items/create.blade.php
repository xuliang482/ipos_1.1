@extends('layouts.master')

@section('content')

    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
            	<div class="box box-info">
					<!-- header start -->
					<div class="box-header with-border">
						<h3 class="box-title">{{trans('item.title')}}</h3>
						<div class="box-tools">
							<div class="btn-group pull-right" style="margin-right: 10px">
								<a href="{{ URL::route('items.index') }}" class="btn btn-sm btn-default btn-flat"><i class="fa fa-list"></i>&nbsp;{{trans('item.list')}}</a>
							</div> <div class="btn-group pull-right" style="margin-right: 10px">
								<a class="btn btn-sm btn-default form-history-back btn-flat"><i class="fa fa-arrow-left"></i>&nbsp;{{trans('item.back')}}</a>
							</div>
						</div>
					</div>
					<!-- form start -->
					{!! Form::open(array('url' => 'items', 'files' => true,'class'=>'form-horizontal')) !!}
					<div class="box-body">
						<div class="form-group {{ $errors->has('upc_ean_isbn') ? 'has-error' : '' }}">
							{!! Form::label('upc_ean_isbn', trans('item.upc_ean_isbn'), array('class' => 'col-sm-2 control-label')) !!}
							<div class="col-sm-8">
							@if($errors->has('upc_ean_isbn'))
								@foreach($errors->get('upc_ean_isbn') as $message)
									<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>{{$message}}</label></br>
								@endforeach
							@endif
							{!! Form::text('upc_ean_isbn', Input::old('upc_ean_isbn'), array('class' => 'form-control','placeholder'=>'item name...')) !!}
							</div>
						</div>
						<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
							{!! Form::label('name', trans('item.name'), array('class' => 'col-sm-2 control-label')) !!}
							<div class="col-sm-8">
							@if($errors->has('name'))
								@foreach($errors->get('name') as $message)
									<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>{{$message}}</label></br>
								@endforeach
							@endif
							{!! Form::text('name', Input::old('name'), array('class' => 'form-control','placeholder'=>'item name...')) !!}
							</div>
						</div>
						<div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
							{!! Form::label('category', trans('item.category'),array('class' => 'col-sm-2 control-label')) !!}
							<div class="col-sm-8">
							@if($errors->has('category'))
								@foreach($errors->get('category') as $message)
									<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>{{$message}}</label></br>
								@endforeach
							@endif
							{!! Form::text('category', Input::old('category'), array('class' => 'form-control')) !!}
							</div>
						</div>
						<div class="form-group {{ $errors->has('cost_price') ? 'has-error' : '' }}">
							{!! Form::label('cost_price', trans('item.cost_price'),array('class' => 'col-sm-2 control-label')) !!}
							<div class="col-sm-8">
							@if($errors->has('cost_price'))
								@foreach($errors->get('cost_price') as $message)
									<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>{{$message}}</label></br>
								@endforeach
							@endif
								<div class="input-group">
        							<div class="input-group-addon">
                            			<i class="fa fa-cny"></i>
                          			</div>
								{!! Form::text('cost_price', Input::old('cost_price'), array('class' => 'form-control')) !!}
								</div>
							</div>
						</div>
						<div class="form-group {{ $errors->has('selling_price') ? 'has-error' : '' }}">
							{!! Form::label('selling_price', trans('item.selling_price'),array('class' => 'col-sm-2 control-label')) !!}
							<div class="col-sm-8">
							@if($errors->has('selling_price'))
								@foreach($errors->get('selling_price') as $message)
									<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>{{$message}}</label></br>
								@endforeach
							@endif
								<div class="input-group">
        							<div class="input-group-addon">
                            			<i class="fa fa-cny"></i>
                          			</div>
    								{!! Form::text('selling_price', Input::old('selling_price'), array('class' => 'form-control')) !!}
								</div>
							</div>
						</div>
						
						
						<div class="form-group">
						{!! Form::label('quantity', trans('item.quantity'),array('class' => 'col-sm-2 control-label')) !!}
							<div class="col-sm-8">
							{!! Form::text('quantity', Input::old('quantity'), array('class' => 'form-control')) !!}
							</div>
						</div>
						
						<div class="form-group">
							{!! Form::label('avatar', trans('item.avatar'),array('class' => 'col-sm-2 control-label')) !!}

							<div class="col-sm-8">
								<input name="avatar" id="avatar" type="file" class="file" multiple data-show-upload="false" data-show-caption="true" >
							</div>
						</div>
						
						<div class="form-group">
						{!! Form::label('description', trans('item.description'),array('class' => 'col-sm-2 control-label')) !!}
							<div class="col-sm-8">
							{!! Form::text('description', Input::old('description'), array('class' => 'form-control')) !!}
							</div>
						</div>
						

					</div>
					<div class="box-footer">
						{{ csrf_field() }}
						<div class="col-sm-2"></div>
						<div class="col-sm-8">
							<div class="pull-left">
								{!! Form::reset(trans('item.reset'), array('class' => 'btn btn-warning btn-flat')) !!}
							</div>
							<div class="pull-right">
								{!! Form::submit(trans('item.submit'), array('class' => 'btn btn-primary btn-flat')) !!}
							</div>
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

		$("#avatar").fileinput({
			theme: 'fa',
			language: 'zh',
			showUpload: false,
			showCaption: false,
			showRemove:false,
			browseIcon: "<i class='glyphicon glyphicon-picture'></i> ",
			browseClass: "btn btn-primary btn-flat",
			allowedFileExtensions: ["jpg", "png"]
		});

	</script>
	@endsection