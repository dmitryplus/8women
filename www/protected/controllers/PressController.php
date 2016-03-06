<?php

class PressController extends Controller
{

	public $allRec, $year, $years;

	public function actionIndex( $year = false )
	{

		if (!$year) {

			$criteria = new CDbCriteria;
			$criteria->select = "DATE_FORMAT(date,'%Y') as date";
			$criteria->alias = 'press';
			$criteria->distinct = true;
			$criteria->group = 'press.date';
			$criteria->order = 'press.date DESC';
			$criteria->limit = 1;

			$last = Press::model()->findAll($criteria);	

			// редиректим на список последних новостей
			$this->redirect( Yii::app()->getBaseUrl(true).'/press/year/'.$last[0]->date );
		
		} 


		$this->pageTitle = "«Восемь женщин» — Международный кинофестиваль";


// получаем и сохраняем год и список годов
		$criteria = new CDbCriteria;
		$criteria->select = "DATE_FORMAT(date,'%Y') as date";
		$criteria->alias = 'press';
		$criteria->distinct = true;
		$criteria->group = 'press.date';
		$criteria->order = 'press.date DESC';
		$this->years = Press::model()->findAll($criteria);		
		$this->year = $year;	


// подучаем список новостей
		$criteria = new CDbCriteria;
		$criteria->select = '*';
		$criteria->alias = 'press';
		$criteria->addCondition("DATE_FORMAT(press.date,'%Y')=".$year);
		$criteria->order = 'press.date DESC';

		$this->allRec = Press::model()->findAll($criteria);	

		$this->render('index');

	}




}