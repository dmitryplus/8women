<?php

class SiteController extends Controller
{

	public function actionIndex()
	{

	//	$this->pageTitle = "Агентство культурной информации: Главная страница";

		$this->render('index');
	}

}