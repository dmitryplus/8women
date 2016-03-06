			<div class="top-title">Каталог фильмов</div>

			<div class="tabs">
				<ul>
<?
	
	foreach ( $this->years as $one ) {
		echo '<li class="tabs-item '.( $this->year == $one->year ? 'active' : '' ).'"><a href="'.Yii::app()->getBaseUrl(true).'/film/year/'.$one->year.'">'.$one->year.'</a></li>';
	}	
	
?>				</ul>
			</div>

		<?
		if (file_exists(Yii::getPathOfAlias('webroot').'/upload/Catalog/'.$this->year.'.pdf')) {
		?>
			<a href="<? echo Yii::app()->getBaseUrl(true).'/upload/Catalog/'.$this->year.'.pdf'; ?>" class="btn-download">Скачать каталог фильмов 2016</a>
		<?
		}
		?>

			<div class="movies">

<? 
	foreach ( $this->allRec as $one ) { 
?>
				<div class="movies__item">
					<a href="<? echo Yii::app()->getBaseUrl(true).'/film/'.$one->id; ?>" class="movies__photo" style="background-image: url(<? echo UploadFile::makeUrl('Film', $one->id).'/'.$one->image_src; ?>);"></a>
					<a href="<? echo Yii::app()->getBaseUrl(true).'/film/'.$one->id; ?>" class="movies__title"><? echo $one->name; ?></a>
					<div class="movies__description">
						<? echo $one->info; ?>
					</div>
				</div>
<?
	} 
?>

			</div>


