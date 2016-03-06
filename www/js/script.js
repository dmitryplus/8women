
  $(function(){



	// подключаем редактор
	tinymce.init({"height":600, "language":"ru","force_br_newlines":true,"force_p_newlines":true,"relative_urls":false,"extended_valid_elements":"i[class],span[class]","forced_root_block":"","plugins":["advlist autolink lists link image charmap print preview anchor","searchreplace visualblocks code fullscreen","insertdatetime media table contextmenu paste textcolor"],"toolbar":"insertfile undo redo | styleselect | bold italic | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link ","selector":"#form_template_text"});

	$('#datetimepicker1').datetimepicker({ locale: 'ru', format: 'YYYY-MM-DD HH:mm:ss', defaultDate: new Date  });

	$("input[type=\"checkbox\"]").bootstrapSwitch();

	if ( typeof initialPreviewBlock === 'undefined' ) { 
	initialPreviewBlock = [];
	}

	if ( typeof initialPreviewPic === 'undefined' ) { 
	initialPreviewPic = [];
	}

	if ( typeof initialPreviewConfigBlock === 'undefined' ) { 
	initialPreviewConfigBlock = [];
	}



    $("#photo").fileinput({
        initialPreview: initialPreviewPic,
        browseClass: "btn btn-primary btn-block",
        showCaption: false,
        showRemove: false,
        showUpload: false
	});

	$("#gallery").fileinput({
			showUpload: false,
			showRemove: false,

			mainClass: "input-group",
			showCaption: true,

			fileType: "any",

			initialPreview: initialPreviewBlock,
			initialPreviewConfig: initialPreviewConfigBlock,

	});




	// включаем подсказки
	$("[data-toggle=\"tooltip\"]").tooltip({container: 'body'});

	// включаем модали
	bootbox.setDefaults({
	  locale: "ru",
	  show: true,
	  backdrop: true,
	  closeButton: true,
	  animate: true,
	  className: "my-modal"
	});

		function MakeNewButton( type_block, ajax_param, title, button_label, success_message, error_message ){
			$("a[data-newblock='" + type_block + "']").editable({
				url: document.location.href,
				title: title,
				highlight: false,
				value: '', 
				params: function(params) {
					params.ajax = ajax_param;
					return params;
				},
				display: function(value, response) {
					$(this).removeClass('editable-unsaved');
					$(this).html("<span class=\"glyphicon glyphicon-plus\"></span> " + button_label);
				},
				success: function(data, config) {
					$(this).removeClass('editable-unsaved');
					if ( data =="ok" )
					{
							
						Example.show(success_message);
						setTimeout(function() {
							document.location.href = document.location.href;
						}, 600);
					} else {
						Example.show(error_message);
						}
				}
			});
		}
	// Конец Добавляем новый блок **********************************

 	//	MakeNewButton( "region", "add-region", "Регион", "Добавить регион", "Регион добавлен", "Ошибка добавления региона" );
 	//	MakeNewButton( "part", "add-region", "Рубрика", "Добавить рубрику", "Рубрика добавлена", "Ошибка добавления рубрики" );




	// Добавляем редактирование ячеек таблицы **********************
		function MakeEditString( type_block, ajax_param, title, success_message, error_message ){
		   $("span[data-editstring='" + type_block + "']").editable({
			url: document.location.href,
			title: title,
			highlight: false,
			params: function(params) {
				params.ajax = ajax_param;
				return params;
			},
			success: function(data, config) {
				$(this).removeClass('editable-unsaved');
				if ( data =="ok" )
				{
					Example.show(success_message);
				//	setTimeout(function() {
				//		document.location.href = document.location.href;
				//	}, 600);
				} else {
					Example.show(error_message);
				//	setTimeout(function() {
				//		document.location.href = document.location.href;
				//	}, 600);

					}
			}
			});		
		}
	// Конец Добавляем редактирование ячеек таблицы ****************

	//	MakeEditString( "region-name", "edit-Regions-name", "Новое название", "Название региона изменено", "Ошибка изменения названия" );
	//	MakeEditString( "part-name", "edit-Regions-name", "Новое название", "Название рубрики изменено", "Ошибка изменения названия" );




//	// Добавляем редактирование ячеек таблицы **********************
//		function MakeEditSelect( type_block, ajax_param, title, success_message, error_message, options_list ){
//		   $("span[data-editstring='" + type_block + "']").editable({
//			url: document.location.href,
//			title: title,
//			highlight: false,
//			source: options_list,
//			params: function(params) {
//				params.ajax = ajax_param;
//				return params;
//			},
//			success: function(data, config) {
//				$(this).removeClass('editable-unsaved');
//				if ( data =="ok" )
//				{
//					Example.show(success_message);
//					setTimeout(function() {
//						document.location.href = document.location.href;
//					}, 600);
//				} else {
//					Example.show(error_message);
//					}
//			}
//			});		
//		}
//	// Конец Добавляем редактирование ячеек таблицы ****************
//
	// Делаем кнопку удаления **************************************
	function MakeDelButton( type_block, ajax_param, title, success_message, error_message ){
		$("a[data-bb='" + type_block + "']").on("click", function(e) {
			var del_id = $(this).attr("data-id");
			e.preventDefault();
			bootbox.confirm({ 
				size: 'small',
				message: title, 
				callback: function(result){ 
					if (result)
					{

						$.ajax({ url: document.location.href, async: false, type: "POST", data: {'ajax':ajax_param,'id':del_id}, dataType: 'text', })
							.done(function( data ) { 
								if ( data == "ok")
								{
									$("TR[data-id="+del_id+"]").remove();
									Example.show(success_message);
								} else {
									Example.show(error_message);
								}
							});
					}
				}
			});

		});
	}

	MakeDelButton( "jury", "del-jury", "Удалить запись?", "Запись удалена", "Ошибка удаления записи" );
	MakeDelButton( "news", "del-news", "Удалить новость?", "Новость удалена", "Ошибка удаления новости" );




//фильтр

	function cleanCookie(){
		$.cookie("filtr-part", null, { path: '/' });
		$.cookie("filtr-region", null, { path: '/' });
		$.cookie("filtr-find", null, { path: '/' });
		$.cookie("filtr-main", null, { path: '/' });
		$.cookie("filtr-year", null, { path: '/' });

	}

	$("button#cancel.filtr").on("click", function(e) { 
		e.preventDefault();

		cleanCookie();
		Example.show("Фильтр снят");

		setTimeout(function() {
			document.location.href = document.location.href;
		}, 600);	
	});


	$("button#make.filtr").on("click", function(e) { 
		e.preventDefault();

		$.each( $("input.filtr, select.filtr"), function(){ 

			if ( $(this).val() )
			{
				if ( $(this).val() == "0" )
				{
					$.cookie("filtr-"+$(this).data("field"),  null, { path: '/' });
				} else {
					$.cookie("filtr-"+$(this).data("field"), $(this).val(), { path: '/' });
				}
			}

		});

		Example.show("Фильтр установлен");

		setTimeout(function() {
			document.location.href = document.location.href;
		}, 600);	

	});


	});


//******************************