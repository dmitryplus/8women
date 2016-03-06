<?php

class NewsController extends Controller
{

	public $pages, $offset, $allRec, $year, $years;

	public function actionIndex( $year = false )
	{

		if (!$year) {

			$criteria = new CDbCriteria;
			$criteria->select = "DATE_FORMAT(date,'%Y') as date";
			$criteria->alias = 'news';
			$criteria->distinct = true;
			$criteria->group = 'news.date';
			$criteria->order = 'news.date DESC';
			$criteria->limit = 1;

			$last = News::model()->findAll($criteria);	

			// редиректим на список последних новостей
			$this->redirect( Yii::app()->getBaseUrl(true).'/news/year/'.$last[0]->date );
		
		} 


		$this->pageTitle = "«Восемь женщин» — Международный кинофестиваль";


// получаем и сохраняем год и список годов
		$criteria = new CDbCriteria;
		$criteria->select = "DATE_FORMAT(date,'%Y') as date";
		$criteria->alias = 'news';
		$criteria->distinct = true;
		$criteria->group = 'news.date';
		$criteria->order = 'news.date DESC';
		$this->years = News::model()->findAll($criteria);		
		$this->year = $year;	


// подучаем список новостей
		$criteria = new CDbCriteria;
		$criteria->select = '*';
		$criteria->alias = 'news';
		$criteria->addCondition("DATE_FORMAT(news.date,'%Y')=".$year);
		$criteria->order = 'news.date DESC';

		$this->pages = new CPagination(News::model()->count($criteria));		
		$this->pages->pageSize = Yii::app()->params['perpage'];
		$this->pages->applyLimit($criteria);
		$this->pages->route = "/news/year/".$year;
		$this->pages->params = array();
		$this->offset = $this->pages->getOffset();
		$this->allRec = News::model()->findAll($criteria);	

		$this->render('index');

	}


	public function actionView($id)
	{

		$this->pageTitle = "«Восемь женщин» — Международный кинофестиваль";

		$this->render('view', array('one' => News::model()->findByPk($id)));

	}


}