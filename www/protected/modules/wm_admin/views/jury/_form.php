<?
	if ($one) {
		?><h1>Редактировать запись</h1><?
	} else {
		?><h1>Создать запись</h1><?
	}
?>


<form role="form" method="POST" enctype="multipart/form-data" id="main" action="<? echo Yii::app()->getBaseUrl(true).'/wm_admin/jury'; ?>">

<?
	if ( $one ) { ?><input type="hidden" name="Jury[id]" value="<?=$one->id?>"><? }
?>



<div class="row">

	<div class="col-md-24">

		<div class="row">
			<div class="col-md-36">
				<div class="form-group required">
					<label class="control-label">ФИО</label>
					<input type="text" class="form-control" name="Jury[name]" value="<?=( $one ? $one->name : '' )?>">
				</div>
			</div>
		</div>


		<div class="row">
			<div class="col-md-36">
				<div class="form-group required">
					<label class="control-label">Регалии</label>
					<textarea class="form-control" name="Jury[description]" rows=5><?=( $one ? $one->description : '' )?></textarea>
				</div>
			</div>
		</div>

	</div>

	<div class="col-md-12">


		<label class="control-label">Изображение</label>
	<script>

		var initialPreviewPic = ["<img src='<?=( $one->image_src ? UploadFile::makeUrl('Jury',$one->id).'/'.$one->image_src : Yii::app()->request->baseUrl.'/i/no_photo.png' )?>' class='file-preview-image'>"];

	</script>
	<input type="file" id="photo" name="image_src" class="file-loading">


	</div>

</div>


<div class="clearfix"></div>
<br>

<div class="panel panel-default">

	<div class="panel-heading">
		<label class="control-label">Информация</label>
	</div>

	<div class="panel-body">
		<textarea id="form_template_text" class="doc-template" name="Jury[content]"><?=( $one ? $one->content : '' )?></textarea>
	</div>
</div>


<div class="clearfix"></div>




<div class="form-group pull-right btn-control ">
	<a href="<?=Yii::app()->getBaseUrl(true)?>/wm_admin/jury" class="btn btn-default btn-cancel"><span class="glyphicon glyphicon-remove"></span> Отмена</a>

	<button type="submit" class="btn btn-primary btn-save-exit" data-block="template"><span class="glyphicon glyphicon-ok"></span> Сохранить </button>
</div>


</form>
