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
    		 		 <table id="table"></table>
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
$(document).ready(function()
{
	console.log('table_suport');
    table_support.init({
    	
    	resource: 'items',
        headers: {!! TabularHelper::get_items_manage_table_headers() !!},
        pageSize:10
        //uniqueId: 'customers.id'
            
    });

    imagePreview();
});
 
    $("div.alert").not('.alert-important').delay(4000).slideUp(200, function() {
        $(this).alert('close');
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
    
	</script>
	
@endsection

