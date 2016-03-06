
<h1>Каталог фильмов</h1>

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


			<div class="col-sm-5">
				<div class="form-group">
				<label >Год:</label>
				<select class="form-control filtr" data-field="year"  data-toggle="tooltip" data-placement="top" title="Год" >
					<option value="0"></option>
					<? 

					foreach ( $this->getAllYear() as $key => $year ) {
						?> <option value="<?=$year?>" <?=(Yii::app()->request->cookies['filtr-year'] == $year ? 'selected' : '')?>><?=$year?></option> <?
					}
					?>
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

		<td  width="150px" class="text-center">Год участия</td>


		<td width="40px" class="text-center">&nbsp;</td>

		<td width="40px" class="text-center">&nbsp;</td>

	</tr>

</thead>

<tbody>


<? foreach ( $this->allRec as $one ) { ?>
	<tr data-id="<? echo $one->id; ?>">
		<td><? echo $one->id; ?></td>

		<td>

			<div class="row">

				<div class="col-md-32">
					<b><? echo $one->name; ?></b>
					<p><small><? echo $one->info; ?></small></p>
					<p><small>Режиссер: <? echo $one->producer_name; ?></small></p>
				</div>
				
				<div class="col-md-4">
					<img src="<?=( $one->image_src ? UploadFile::makeUrl('Film', $one->id).'/'.$one->image_src : Yii::app()->request->baseUrl.'/i/no_photo.png' )?>" class="img-thumbnail" width="60px" height="60px">
				</div>
			
			</div>
		
		</td>

		<td class="text-center"><? echo $one->year; ?></td>

		<td>

			<a href="<? echo Yii::app()->getBaseUrl(true).'/wm_admin/film/edit/'.$one->id?>"  role="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="left" title="Редактировать фильм"><span class="glyphicon glyphicon-edit"></span></a>


		</td>

		<td width="45px" class="text-center">
			<a href="#" data-id="<?=$one->id?>" role="button" class="btn btn-default btn-sm" data-bb="film"  data-toggle="tooltip" data-placement="left" title="Удалить film"><span class="glyphicon glyphicon-trash"></span></a>
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
		<a href="<? echo Yii::app()->getBaseUrl(true).'/wm_admin/film/edit'; ?>" class="btn btn-primary btn-new" ><span class="glyphicon glyphicon-plus"></span> Добавить фильм</a>
		</div>



</td></tr></tfoot>
</table>