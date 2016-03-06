<?
	if ($one) {
		?><h1>Редактировать фильм</h1><?
	} else {
		?><h1>Создать фильм</h1><?
	}
?>


<form role="form" method="POST" enctype="multipart/form-data" id="main" action="<? echo Yii::app()->getBaseUrl(true).'/wm_admin/film'; ?>">

<?
	if ( $one ) { ?><input type="hidden" name="Film[id]" value="<?=$one->id?>"><? }
?>



<div class="row">

	<div class="col-md-24">

		<div class="row">
			<div class="col-md-36">
				<div class="form-group required">
					<label class="control-label">Название</label>
					<input type="text" class="form-control" name="Film[name]" value="<?=( $one ? $one->name : '' )?>">
				</div>
			</div>
		</div>

		<div class="row">

			<div class="col-md-26">
				<div class="form-group required">
					<label class="control-label">Страна, год, продолжительность</label>
					<input type="text" class="form-control" name="Film[info]" value="<?=( $one ? $one->info : '' )?>">
				</div>
			</div>

			<div class="col-md-10">
				<div class="form-group required">
					<label class="control-label">Год участия в фестивале</label>

						<div class='input-group date' id='datetimepickerYear'>
							<input type="text" class="form-control" name="Film[year]" value="<?=( $one ? $one->year : '' )?>">

							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>

				</div>
			</div>
		</div>


		<div class="row">
			<div class="col-md-36">
				<div class="form-group required">
					<label class="control-label">Техническая информация</label>
					<textarea class="form-control" name="Film[tech_info]" rows=3><?=( $one ? $one->tech_info : '' )?></textarea>
				</div>
			</div>
		</div>

	</div>

	<div class="col-md-12">


		<label class="control-label">Изображение</label>
	<script>

		var initialPreviewPic = ["<img src='<?=( $one->image_src ? UploadFile::makeUrl('Film',$one->id).'/'.$one->image_src : Yii::app()->request->baseUrl.'/i/no_photo.png' )?>' class='file-preview-image'>"];

	</script>
	<input type="file" id="photo" name="image_src" class="file-loading">


	</div>

</div>


<div class="clearfix"></div>

<div class="row">
	<div class="col-md-36">
		<div class="form-group required">
			<label class="control-label">Трейлер</label>
			<textarea class="form-control" name="Film[trailer]" rows=2><?=( $one ? $one->trailer : '' )?></textarea>
		</div>
	</div>
</div>

<div class="panel panel-default">

	<div class="panel-heading">
		<label class="control-label">Описание фильма</label>
	</div>

	<div class="panel-body">
		<textarea id="form_template_text" class="doc-template" name="Film[description]"><?=( $one ? $one->description : '' )?></textarea>
	</div>
</div>


<div class="clearfix"></div>





<div class="panel panel-default">

	<div class="panel-heading">
		<label class="control-label">Режиссер</label>
	</div>

	<div class="panel-body">



<div class="row">

	<div class="col-md-24">

		<div class="row">
			<div class="col-md-36">
				<div class="form-group required">
					<label class="control-label">Имя</label>
					<input type="text" class="form-control" name="Film[producer_name]" value="<?=( $one ? $one->producer_name : '' )?>">
				</div>
			</div>
		</div>	

		<div class="row">
			<div class="col-md-36">
				<div class="form-group required">
					<label class="control-label">Фильмография</label>
					<textarea class="form-control" name="Film[producer_filmograf]" rows=3><?=( $one ? $one->producer_filmograf : '' )?></textarea>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-36">
				<div class="form-group required">
					<label class="control-label">Биография</label>
					<textarea class="form-control" name="Film[producer_biograf]" rows=5><?=( $one ? $one->producer_biograf : '' )?></textarea>
				</div>
			</div>
		</div>

	</div>
	
	<div class="col-md-12">


		<label class="control-label">Фото</label>
	<script>

		var initialPreviewPPic = ["<img src='<?=( $one->producer_photo ? UploadFile::makeUrl('Film',$one->id).'/'.$one->producer_photo : Yii::app()->request->baseUrl.'/i/no_photo.png' )?>' class='file-preview-image'>"];

	</script>
	<input type="file" id="pphoto" name="producer_photo" class="file-loading">


	</div>

</div>







	</div>
</div>




<div class="panel panel-default">
	<div class="panel-heading">
		<label class="control-label">Галерея</label>
	</div>
	<div class="panel-body">
<?
	
	$gal = $one->filmImages;

?>
<script>

	var initialPreviewBlock = [
	<?  
	
	if (is_array($gal))
	foreach ($gal as $img ) {
		echo '"<img src=\''.UploadFile::makeUrl('Film',$one->id).'/'.$img->src.'\' class=\'file-preview-image\'>",';
	} 
	?>];

	var initialPreviewConfigBlock = [ 
	<? 
		if (is_array($gal))
		foreach ($gal as $img ) {
		echo '{caption: \''.$img->src.'\', showCaption: true, showClose: false, browseLabel: \'\', removeLabel: \'\', removeIcon: \'\', removeTitle: \'Cancel or reset changes\',  width: \'120px\', url: \''.Yii::app()->getBaseUrl(true).'/wm_admin/film/images/'.$img->id.'/delete'.'\', width: \'120px\',},';
	} 
	?>];

</script>

		<input type="file" id="gallery" name="gallery[]" multiple>

	</div>
</div>


<div class="form-group pull-right btn-control ">
	<a href="<?=Yii::app()->getBaseUrl(true)?>/wm_admin/film" class="btn btn-default btn-cancel"><span class="glyphicon glyphicon-remove"></span> Отмена</a>

	<button type="submit" class="btn btn-primary btn-save-exit" data-block="template"><span class="glyphicon glyphicon-ok"></span> Сохранить </button>
</div>


</form>
