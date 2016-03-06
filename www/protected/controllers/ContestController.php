<?php

class ContestController extends Controller
{

	public function actionIndex()
	{

		$this->pageTitle = "«Восемь женщин» — Международный кинофестиваль";

		$this->render('index');
	}



}