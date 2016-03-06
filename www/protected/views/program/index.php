			<div class="top-title">Программа</div>

			<div class="program">

				<div class="tabs">
					<ul>
<?
	
	foreach ( $this->years as $one ) {
		echo '<li class="tabs-item '.( $this->year == $one->date ? 'active' : '' ).'"><a href="'.Yii::app()->getBaseUrl(true).'/program/year/'.$one->date.'">'.$one->date.'</a></li>';
	}	
	
?>
					</ul>
				</div>


<? 

	$day = '';

	foreach ( $this->allRec as $one ) { 

		$month_key =  intval(date('m', strtotime($one->date)))-1; 
		$cur_day = date('j', strtotime($one->date)).' '.Yii::app()->params['months'][$month_key];

		if ( $cur_day <> $day ) {
?>		
			<div class="program__date"> <h2><? echo $cur_day; ?></h2> </div>
<?
			$day = $cur_day;
		}

?>		
			<div class="program__day">
				<div class="program__item">
					<div class="program__ticket">
						<a href="<? echo $one->ticket_link; ?>" target="_blank">Получить<br>билет</a>
					</div>
					 <div class="program__info">
						<div class="program__time"><? echo date('H:i', strtotime($one->date)); ?></div>
						<div class="program__place"><? echo $one->place; ?></div>
						<div class="program__text">
							<? echo $one->description; ?>
						</div>
					 </div>
				</div>
			</div>
<?

	}
				
?>

			</div>
































