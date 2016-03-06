<?
$month_key =  intval(date('m', strtotime($one->date))) - 1; 
?>

		<div class="news-item">
			<a href="<? echo Yii::app()->getBaseUrl(true); ?>/news/<? echo $one->id; ?>" class="news-item__img" style="background-image: url(<?=( $one->image_src ? UploadFile::makeUrl('News', $one->id).'/'.$one->image_src : Yii::app()->request->baseUrl.'/i/no_photo.png' )?>);"><img src="<? echo Yii::app()->getBaseUrl(true); ?>/i/border.svg" alt=""></a>
			<div class="news-item__date"><? echo date('j', strtotime($one->date)); ?> <? echo Yii::app()->params['months'][$month_key]; ?></div>
			<a href="<? echo Yii::app()->getBaseUrl(true); ?>/news/<? echo $one->id; ?>" class="news-item__title"><? echo $one->name; ?></a>
			<div class="news-item__description">
				<? echo $one->description; ?>
			</div>
		</div>