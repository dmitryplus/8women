<?php

class ContactsController extends Controller
{

	public function actionIndex()
	{

		$this->pageTitle = "«Восемь женщин» — Международный кинофестиваль";

		$this->render('index');
	}



}