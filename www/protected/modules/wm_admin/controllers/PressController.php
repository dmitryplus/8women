<?php

class PressController extends AdminController
{

	public $pages, $offset, $allRec;

	public function actionIndex($id = false)
	{

		$request = Yii::app()->request;
		if ( $request->isPostRequest ) {


				if ( $_POST['ajax'] == 'del-press' ) {

					$id = $_POST['id'];
					$one = Press::model()->findByPk( $id );
					Press::model()->deleteByPk( $id );
					
					echo "ok"; exit;
				}
				


			if ( $_POST['Press']['id'] ) {
				$one = Press::model()->findByPk($_POST['Press']['id']);
			} else {
				$one = new Press;
			}

			$one->attributes = $_POST['Press'];

			if ( $_POST['Press']['id'] ) {
				$one->update();
			} else {
				$one->save();
			}


		//	print_R( $_POST );
		//	print_R( $_FILES );

		//	echo "error"; exit;
			$this->redirect( Yii::app()->getBaseUrl(true).'/wm_admin/press' );

		}



		$criteria = new CDbCriteria;
		$criteria->select = '*';
		$criteria->alias = 'press';

		if ( $_COOKIE['filtr-find'] ) {
			$criteria->addSearchCondition("press.title", $_COOKIE['filtr-find'], true, 'OR', 'LIKE');
		}

		if ( $_COOKIE['filtr-year'] ) { 
			$criteria->addcondition("DATE_FORMAT(press.date,'%Y')=".$_COOKIE['filtr-year']);
		
		}



		$criteria->order = 'press.date DESC';

		$this->pages = new CPagination(Press::model()->count($criteria));		
		$this->pages->pageSize = Yii::app()->params['perpage'];
		$this->pages->applyLimit($criteria);
		$this->pages->route = "/wm_admin/press";
		$this->pages->params = array();
		$this->offset = $this->pages->getOffset();
		$this->allRec = Press::model()->findAll($criteria);	

		$this->render('index');

	}


	public function actionEdit($id = false)
	{

		if ( $id ) {
			$this->render('_form', array('one' => Press::model()->findByPk($id)));
		} else {
			$this->render('_form');
		}

	}



	public function getAllYear(){

		$criteria = new CDbCriteria;
		$criteria->select = "DATE_FORMAT(date,'%Y') as date";
		$criteria->alias = 'press';
		$criteria->distinct = true;
		$criteria->group = 'press.date';
		$criteria->order = 'press.date DESC';
				
		$all = Press::model()->findAll($criteria);		
	
		$arYear = array();		
				
		foreach ( $all as $one ) {
			$arYear[] = $one->date;
		}	
		return $arYear;
	}
 
}