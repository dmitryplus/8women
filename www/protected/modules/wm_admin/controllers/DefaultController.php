<?php

class DefaultController extends AdminController
{

	public $pages, $offset, $allRec;

	public function actionIndex()
	{

////удаляем новости
//		$request = Yii::app()->request;
//		if ( $request->isPostRequest ) {
//			if ( $_POST['ajax'] == 'del-news' ) {
//
//				$id = $_POST['id'];
//				$one = AkirosInfoNews::model()->findByPk( $id );
//				UploadFile::deleteFile('AkirosInfoNews',$id, $one->pic);
//				foreach ( AkirosInfoImages::model()->findAllByAttributes(array('news_id' => $id)) as $img ) {
//					UploadFile::deleteFile('AkirosInfoNews',$img->id, $img->src);
//					AkirosInfoImages::model()->deleteByPk($img->id);
//				}
//				AkirosInfoNews::model()->deleteByPk( $id );
//			}
//			echo "ok"; exit;
//		}
//
//
//		$criteria = new CDbCriteria;
//		$criteria->select = '*';
//		$criteria->alias = 'news';
//
//		if ( $_COOKIE['filtr-find'] ) {
//			$criteria->addSearchCondition("news.newsCaption", $_COOKIE['filtr-find'], true, 'AND', 'LIKE');
//		}
//
//		if ( $_COOKIE['filtr-part'] ) {
//			$criteria->addCondition("news.my_part_id = ".$_COOKIE['filtr-part']);
//		}	
//
//		if ( $_COOKIE['filtr-region'] ) {
//			$criteria->addCondition("news.region_id = ".$_COOKIE['filtr-region']);
//		}	
//
//		if ( $_COOKIE['filtr-main'] ) {
//			$_COOKIE['filtr-main'] == '2' ? $_COOKIE['filtr-main'] = 0 : '';
//			$criteria->addCondition("news.show_at_main = ".$_COOKIE['filtr-main']);
//		}	
//
//		$criteria->order = 'news.newsDate DESC';
//
//		$this->pages = new CPagination(AkirosInfoNews::model()->count($criteria));		
//		$this->pages->pageSize=10;
//		$this->pages->applyLimit($criteria);
//		$this->pages->route = "/wm_admin";
//		$this->pages->params = array();
//		$this->offset = $this->pages->getOffset();
//		$this->allRec = AkirosInfoNews::model()->findAll($criteria);	
//

		$this->allRec = array();

		$this->render('index');

	}



	public function actionLogin()
	{

		$request = Yii::app()->request;

		if ( $request->isPostRequest ) {

			$model=new LoginForm;

			$model->attributes=$_POST['enter'];

			if($model->validate() && $model->login())
				$this->redirect( Yii::app()->createUrl('wm_admin') );
			else 
				$this->actionLogout();

		} else {
			$this->render('login_form');
		}

	}

	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect( Yii::app()->createUrl('wm_admin/login') );
	}
}