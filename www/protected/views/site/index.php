

			<a href="parthners.html" class="i-parthners__img"><img src="i/top_logos@2x.png" alt=""></a>

			<div class="top-title top-title__index">Новости</div>

			<div class="news">

<?

	$all = News::model()->findAll('', array('limit' => 6, 'order' => 'date DESC') );

	if ( is_array($all) )
	foreach ( $all as $one ) {

		$this->renderPartial('//news/_block', array('one' => $one));

	}

?>




				<div class="news-clear"></div>

			</div>

			<a href="<? echo Yii::app()->getBaseUrl(true); ?>/news" class="news-more">Ещё новости...</a>
		</div>

	</div>


	<div class="i-jury">
		<div class="i-jury__center">
			<div class="top-title top-title__index">Жюри</div>


<?

	$all = Jury::model()->findAll('', array('order' => 'name DESC') );

	if ( is_array($all) )
	foreach ( $all as $one ) {

		$this->renderPartial('//jury/_block', array('one' => $one));

	}

?>


		</div>
	</div>

	<div class="info-parthners">
		<div class="info-parthners__center">
			<div class="info-parthners__title">Информационные партнёры:</div>
			<div class="info-parthners__img"><img src="i/info_parthners.jpg" alt=""></div>
		</div>