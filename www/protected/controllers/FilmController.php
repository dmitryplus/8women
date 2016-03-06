<?php

class FilmController extends Controller
{

	public $allRec, $year, $years;

	public function actionIndex( $year = false )
	{

		if (!$year) {

			$criteria = new CDbCriteria;
			$criteria->select = "year";
			$criteria->alias = 'film';
			$criteria->distinct = true;
			$criteria->group = 'film.year';
			$criteria->order = 'film.year DESC';
			$criteria->limit = 1;

			$last = Film::model()->findAll($criteria);	

			// редиректим на список последних фильмов
			$this->redirect( Yii::app()->getBaseUrl(true).'/film/year/'.$last[0]->year );
		
		} 


		$this->pageTitle = "«Восемь женщин» — Международный кинофестиваль";


// получаем и сохраняем год и список годов
		$criteria = new CDbCriteria;
		$criteria->select = "year";
		$criteria->alias = 'film';
		$criteria->distinct = true;
		$criteria->group = 'film.year';
		$criteria->order = 'film.year DESC';
		$this->years = Film::model()->findAll($criteria);		
		$this->year = $year;	


// подучаем список фильмов
		$criteria = new CDbCriteria;
		$criteria->select = '*';
		$criteria->alias = 'film';
		$criteria->addCondition("year=".$year);
		$criteria->order = 'film.year DESC';

		$this->allRec = Film::model()->findAll($criteria);	

		$this->render('index');

	}


	public function actionView($id)
	{

		$this->pageTitle = "«Восемь женщин» — Международный кинофестиваль";

		$this->render('view', array('one' => Film::model()->findByPk($id)));

	}


}