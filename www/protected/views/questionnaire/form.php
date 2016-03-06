<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>«Восемь женщин» — Международный кинофестиваль</title>
	
	<link rel="icon" href="<? echo Yii::app()->getBaseUrl(true); ?>/i/favicon.ico" type="image/x-icon">

	<link rel="stylesheet" href="<? echo Yii::app()->getBaseUrl(true); ?>/css/reset.css">
	<link rel="stylesheet" href="<? echo Yii::app()->getBaseUrl(true); ?>/css/main.css">

	<script src="<? echo Yii::app()->getBaseUrl(true); ?>/js/jquery.min.js"></script>
	<script src="<? echo Yii::app()->getBaseUrl(true); ?>/js/jquery.sticky.js"></script>

</head>

<body class="body-pttrn">

<form role="form" method="POST" enctype="multipart/form-data" id="main" action="<? echo Yii::app()->getBaseUrl(true).'/questionnaire'; ?>">


	<div class="questionnaire">
		<div class="top-title top-title__index">Аккредитационная анкета</div>

		<div class="questionnaire__item">
			<div class="questionnaire__title">Фамилия</div>
			<div class="questionnaire__input"><input type="text" name="Anketa[lname]"></div>
		</div>

		<div class="questionnaire__item">
			<div class="questionnaire__title">Имя</div>
			<div class="questionnaire__input"><input type="text" name="Anketa[name]"></div>
		</div>

		<div class="questionnaire__item">
			<div class="questionnaire__title">Отчество</div>
			<div class="questionnaire__input"><input type="text" name="Anketa[sname]"></div>
		</div>

		<div class="questionnaire__item">
			<div class="questionnaire__title">Место работы</div>
			<div class="questionnaire__input"><input type="text" name="Anketa[work]"></div>
		</div>

		<div class="questionnaire__item">
			<div class="questionnaire__title">Должность</div>
			<div class="questionnaire__input"><input type="text" name="Anketa[dolg]"></div>
		</div>

		<div class="questionnaire__item">
			<div class="questionnaire__title">Адрес издания</div>
			<div class="questionnaire__input"><input type="text" name="Anketa[adres]"></div>
		</div>

		<div class="questionnaire__item">
			<div class="questionnaire__title">Периодичность выхода</div>
			<div class="questionnaire__input"><input type="text" name="Anketa[period]"></div>
		</div>

		<div class="questionnaire__item">
			<div class="questionnaire__title">Служебный телефон</div>
			<div class="questionnaire__input"><input type="text"  name="Anketa[sphone]"></div>
		</div>

		<div class="questionnaire__item">
			<div class="questionnaire__title">Личный телефон</div>
			<div class="questionnaire__input"><input type="text" name="Anketa[lphone]"></div>
		</div>

		<div class="questionnaire__item">
			<div class="questionnaire__title">E-mail</div>
			<div class="questionnaire__input"><input type="text" name="Anketa[email]"></div>
		</div>

		<button type="submit" class="btn_send_red">ОТПРАВИТЬ</button>
	</div>

</form>

</body>

</html>