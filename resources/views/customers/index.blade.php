@extends('layouts.master')

@section('content')
<section class="content-header">
    <h1>{{trans('customer.title')}}
        <small>{{trans('customer.list')}}</small>
    </h1>
</section>
<section class="content">
   @include('partials.toastr')
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
                <div id="toolbar">
                  <button id="remove" class="btn btn-danger btn-flat" disabled>
                    <i class="fa fa-trash"></i> {{trans('customer.delete')}}
                  </button>
                </div>
                <div class="box-body">
                   <table id="table"
                          data-toolbar="#toolbar"
                          data-show-refresh="true"
                          data-show-columns="true"
                          data-pagination="true"
                          data-search="true"
                          data-click-to-select="true"
                          data-sort-name="id"
                          data-sort-order="desc">
                       <thead>
                            <tr>
                             	<th data-field="state"  data-checkbox="true" width="10px;"></th>
                                <th data-field="id" 	data-sortable="true">{{trans('customer.id')}}</th>
                                <th data-field="avatar" data-sortable="true">{{trans('customer.avatar')}}</th>
                                <th data-field="name"   data-sortable="true">{{trans('customer.name')}}</th>
                                <th data-field="email"  data-sortable="true">{{trans('customer.email')}}</th>
                                <th data-field="phone_number" data-sortable="true">{{trans('customer.phone_number')}}</th>
              					<th data-field="comment" data-sortable="true">{{trans('customer.comment')}}</th>
                                <th data-field="operate"  data-formatter="operateFormatter" data-events="operateEvents">{{trans('customer.operation')}}</th>
                            </tr>
                    	</thead>
                    </table>

				</div>
            </div>
         </div>
     </div>
</section>	
@endsection

@section('scripts')

<script>
   
    $("div.alert").not('.alert-import').delay(4000).slideUp(200, function() {
        $(this).alert('close');
    });

	const $table = $('#table');
    const $remove = $('#remove');
    let selections = [];

	var json = {!! $customer !!};
	var route = "customers/";

	//json data to init
	$(function () {
		$table.bootstrapTable({
	        data: json
	    });
	});

	//bootstrap-table init
    function initTable() {
        $table.bootstrapTable({
            height: getHeight()
        });
        // sometimes footer render error.
        setTimeout(() => {
          $table.bootstrapTable('resetView');
        }, 200);
        $table.on('check.bs.table uncheck.bs.table ' +
                  'check-all.bs.table uncheck-all.bs.table', () => {
          $remove.prop('disabled', !$table.bootstrapTable('getSelections').length);
          selections = getIdSelections();
        });

        $remove.click(() => {
          const ids = getIdSelections();
          console.log(ids);
          var url = route + ids;
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          $.ajax({
              url: url,
              type: 'DELETE',
              data: {
                  "id": ids
              },
              success: function (response) {
            	  console.log(response);
              }
          });
          $table.bootstrapTable('remove', {
            field: 'id',
            values: ids
          });
          $remove.prop('disabled', true);
        });
        $(window).resize(() => {
          $table.bootstrapTable('resetView', {
            height: getHeight()
          });
        });
      }
	

    function getIdSelections() {
        return $.map($table.bootstrapTable('getSelections'), ({id}) => id);
      }

	//the update link to setting
    function operateFormatter(value, row, index) {
        return [
          '<a class="edit" href="javascript:void(0)" title="编辑">',
          '<i class="fa fa-edit"></i>',
      	  '</a>&nbsp;&nbsp;'
        ].join('');
      }

    //the update event to setting 
    window.operateEvents = {
        'click .edit': function (e, value, row, index) {
        	 var url = route + row.id +'/edit';
              window.location.href = url;
        }
    };

    function getHeight() {
        return $(window).height() - $('h1').outerHeight(true);
    }

    $(() => {
    	initTable();
    })
    
</script>
	
@endsection

