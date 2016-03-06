<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>«Восемь женщин» — Международный кинофестиваль</title>
	
	<link rel="icon" href="i/favicon.ico" type="image/x-icon">

	<link rel="stylesheet" href="<? echo Yii::app()->getBaseUrl(true); ?>/css/reset.css">
	<link rel="stylesheet" href="<? echo Yii::app()->getBaseUrl(true); ?>/css/main.css">
	<link rel="stylesheet" href="<? echo Yii::app()->getBaseUrl(true); ?>/fotorama/fotorama.css">
	<link rel="stylesheet" href="<? echo Yii::app()->getBaseUrl(true); ?>/fancybox/source/jquery.fancybox.css">


	<script src="<? echo Yii::app()->getBaseUrl(true); ?>/js/jquery.min.js"></script>

<?
	//  вывод видео для главной
	if ( ( $this->id == 'site' ) && ( $this->action->id == 'index' ) ) {
?>
	<script src="<? echo Yii::app()->getBaseUrl(true); ?>/js/jquery.backgroundvideo.min.js"></script>
<?
	}
?>

	<script src="<? echo Yii::app()->getBaseUrl(true); ?>/js/jquery.sticky.js"></script>
	<script src="<? echo Yii::app()->getBaseUrl(true); ?>/fotorama/fotorama.js"></script>
	<script src="<? echo Yii::app()->getBaseUrl(true); ?>/fancybox/source/jquery.fancybox.js"></script>

</head>


<?
	if ( ( $this->id == 'site' ) && ( $this->action->id == 'index' ) ) {
	//  вывод для главной
?>
<body>
	<div class="index-pttrn-overlay"></div>
	<div class="i-parthners"></div>
<?
	} else {
?> 
<body class="body-pttrn">
<?
	}
?>


	<div class="index-wrapper">

		<div class="left-col">
			<div class="sticker">
				<div class="left-col__logo"><a href="<? echo Yii::app()->getBaseUrl(true); ?>"><img src="<? echo Yii::app()->getBaseUrl(true); ?>/i/logo.svg" alt=""></a></div>
				<div class="left-col__nav">
					<ul>
						<li class="nav-item <?=( $this->id == 'news' ? 'active' : '' )?>"><a href="<? echo Yii::app()->getBaseUrl(true); ?>/news">Новости</a></li>
						<li class="nav-item <?=( $this->id == 'program' ? 'active' : '' )?>"><a href="<? echo Yii::app()->getBaseUrl(true); ?>/program">Программа</a></li>
						<li class="nav-item <?=( $this->id == 'about' ? 'active' : '' )?>"><a href="<? echo Yii::app()->getBaseUrl(true); ?>/about">О фестивале</a></li>

<?
		$path = Yii::getPathOfAlias('webroot').'/'.Yii::app()->params['contest'];
		if (file_exists($path)) { 
			$one = unserialize( file_get_contents($path) );
			if ( $one['active'] ) {
?>			
						<li class="nav-item <?=( $this->id == 'contest' ? 'active' : '' )?>"><a href="<? echo Yii::app()->getBaseUrl(true); ?>/contest">Конкурс</a></li>			
<?			
			}
		}
?>

						<li class="nav-item <?=( $this->id == 'press' ? 'active' : '' )?>"><a href="<? echo Yii::app()->getBaseUrl(true); ?>/press">Пресс-центр</a></li>
						<li class="nav-item <?=( $this->id == 'film' ? 'active' : '' )?>"><a href="<? echo Yii::app()->getBaseUrl(true); ?>/film">Каталог фильмов</a></li>
						<li class="nav-item <?=( $this->id == 'contacts' ? 'active' : '' )?>"><a href="<? echo Yii::app()->getBaseUrl(true); ?>/contacts">Контакты</a></li>
					</ul>
				</div>
			</div>
		</div>



		<div class="right-col">


		<?php echo $content; ?>


		</div>



	</div>

	<div class="footer">
		<div class="footer__center">
			<div class="footer__left-col">
				© Кинофестиваль «8 Женщин»<br>
				<a href="<? echo Yii::app()->getBaseUrl(true); ?>/contacts">Контакты</a>
			</div>

			<div class="footer__social">
				<a href="" class="footer__social-item"><img src="<? echo Yii::app()->getBaseUrl(true); ?>/i/ico_facebook.svg" alt=""></a>
				<a href="" class="footer__social-item"><img src="<? echo Yii::app()->getBaseUrl(true); ?>/i/ico_instagram.svg" alt=""></a>
				<a href="" class="footer__social-item"><img src="<? echo Yii::app()->getBaseUrl(true); ?>/i/ico_twitter.svg" alt=""></a>
				<a href="" class="footer__social-item"><img src="<? echo Yii::app()->getBaseUrl(true); ?>/i/ico_vk.svg" alt=""></a>
			</div>

			<div class="footer__right-col">
				Разработка сайта — Сергей Хильков<br>
				<a href="http://www.eshill.ru/" target="_blank">www.eshill.ru</a>
			</div>
		</div>
	</div>

	<script>
<?
	if ( ( $this->id == 'site' ) && ( $this->action->id == 'index' ) ) {
	//  вывод для главной
?>

//		$(document).ready(function() {
//			var videobackground = new $.backgroundVideo($('body'), {
//				"align": "centerXY",
//				"width": 720,
//				"height": 480,
//				"path": "media/",
//				"filename": "8women",
//				"types": ["mp4","ogg","webm"]
//			});
//		});
<?
	}	
?>
		$(document).ready(function(){
				$(".sticker").sticky({topSpacing:0,bottomSpacing:1260,});
			});

		$(document).ready(function() {
			$(".various").fancybox({
				maxWidth	: 700,
				maxHeight	: 850,
				fitToView	: false,
				width		: '70%',
				height		: '90%',
				autoSize	: false,
				closeClick	: false,
				openEffect	: 'none',
				closeEffect	: 'none'
			});
		});
	</script>
</body>

</html>