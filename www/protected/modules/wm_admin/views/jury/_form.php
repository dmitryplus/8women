<?
	if ($one) {
		?><h1>Редактировать новость</h1><?
	} else {
		?><h1>Создать новость</h1><?
	}
?>


<form role="form" method="POST" enctype="multipart/form-data" id="main" action="<? echo Yii::app()->getBaseUrl(true).'/wm_admin/news'; ?>">

<?
	if ( $one ) { ?><input type="hidden" name="News[id]" value="<?=$one->id?>"><? }
?>



<div class="row">

	<div class="col-md-24">

		<div class="row">
			<div class="col-md-36">
				<div class="form-group required">
					<label class="control-label">Заголовок</label>
					<input type="text" class="form-control" name="News[name]" value="<?=( $one ? $one->name : '' )?>">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-10">
				<div class="form-group required">
					<label class="control-label">Дата</label>

						<div class='input-group date' id='datetimepicker1'>
							<input type="text" class="form-control" name="News[date]" value="<?=( $one ? $one->date : '' )?>">

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
					<label class="control-label">Описание</label>
					<textarea class="form-control" name="News[description]" rows=5><?=( $one ? $one->description : '' )?></textarea>
				</div>
			</div>
		</div>

	</div>

	<div class="col-md-12">


		<label class="control-label">Изображение</label>
	<script>

		var initialPreviewPic = ["<img src='<?=( $one->image_src ? UploadFile::makeUrl('News',$one->id).'/'.$one->image_src : Yii::app()->request->baseUrl.'/i/no_photo.png' )?>' class='file-preview-image'>"];

	</script>
	<input type="file" id="photo" name="image_src" class="file-loading">


	</div>

</div>


<div class="clearfix"></div>

<div class="panel panel-default">

	<div class="panel-heading">
		<label class="control-label">Текст новости</label>
	</div>

	<div class="panel-body">
		<textarea id="form_template_text" class="doc-template" name="News[content]"><?=( $one ? $one->content : '' )?></textarea>
	</div>
</div>


<div class="clearfix"></div>


<div class="panel panel-default">
	<div class="panel-heading">
		<label class="control-label">Галерея</label>
	</div>
	<div class="panel-body">
<?
	
	$gal = $one->newsImages;

?>
<script>

	var initialPreviewBlock = [
	<?  
	
	if (is_array($gal))
	foreach ($gal as $img ) {
		echo '"<img src=\''.UploadFile::makeUrl('News',$one->id).'/'.$img->src.'\' class=\'file-preview-image\'>",';
	} 
	?>];

	var initialPreviewConfigBlock = [ 
	<? 
		if (is_array($gal))
		foreach ($gal as $img ) {
		echo '{caption: \''.$img->src.'\', showCaption: true, showClose: false, browseLabel: \'\', removeLabel: \'\', removeIcon: \'\', removeTitle: \'Cancel or reset changes\',  width: \'120px\', url: \''.Yii::app()->getBaseUrl(true).'/wm_admin/news/images/'.$img->id.'/delete'.'\', width: \'120px\',},';
	} 
	?>];

</script>

		<input type="file" id="gallery" name="gallery[]" multiple>

	</div>
</div>


<div class="form-group pull-right btn-control ">
	<a href="<?=Yii::app()->getBaseUrl(true)?>/wm_admin/news" class="btn btn-default btn-cancel"><span class="glyphicon glyphicon-remove"></span> Отмена</a>

	<button type="submit" class="btn btn-primary btn-save-exit" data-block="template"><span class="glyphicon glyphicon-ok"></span> Сохранить </button>
</div>


</form>
