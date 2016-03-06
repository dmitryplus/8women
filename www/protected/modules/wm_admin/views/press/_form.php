<?
	if ($one) {
		?><h1>Редактировать ссылку</h1><?
	} else {
		?><h1>Создать ссылку</h1><?
	}
?>


<form role="form" method="POST" enctype="multipart/form-data" id="main" action="<? echo Yii::app()->getBaseUrl(true).'/wm_admin/press'; ?>">

<?
	if ( $one ) { ?><input type="hidden" name="Press[id]" value="<?=$one->id?>"><? }
?>




		<div class="row">
			<div class="col-md-36">
				<div class="form-group required">
					<label class="control-label">Заголовок</label>
					<input type="text" class="form-control" name="Press[title]" value="<?=( $one ? $one->title : '' )?>">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-10">
				<div class="form-group required">
					<label class="control-label">Дата</label>

						<div class='input-group date' id='datetimepicker1'>
							<input type="text" class="form-control" name="Press[date]" value="<?=( $one ? $one->date : '' )?>">

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
					<label class="control-label">Адрес ссылки</label>
					<input type="text" class="form-control" name="Press[link]" value="<?=( $one ? $one->link : '' )?>">
				</div>
			</div>
		</div>


<div class="clearfix"></div>






<div class="form-group pull-right btn-control ">
	<a href="<?=Yii::app()->getBaseUrl(true)?>/wm_admin/press" class="btn btn-default btn-cancel"><span class="glyphicon glyphicon-remove"></span> Отмена</a>

	<button type="submit" class="btn btn-primary btn-save-exit" data-block="template"><span class="glyphicon glyphicon-ok"></span> Сохранить </button>
</div>


</form>
