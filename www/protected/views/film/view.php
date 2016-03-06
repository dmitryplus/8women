			<div class="top-title">Каталог фильмов</div>

			<div class="movies">
				<h1><? echo $one->name; ?></h1>

				<div class="movies__big-photo">
					<?
						if ( $one->image_src ) {
							echo '<img src="'.UploadFile::makeUrl('Film', $one->id).'/'.$one->image_src.'">';
						}
					?>
				</div>

				<div class="movies__info">
					<? echo str_replace("\n",'<br>',$one->tech_info); ?>
				</div>

				<div class="movies__text">
					<? echo $one->description; ?>
				</div>

				<div class="movies__trailer">
					<?
						if ( $one->trailer ) {
							echo $one->trailer;
						}
					?>				
				</div>

				<br><br>

				<div class="fotorama" data-nav="thumbs" data-thumbwidth="75" data-thumbheight="50">
				<?
					//if ( $one->image_src ) {
					//	echo '<img src="'.UploadFile::makeUrl('Film', $one->id).'/'.$one->image_src.'">';
					//}
				?>		
				<?
				
					$all = $one->filmImages;
					if ( is_array($all) ) {
						foreach ( $all as $img ) {
							echo '<img src="'.UploadFile::makeUrl('Film', $one->id).'/'.$img->src.'">';
						}
					}

				?>	
				</div>


			</div>

		</div>

	</div>

	<div class="director">
		<div class="director__center">
			<div class="director__item">
				<div class="director__left-col">
					<div href="news_view.html" class="director__img" style="background-image: url(<? echo UploadFile::makeUrl('Film', $one->id).'/'.$one->producer_photo; ?>);"></div>
					<div class="director__movies">
						<b>Фильмография (выборочно):</b><Br>
						<? echo str_replace("\n",'<br>',$one->producer_filmograf); ?>
					</div>
				</div>
				<div class="director__right-col">
					<h2><? echo $one->producer_name; ?></h2>
					<p>
						<? echo str_replace("\n",'<br>',$one->producer_biograf); ?>
					</p>
				</div>
			</div>