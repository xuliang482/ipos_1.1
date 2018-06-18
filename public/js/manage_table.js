(function(table_support, $) {

	var enable_actions = function(callback) {
		return function() {
			var selection_empty = selected_rows().length == 0;
			$("#toolbar button:not(.dropdown-toggle)").attr('disabled', selection_empty);
			typeof callback == 'function' && callback();
		}
	};

	var table = function() {
		return $("#table").data('bootstrap.table');
	}

	var selected_ids = function () {
		return $.map(table().getSelections(), function (element) {
			return element[options.uniqueId || 'id'] !== '-' ? element[options.uniqueId || 'id'] : null;
		});
	};

	var selected_rows = function () {
		return $("#table td input:checkbox:checked").parents("tr");
	};

	var row_selector = function(id) {
		return "tr[data-uniqueid='" + id + "']";
	};

	var rows_selector = function(ids) {
		var selectors = [];
		ids = ids instanceof Array ? ids : ("" + ids).split(":");
		$.each(ids, function(index, element) {
			selectors.push(row_selector(element));
		});
		return selectors;;
	};

	var highlight_row = function (id, color) {
		$(rows_selector(id)).each(function(index, element) {
			var original = $(element).css('backgroundColor');
			$(element).find("td").animate({backgroundColor: color || '#e1ffdd'}, "slow", "linear")
				.animate({backgroundColor: color || '#e1ffdd'}, 5000)
				.animate({backgroundColor: original}, "slow", "linear");
		});
	};

	
	
	var do_delete = function (url, ids) {
		
		
		
		
	};

	var do_restore = function (url, ids) {
		
	};

	var load_success = function(callback) {
		return function(response) {
			typeof options.load_callback == 'function' && options.load_callback();
			options.load_callback = undefined;
			dialog_support.init("a.modal-dlg");
			typeof callback == 'function' && callback.call(this, response);
		}
	};

	var options;

	var toggle_column_visibility = function() {
		if (localStorage[options.employee_id]) {
			var user_settings = JSON.parse(localStorage[options.employee_id]);
			user_settings[options.resource] && $.each(user_settings[options.resource], function(index, element) {
				element ? table().showColumn(index) : table().hideColumn(index);
			});
		}
	};

	var init = function (_options) {
		
		console.log("manage_table.js start");
		
		options = _options;
		enable_actions = enable_actions(options.enableActions);
		//load_success = load_success(options.onLoadSuccess);
		
		console.log(options.headers);
		console.log(options.data);
		console.log(options.url);
		
		$('#table').bootstrapTable($.extend(options, {
			columns: options.headers,
			stickyHeader: true,
			//data:options.data,
			url: options.resource + '/search',
			sidePagination: 'server',
			pageSize: options.pageSize,
			striped: true,
			pagination: true,
			search: options.resource || false,
			showColumns: true,
			clickToSelect: true,
			showExport: true,
			exportDataType: 'all',
			exportTypes: ['json', 'xml', 'csv', 'txt', 'sql', 'excel', 'pdf'],
			
			onPageChange: function(response) {
				load_success(response);
				enable_actions();
			},
			
			toolbar: '#toolbar',
			uniqueId: options.uniqueId || 'id',
			trimOnSearch: false,
			onCheck: enable_actions,
			onUncheck: enable_actions,
			onCheckAll: enable_actions,
			onUncheckAll: enable_actions,
			onLoadSuccess: function(response) {
				load_success(response);
				enable_actions();
			},
			onColumnSwitch : function(field, checked) {
				var user_settings = localStorage[options.employee_id];
				user_settings = (user_settings && JSON.parse(user_settings)) || {};
				user_settings[options.resource] = user_settings[options.resource] || {};
				user_settings[options.resource][field] = checked;
				localStorage[options.employee_id] = JSON.stringify(user_settings);
			},
			queryParamsType: 'limit',
			iconSize: 'sm',
			silentSort: true,
			paginationVAlign: 'bottom',
			escape: false
		}));
		enable_actions();
		toggle_column_visibility();
	};

	var init_delete = function (confirmMessage) {
		$("#delete").click(function (event) {
			do_delete();
		});
	};

	var init_restore = function (confirmMessage) {
		$("#restore").click(function (event) {
			do_restore();
		});
	};

	var refresh = function() {
		table().refresh();
	}

	var submit_handler = function(url) {
		return function (resource, response) {
			var id = response.id;
			alert(id);
			if (!response.success) {
				$.notify(response.message, { type: 'danger' });
			} else {
				var message = response.message;
				var selector = rows_selector(response.id);
				var rows = $(selector.join(",")).length;
				if (rows > 0 && rows < 15) {
					var ids = response.id.split(":");
					$.get([url || resource + '/get_row', id].join("/"), {}, function (response) {
						$.each(selector, function (index, element) {
							var id = $(element).data('uniqueid');
							table().updateByUniqueId({id: id, row: response[id] || response});
						});
						dialog_support.init("a.modal-dlg");
						highlight_row(ids);
					}, 'json');
				} else {
					// call hightlight function once after refresh
					options.load_callback = function () {
						enable_actions();
						highlight_row(id);
					};
					refresh();
				}
				$.notify(message, {type: 'success' });
			}
			return false;
		};
	};

	var handle_submit = submit_handler();

	$.extend(table_support, {
		submit_handler: function(url) {
			this.handle_submit = submit_handler(url);
		},
		handle_submit: handle_submit,
		init: init,
		do_delete: do_delete,
		do_restore: do_restore,
		refresh : refresh,
		selected_ids : selected_ids,
	});

	//删除商品确认信息(模态窗口)
    $('#confirmDelete').on('show.bs.modal', function (e) {
	   
        $message = $(e.relatedTarget).attr('data-message');
        $(this).find('.modal-body').text($message);
        $title = $(e.relatedTarget).attr('data-title');
        $(this).find('.modal-title').text($title);

    });
    
    <!-- Form confirm (yes/ok) handler, submits form -->
    $('#confirmDelete').find('.modal-footer #confirm').on('click', function(){
    
        const ids = selected_ids();
        
        console.log(ids);
        var url = options.resource + "/" + ids;
        console.log(url);
        
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
	
	
	
	
})(window.table_support = window.table_support || {}, jQuery);


