<?php

class QuestionnaireController extends Controller
{

	public function actionIndex()
	{

		$request = Yii::app()->request;
		if ( $request->isPostRequest ) {

			$mailto = Yii::app()->params['email'];

			$subject = "Аккредитационная анкета от ".$_POST["Anketa"]["lname"];

			$headers = "Content-Disposition: inline\r\n";
			$headers .= "Content-Transfer-Encoding: 8bit\r\n";
			$headers .= "Content-Type: text/html; charset=utf-8\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "From: noreply@8womenfest.ru \r\n";
			$headers .= "To: ".$mailto."\r\n";

			$body = '';
			$body .= "Фамилия: ".$_POST["Anketa"]["lname"]."\r\n";   
			$body .= "Имя: ".$_POST["Anketa"]["name"]."\r\n";   
			$body .= "Отчество: ".$_POST["Anketa"]["sname"]."\r\n";   
			$body .= "Место работы: ".$_POST["Anketa"]["work"]."\r\n";   
			$body .= "Должность: ".$_POST["Anketa"]["dolg"]."\r\n";   
			$body .= "Адрес издания: ".$_POST["Anketa"]["adres"]."\r\n";   
			$body .= "Периодичность выхода: ".$_POST["Anketa"]["period"]."\r\n";   
			$body .= "Служебный телефон: ".$_POST["Anketa"]["sphone"]."\r\n";   
			$body .= "Личный телефон: ".$_POST["Anketa"]["lphone"]."\r\n";   
			$body .= "E-mail: ".$_POST["Anketa"]["email"]."\r\n";

			$body=stripslashes($body);
			$subject=stripslashes($subject);
		
			$sucess = mail($mailto, $subject, $body, $headers);

			$this->renderPartial('answer');
			exit;
		}

		$this->renderPartial('form');
	}



}