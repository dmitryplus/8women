			<div class="top-title">Жюри</div>

			 <div class="jury">
			 	<div class="jury__left-col">
			 		<div class="jury__photo" style="background-image: url(<? echo UploadFile::makeUrl('Jury', $one->id).'/'.$one->image_src; ?>);"></div>
			 	</div>

			 	<div class="jury__right-col">
			 		<h1><? echo $one->name; ?></h1>
			 		<div class="jury__info">
			 			<? echo $one->content; ?>
			 		</div>
			 	</div>
			 </div>
