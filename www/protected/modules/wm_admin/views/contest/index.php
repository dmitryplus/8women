
<h1>Конкурс</h1>

<br><br>

<form role="form" method="POST" enctype="multipart/form-data" id="main" action="<? echo Yii::app()->getBaseUrl(true).'/wm_admin/contest'; ?>">


<div class="row">
	<div class="col-md-36">
		<div class="form-group required">
			<label class="control-label">Прием заявок&nbsp;&nbsp;&nbsp;</label>
			<input id="switch-state" name="Contest[active]" value=1 type="checkbox" <?=( $one['active'] ? 'checked' : '' )?> >
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-36">
		<div class="form-group required">
			<label class="control-label">Загрузить анкету</label>


<?
	if ($one['anketa']){
?>
<script>

	var initialPreviewAnketa = ["<div class='file-preview-other'><i class='glyphicon glyphicon-file'></i><br><a href='<?=UploadFile::makeUrl('Contest','').'/'.$one['anketa']?>'><?=$one['anketa']?></a></div>"];

</script>
<?
}
?>



			<input type="file" id="anketa" name="anketa">
		</div>
	</div>
</div>

<br><br>

<div class="form-group pull-right btn-control ">
	<button type="submit" class="btn btn-primary btn-save-exit" data-block="template"><span class="glyphicon glyphicon-ok"></span> Сохранить </button>
</div>


</form>