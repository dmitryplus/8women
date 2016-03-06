<?
	if ($one) {
		?><h1>Редактировать мероприятие</h1><?
	} else {
		?><h1>Создать мероприятие</h1><?
	}
?>


<form role="form" method="POST" enctype="multipart/form-data" id="main" action="<? echo Yii::app()->getBaseUrl(true).'/wm_admin/program'; ?>">

<?
	if ( $one ) { ?><input type="hidden" name="Program[id]" value="<?=$one->id?>"><? }
?>




<div class="row">
	<div class="col-md-36">
		<div class="form-group required">
			<label class="control-label">Площадка</label>
			<input type="text" class="form-control" name="Program[place]" value="<?=( $one ? $one->place : '' )?>">
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-10">
		<div class="form-group required">
			<label class="control-label">Дата/время</label>

				<div class='input-group date' id='datetimepicker1'>
					<input type="text" class="form-control" name="Program[date]" value="<?=( $one ? $one->date : '' )?>">

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
			<label class="control-label">Адрес для ссылки "Купить билет"</label>
			<input type="text" class="form-control" name="Program[ticket_link]" value="<?=( $one ? $one->ticket_link : '' )?>">
		</div>
	</div>
</div>


<div class="clearfix"></div>

<div class="panel panel-default">

	<div class="panel-heading">
		<label class="control-label">Описание мероприятия</label>
	</div>

	<div class="panel-body">
		<textarea id="form_template_text" class="doc-template" name="Program[description]"><?=( $one ? $one->description : '' )?></textarea>
	</div>
</div>


<div class="clearfix"></div>



<div class="form-group pull-right btn-control ">
	<a href="<?=Yii::app()->getBaseUrl(true)?>/wm_admin/program" class="btn btn-default btn-cancel"><span class="glyphicon glyphicon-remove"></span> Отмена</a>

	<button type="submit" class="btn btn-primary btn-save-exit" data-block="template"><span class="glyphicon glyphicon-ok"></span> Сохранить </button>
</div>


</form>
