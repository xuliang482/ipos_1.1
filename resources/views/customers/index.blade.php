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
                           data-search="true"
                           data-show-refresh="true"
                           data-show-columns="true"
                           data-show-export="true"
                           data-minimum-count-columns="2"
                           data-pagination="true"
                           data-id-field="id"
                           data-page-list="[10, 25, 50, 100, ALL]"
                           data-classes="table table-hover"
                           data-sort-name="id"
       					   data-sort-order="desc"
       					   >
                       <thead>
                            <tr>
                             	<th data-field="state"  data-checkbox="true" width="10px;"></th>
                                <th data-field="id" 	data-sortable="true">{{trans('customer.id')}}</th>
                                <th data-field="avatar" data-sortable="true">{{trans('customer.avatar')}}</th>
                                <th data-field="name"   data-sortable="true">{{trans('customer.name')}}</th>
                                <th data-field="email"  data-sortable="true">{{trans('customer.email')}}</th>
                                <th data-field="phone_number" data-sortable="true">{{trans('customer.phone_number')}}</th>
                                <th data-field="comment" data-sortable="true">{{trans('customer.comment')}}</th>
                                <th data-field="operation" data-formatter="operateFormatter" data-events="operateEvents">{{trans('customer.operation')}}</th>
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

    var mydata = {!! $customer !!};
    console.log(mydata);
    $table.bootstrapTable({data: mydata});

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

    function responseHandler(res) {
      $.each(res.rows, (i, row) => {
        row.state = $.inArray(row.id, selections) !== -1;
      });
      return res;
    }

    function operateFormatter(value, row, index) {
      return [
        '<a class="edit ml10" href="javascript:void(0)" title="编辑">',
        '<i class="fa fa-edit"></i>',
    	'</a>&nbsp;&nbsp;',
        '<a class="remove" href="javascript:void(0)" title="删除">',
        '<i class="fa fa-trash"></i>',
        '</a>'
      ].join('');
    }

    window.operateEvents = {
    	    
      'click .edit': function (e, value, {id}, index) {
          var url = 'customers/'+ [id] +'/edit';
          window.location.href = url;
          console.log(value, row, index);
      },
      
      'click .remove': function(e, value, {id}, index) {

          var url = 'customers/'+ [id];
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          $.ajax({
              url: url,
              type: 'DELETE',
              data: {
                  "id": [id]
              },
              success: function (response) {
            	  console.log(response);
              }
          });

          $table.bootstrapTable('remove', {
              field: 'id',
              values: [id]
            });
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

