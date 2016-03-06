<?php

class JuryController extends Controller
{


	public function actionView($id)
	{

		$this->pageTitle = "«Восемь женщин» — Международный кинофестиваль";

		$this->render('view', array('one' => Jury::model()->findByPk($id)));

	}


}