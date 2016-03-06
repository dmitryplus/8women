
			<div class="top-title">Пресс-центр</div>

			<div class="content">

				<p>Приглашаем Вас заранее аккредитоваться для освещения работы II Московского международного кинофестиваля «Восемь женщин», который пройдет в апреле 2016 года в Центральном Доме журналиста.</p>

				<a href="<? echo Yii::app()->getBaseUrl(true); ?>/questionnaire" class="btn-download various"  data-fancybox-type="iframe">Заполнить аккредитационную анкету</a>

			</div>

			<div class="press">
				<h2>Пресса о нас</h2>
				<div class="tabs">
					<ul>
<?
	
	foreach ( $this->years as $one ) {
		echo '<li class="tabs-item '.( $this->year == $one->date ? 'active' : '' ).'"><a href="'.Yii::app()->getBaseUrl(true).'/press/year/'.$one->date.'">'.$one->date.'</a></li>';
	}	
	
?>
					</ul>
				</div>

<? foreach ( $this->allRec as $one ) { 

	$month_key =  intval(date('m', strtotime($one->date)))-1; 

?>		
				<div class="press__item">
					<a href="<? echo $one->link; ?>" class="press__title" target="_blank"><? echo $one->title; ?></a>
					<div class="press__date"><? echo date('j', strtotime($one->date)); ?> <? echo Yii::app()->params['months'][$month_key]; ?></div>
				</div>	
<?
 } ?>



			</div>



















