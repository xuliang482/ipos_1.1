<div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="frm_title"></h4>
      </div>
      <div class="modal-body" id="frm_body"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-flat col-sm-2 pull-right" style='margin-left:10px;' id="confirm">{{trans('common.confirm')}}</button>
        <button type="button" class="btn btn-danger btn-flat col-sm-2 pull-right" data-dismiss="modal" id="cancel">{{trans('common.cancel')}}</button>
      </div> 
    </div>
  </div>
</div>