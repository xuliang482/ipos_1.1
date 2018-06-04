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
                 {!! Form::open(array('url' => 'customers/', 'class' => 'pull-right')) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                  	<button id="remove" class="btn btn-danger btn-flat" disabled data-toggle="modal" data-target="#confirmDelete" data-title="{{trans('customer.title')}}" data-message="{{trans('customer.message_confirm_delete')}}">
                    	<i class="fa fa-trash"></i> {{trans('customer.delete')}}
                 	 </button>
                {!! Form::close() !!}   
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

	@include('partials.confirm')
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
          console.log(selections);
        });

/*         $remove.click(() => {
            
          const ids = getIdSelections();
          //console.log(ids);
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
              success: function (data) {
				alert(111111111);
            	$("#modal-default").modal('show');
            	//  console.log(response);
              }
          }); 
          $table.bootstrapTable('remove', {
            field: 'id',
            values: ids
          });

          
          $remove.prop('disabled', true);
        }); */
        
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
    

   //删除客户确认信息(模态窗口)
   $('#confirmDelete').on('show.bs.modal', function (e) {
	   
        $message = $(e.relatedTarget).attr('data-message');
        $(this).find('.modal-body').text($message);
        $title = $(e.relatedTarget).attr('data-title');
        $(this).find('.modal-title').text($title);
    
        // Pass form reference to modal for submission on yes/ok
        var form = $(e.relatedTarget).closest('form');
        $(this).find('.modal-footer #confirm').data('form', form);
    });
    
    <!-- Form confirm (yes/ok) handler, submits form -->
    $('#confirmDelete').find('.modal-footer #confirm').on('click', function(){
        
        $(this).data('form').submit();
    });
    
</script>
	
@endsection

