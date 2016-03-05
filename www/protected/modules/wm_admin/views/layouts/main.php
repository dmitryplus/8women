<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $this->pageTitle; ?></title>

<? if (Yii::app()->user->isGuest) { ?>
    <link href="<?php echo Yii::app()->getBaseUrl(true); ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->getBaseUrl(true); ?>/css/signin.css" rel="stylesheet">
<? } else { ?>
    <link href="<?php echo Yii::app()->getBaseUrl(true); ?>/css/admin_styles.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->getBaseUrl(true); ?>/css/fileinput.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->getBaseUrl(true); ?>/css/bootstrap-datetimepicker.css" rel="stylesheet">
<? } ?>
  </head>

  <body>



<? if (!Yii::app()->user->isGuest) { ?>

    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">8womenfest.ru</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li <?=( $this->id == 'default' ? 'class="active"' : '')?>><a href="<?php echo Yii::app()->createUrl('wm_admin/news'); ?>">Новости</a></li>
          </ul>

			<ul class="nav navbar-nav navbar-right">
			<li><a href=''><span class="glyphicon glyphicon-user white"></span>&nbsp;&nbsp;Администратор</a></li>

			<li><a href="<?php echo Yii::app()->createUrl('wm_admin/exit'); ?>">Выход</a></li>
			</ul>

        </div>
      </div>
    </div>
<? } ?>


    <!-- Begin page content -->
    <div class="container">

	<?php echo $content; ?>

    </div>

<? if (!Yii::app()->user->isGuest) { ?>

    <div id="footer">
      <div class="container">
        <p class="text-muted">8womenfest.ru</p>
      </div>
    </div>

<? } ?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/jquery.min.js"></script>

	<script src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/fileinput.js"></script>
	<script src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/plugins/canvas-to-blob.min.js"></script>

    <script src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/bootstrap.js"></script>

	<script src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/moment.js"></script>
	<script src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/ru.js"></script>
	<script src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/bootstrap-confirmation.js"></script>
	<script src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/bootstrap-tooltip.js"></script>
	<script src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/bootstrap-datetimepicker.js"></script>

	<script src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/fileinput_locale_ru.js"></script>


	<script src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/bootstrap-select.js"></script>
	<script src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/bootstrap-select.min.js"></script>

	<script src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/bootstrap-editable.js"></script>

	<script src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/bootbox.js"></script>

	<script src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/jquery.json.js"></script>

	<script src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/tinymce/tinymce.min.js"></script>

	<script src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/bootstrap-datetimepicker.js"></script>
	<script src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/bootstrap-switch.js"></script>

	<script src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/jquery.cookie.js"></script>
	<script src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/script.js"></script>
	<script src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/example.js"></script>

  </body>
</html>