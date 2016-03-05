
<h1>Новости</h1>

<!--
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                Фильтры <span class="caret"></span>
              </a>
            </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">

		<div class="row">	

			<div class="col-sm-10">
				<div class="form-group">
				<label >Поиск:</label>
				<input class="form-control filtr" data-field="find"  data-toggle="tooltip" data-placement="top" title="Искать" value="<?=Yii::app()->request->cookies['filtr-find']?>">
				</div>
			</div>

			<div class="col-sm-7">
				<div class="form-group">
				<label >Рубрика:</label>
				<select class="form-control filtr" data-field="part"  data-toggle="tooltip" data-placement="top" title="Рубрика" >
					<option value="0"></option>
					<? 
					?>
				</select>
				</div>
			</div>	

			<div class="col-sm-7">
				<div class="form-group">
				<label >Регион:</label>
				<select class="form-control filtr" data-field="region"  data-toggle="tooltip" data-placement="top" title="Регион" >
					<option value="0"></option>
					<? 
					?>
				</select>
				</div>
			</div>		

			<div class="col-sm-4">
				<div class="form-group">
				<label >На главной:</label>
				<select class="form-control filtr" data-field="main"  data-toggle="tooltip" data-placement="top" title="Вывод на главной" >
					<option value="0"></option>
					<option value="1" <?=( $_COOKIE['filtr-main'] == 1 ? 'selected' : '' )?> >Да</option>
					<option value="2" <?=( $_COOKIE['filtr-main'] === 0 ? 'selected' : '' )?> >Нет</option>
				</select>
				</div>
			</div>		


		</div>

		<div class="pull-right">
			<button type="button" class="btn btn-default filtr" id="cancel"><span class="glyphicon glyphicon-remove"></span> Очистить</button>
			<button type="button" class="btn btn-primary filtr" id="make" ><span class="glyphicon glyphicon-ok"></span> Применить</button>
		</div>


      </div>
    </div>
  </div>
</div>

	

<table class="table table-striped table-bordered small">

<thead>

	<tr>
		<td class="text-center" width="40px">#</td>

		<td class="text-center">Название</td>

		<td class="text-center">Дата</td>

		<td class="text-center">Рубрика</td>

		<td class="text-center">Регион</td>

		<td width="40px" class="text-center">&nbsp;</td>

		<td width="40px" class="text-center">&nbsp;</td>

	</tr>

</thead>

<tbody>

<? foreach ( $this->allRec as $one ) { ?>
	<tr data-id="<? echo $one->Object_ID; ?>">
		<td><? echo $one->Object_ID; ?></td>

		<td>

			<div class="row">

				<div class="col-md-32">
					<b><? echo $one->newsCaption; ?></b>
					<p><small><? echo $one->newsDescription; ?></small></p>
				</div>
				
				<div class="col-md-4">
					<img src="<?=( ($one->pic && $one->pic != '-') ? UploadFile::makeUrl($one->pic) : Yii::app()->getBaseUrl(true).'/i/no_photo.png' )?>" class="img-thumbnail" width="60px" height="60px">
				</div>
			
			</div>
		
		</td>

		<td><? echo date('d.m.Y', strtotime($one->newsDate)); ?></td>

		<td><? echo $one->part->name; ?></td>

		<td><? echo $one->region->name; ?></td>

		<td>

			<a href="<? echo Yii::app()->getBaseUrl(true).'/wm_admin/news/'.$one->Object_ID?>"  role="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="left" title="Редактировать новость"><span class="glyphicon glyphicon-edit"></span></a>


		</td>

		<td width="45px" class="text-center">
			<a href="#" data-id="<?=$one->Object_ID?>" role="button" class="btn btn-default btn-sm" data-bb="news"  data-toggle="tooltip" data-placement="left" title="Удалить новость"><span class="glyphicon glyphicon-trash"></span></a>
		</td>

	</tr>
<?	}  ?>

</tbody>
<tfoot><tr><td colspan=7>

            <?php 
			$this->widget('CLinkPager', array(
                'pages' => $this->pages,
                'maxButtonCount'=>7,
                'header'=>'',
				'lastPageLabel' => false,
				'firstPageLabel' => false,
				'prevPageLabel' => '&laquo;',
				'nextPageLabel' => '&raquo;',
				'selectedPageCssClass' => 'active',
				'htmlOptions' => array( 'class' => 'pagination' ), 
            ));
			?>

		<div class="form-group pull-right"><br>
		<a href="<? echo Yii::app()->getBaseUrl(true).'/wm_admin/news'; ?>" class="btn btn-primary btn-new" ><span class="glyphicon glyphicon-plus"></span> Добавить новость</a>
		</div>



</td></tr></tfoot>
</table>

-->