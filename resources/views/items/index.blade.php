@extends('layouts.master')

@section('content')
<section class="content-header">
    <h1>{{trans('item.title')}}
        <small>{{trans('item.list')}}</small>
    </h1>
</section>
<section class="content">
   <!-- message common by toastr  -->
   @include('partials.toastr')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
            	<div class="box-header with-border">
            		<div class="pull-right">
                        <div class="btn-group pull-right" style="margin-right: 10px">
                            <a href="" class="btn btn-primary btn-flat"><i class="glyphicon glyphicon-import"></i>&nbsp;&nbsp;{{trans('customer.import')}}</a>
                         </div>
            	
                		<div class="btn-group pull-right" style="margin-right: 5px">
                            <a href="{{ route('items.create') }}" class="btn btn-success btn-flat">
                                <i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;{{trans('item.create')}}
                            </a>
                        </div>
                    </div>
            	</div>
            	<div id="toolbar">
                  <button id="remove" class="btn btn-danger btn-flat" disabled data-toggle="modal" data-target="#confirmDelete" data-title="{{trans('item.title')}}" data-message="{{trans('item.message_confirm_delete')}}">
                    <i class="fa fa-trash"></i> {{trans('item.delete')}}
                  </button>
                  <button id="generate_barcodes" class="btn btn-default btn-flat" disabled>
                    <i class="fa fa-barcode"></i> {{trans('item.generate_barcodes')}}
                  </button>
                </div>
            	<div class="box-body">
    		 		 <table id="table"
                          data-toolbar="#toolbar"
                          data-pagination="true"
                          data-search="true"
                          data-click-to-select="true"
                          data-sort-name="id"
                          data-sort-order="desc">
                        <thead>
                            <tr>
                             	<th data-field="state"  data-checkbox="true" width="10px;"></th>
                                <th data-field="id" 	data-sortable="true">{{trans('item.id')}}</th>
                                <th data-field="avatar" 	data-sortable="true" data-formatter="avatarFormatter">{{trans('item.avatar')}}</th>
                                <th data-field="upc_ean_isbn" 	data-sortable="true">{{trans('item.upc_ean_isbn')}}</th>
                                <th data-field="name" 	data-sortable="true">{{trans('item.name')}}</th>
                                <th data-field="category" 	data-sortable="true">{{trans('item.category')}}</th>
                                <th data-field="cost_price" 	data-sortable="true">{{trans('item.cost_price')}}</th>
                                <th data-field="selling_price" 	data-sortable="true">{{trans('item.selling_price')}}</th>
                                <th data-field="quantity" 	data-sortable="true">{{trans('item.quantity')}}</th>
                                <th data-field="description" 	data-sortable="true">{{trans('item.description')}}</th>
                                <th data-field="operate"  data-formatter="operateFormatter" data-events="operateEvents">{{trans('item.operation')}}</th>
                            </tr>
                        </thead>
                    </table>
            	</div>
           	</div>
         </div>
     </div>
</section>
 	<!-- when record is deleted,confirm model is popuped  -->
	@include('partials.confirm')
@endsection

@section('scripts')

   <script>
    $("div.alert").not('.alert-important').delay(4000).slideUp(200, function() {
        $(this).alert('close');
    });

    
    const $table = $('#table');
    const $remove = $('#remove');
    const $generate_barcodes = $('#generate_barcodes');
    
    let selections = [];

	var json = {!! $items !!};
	var route = "items/";

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
          
          $generate_barcodes.prop('disabled', !$table.bootstrapTable('getSelections').length);
          
          selections = getIdSelections();
        });

        //生成商品标签
        $generate_barcodes.click(() => {

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

   
    function avatarFormatter(value, row, index) {

    	var url = '{!! asset('/images/items/') !!}/' + value;
        return [
        	'<a class="preview" href="' + url +  '">',
        	 '<img src="' + url + '">',
            '</a>'
       	 
        ].join('');
      }

	//the update link to setting
    function operateFormatter(value, row, index) {
        return [
       	  '<a class="inventory" href="javascript:void(0)" title="更新库存">',
          '<i class="fa fa-tags"></i>',
          '</a>&nbsp;&nbsp;',
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


	$('#filters').on('hidden.bs.select', function(e)
	{
        table_support.refresh();
    });



    
    function getHeight() {
        return $(window).height() - $('h1').outerHeight(true);
    }

    $(() => {
    	initTable();
    })
     
    
    
   	//删除商品确认信息(模态窗口)
    $('#confirmDelete').on('show.bs.modal', function (e) {
	   
        $message = $(e.relatedTarget).attr('data-message');
        $(this).find('.modal-body').text($message);
        $title = $(e.relatedTarget).attr('data-title');
        $(this).find('.modal-title').text($title);

    });
    
    <!-- Form confirm (yes/ok) handler, submits form -->
    $('#confirmDelete').find('.modal-footer #confirm').on('click', function(){

        const ids = getIdSelections();
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
          complete: function () {
        	  $('#confirmDelete').modal('hide');
        	  window.location.reload();
            }
        }); 
        
    });
    


    this.imagePreview = function(){	
    	/* CONFIG */
    		
    		xOffset = 100;
    		yOffset = 300;
    		
    		// these 2 variable determine popup's distance from the cursor
    		// you might want to adjust to get the right result
    		
    	/* END CONFIG */
    	$("a.preview").hover(function(e){
    		this.t = this.title;
    		this.title = "";	
    		var c = (this.t != "") ? "<br/>" + this.t : "";
    		$("body").append("<p id='preview'><img src='"+ this.href +"' alt='Image preview' />"+ c +"</p>");								 
    		$("#preview")
    			.css("top",(e.pageY - xOffset) + "px")
    			.css("left",(e.pageX + yOffset) + "px")
    			.fadeIn("fast");						
        },
    	function(){
    		this.title = this.t;	
    		$("#preview").remove();
        });	
    	$("a.preview").mousemove(function(e){
    		$("#preview")
    			.css("top",(e.pageY - xOffset) + "px")
    			.css("left",(e.pageX + yOffset) + "px");
    	});			
    };


    // starting the script on page load
    $(document).ready(function(){
    	imagePreview();
    });
    
    
	</script>
	
@endsection

