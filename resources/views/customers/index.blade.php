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
                    @if (Session::has('message')) 
                     <div id="success-alert">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    </div>
                    @endif
            
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

    //iCheck for checkbox
     /*$(document).ready(function(){
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
	*/

	const $table = $('#table');
    const $remove = $('#remove');
    let selections = [];

	$(function () {
		$table.bootstrapTable({
	        data: {!! $customer !!}
	    });

	});


    function initTable() {
        $table.bootstrapTable({
            height: getHeight(),
            buttonsClass:'default btn-flat'
        });
        // sometimes footer render error.
        setTimeout(() => {
          $table.bootstrapTable('resetView');
        }, 200);
        $table.on('check.bs.table uncheck.bs.table ' +
                  'check-all.bs.table uncheck-all.bs.table', () => {
          $remove.prop('disabled', !$table.bootstrapTable('getSelections').length);

          // save your data, here just save the current page
          selections = getIdSelections();
          // push or splice the selections if you want to save all data selections
        });
        $table.on('expand-row.bs.table', (e, index, row, $detail) => {
          if (index % 2 == 1) {
            $detail.html('Loading from ajax request...');
            $.get('LICENSE', res => {
              $detail.html(res.replace(/\n/g, '<br>'));
            });
          }
        });
        $table.on('all.bs.table', (e, name, args) => {
          console.log(name, args);
        });
        $remove.click(() => {
          const ids = getIdSelections();
          console.log(ids);
          var url = 'customers/' + ids;
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

	
    function operateFormatter(value, row, index) {
        return [
          '<a class="edit" href="javascript:void(0)" title="编辑">',
          '<i class="fa fa-edit"></i>',
      	  '</a>&nbsp;&nbsp;'
        ].join('');
      }
    
    window.operateEvents = {
        'click .edit': function (e, value, row, index) {
        	 var url = 'customers/'+ row.id +'/edit';
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

