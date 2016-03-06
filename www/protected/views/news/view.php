<?
$month_key =  intval(date('m', strtotime($one->date)))-1; 
?>
			<div class="top-title">Новости</div>

			<div class="news-view">
				
				<h2><? echo $one->name; ?></h2>

				<div class="news-view__date"><? echo date('j', strtotime($one->date)); ?> <? echo Yii::app()->params['months'][$month_key]; ?> <? echo date('Y', strtotime($one->date)); ?> г.</div>

				<div class="news-view__description">
					<? echo $one->description; ?>
				</div>


				<div class="fotorama" data-nav="thumbs" data-thumbwidth="75" data-thumbheight="50">
					<?
						if ( $one->image_src ) {
							echo '<img src="'.UploadFile::makeUrl('News', $one->id).'/'.$one->image_src.'">';
						}
					?>
					

				<?
				
					$all = $one->newsImages;
					if ( is_array($all) ) {
						foreach ( $all as $img ) {
							echo '<img src="'.UploadFile::makeUrl('News', $one->id).'/'.$img->src.'">';
						}
					}

				?>	
				</div>

				<div class="news-view__text">
					<? echo $one->content; ?>
				</div>

			</div>
