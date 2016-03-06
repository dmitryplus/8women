
	<div class="i-jury__item">
		<div class="i-jury__photo">
			<a href="<? echo Yii::app()->getBaseUrl(true); ?>/jury/<? echo $one->id; ?>" style="background-image: url(<? echo UploadFile::makeUrl('Jury', $one->id).'/'.$one->image_src; ?>);"></a>
		</div>
		<a href="<? echo Yii::app()->getBaseUrl(true); ?>/jury/<? echo $one->id; ?>" class="i-jury__title"><? echo $one->name; ?></a>
		<div class="i-jury__description"><? echo $one->description; ?></div>
	</div>