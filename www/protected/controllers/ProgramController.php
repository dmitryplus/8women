<?php

class ProgramController extends Controller
{

	public $allRec, $year, $years;

	public function actionIndex( $year = false )
	{

		if (!$year) {

			$criteria = new CDbCriteria;
			$criteria->select = "DATE_FORMAT(date,'%Y') as date";
			$criteria->alias = 'program';
			$criteria->distinct = true;
			$criteria->group = 'program.date';
			$criteria->order = 'program.date DESC';
			$criteria->limit = 1;

			$last = Program::model()->findAll($criteria);	

			// редиректим на список последних новостей
			$this->redirect( Yii::app()->getBaseUrl(true).'/program/year/'.$last[0]->date );
		
		} 


		$this->pageTitle = "«Восемь женщин» — Международный кинофестиваль";


// получаем и сохраняем год и список годов
		$criteria = new CDbCriteria;
		$criteria->select = "DATE_FORMAT(date,'%Y') as date";
		$criteria->alias = 'program';
		$criteria->distinct = true;
		$criteria->group = 'program.date';
		$criteria->order = 'program.date DESC';
		$this->years = Program::model()->findAll($criteria);		
		$this->year = $year;	


// подучаем список новостей
		$criteria = new CDbCriteria;
		$criteria->select = '*';
		$criteria->alias = 'program';
		$criteria->addCondition("DATE_FORMAT(program.date,'%Y')=".$year);
		$criteria->order = 'program.date DESC';

		$this->allRec = Program::model()->findAll($criteria);	

		$this->render('index');

	}




}