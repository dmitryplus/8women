<?php

class ProgramController extends AdminController
{

	public $pages, $offset, $allRec;

	public function actionIndex($id = false)
	{

		$request = Yii::app()->request;
		if ( $request->isPostRequest ) {


				if ( $_POST['ajax'] == 'del-program' ) {

					$id = $_POST['id'];
					$one = Program::model()->findByPk( $id );

					Program::model()->deleteByPk( $id );
					
					echo "ok"; exit;
				}
				


			if ( $_POST['Program']['id'] ) {
				$one = Program::model()->findByPk($_POST['Program']['id']);
			} else {
				$one = new Program;
			}

			$one->attributes = $_POST['Program'];

			if ( $_POST['Program']['id'] ) {
				$one->update();
			} else {
				$one->save();
			}



		//	print_R( $_POST );
		//	print_R( $_FILES );

		//	echo "error"; exit;
			$this->redirect( Yii::app()->getBaseUrl(true).'/wm_admin/program' );

		}



		$criteria = new CDbCriteria;
		$criteria->select = '*';
		$criteria->alias = 'program';

		if ( $_COOKIE['filtr-find'] ) {
			$criteria->addSearchCondition("program.place", $_COOKIE['filtr-find'], true, 'OR', 'LIKE');
			$criteria->addSearchCondition("program.description", $_COOKIE['filtr-find'], true, 'OR', 'LIKE');
		}

		if ( $_COOKIE['filtr-year'] ) { 
			$criteria->addcondition("DATE_FORMAT(program.date,'%Y')=".$_COOKIE['filtr-year']);
		
		}



		$criteria->order = 'program.date DESC';

		$this->pages = new CPagination(Program::model()->count($criteria));		
		$this->pages->pageSize = Yii::app()->params['perpage'];
		$this->pages->applyLimit($criteria);
		$this->pages->route = "/wm_admin/program";
		$this->pages->params = array();
		$this->offset = $this->pages->getOffset();
		$this->allRec = Program::model()->findAll($criteria);	

		$this->render('index');

	}


	public function actionEdit($id = false)
	{

		if ( $id ) {
			$this->render('_form', array('one' => Program::model()->findByPk($id)));
		} else {
			$this->render('_form');
		}

	}



	public function getAllYear(){

		$criteria = new CDbCriteria;
		$criteria->select = "DATE_FORMAT(date,'%Y') as date";
		$criteria->alias = 'program';
		$criteria->distinct = true;
		$criteria->group = 'program.date';
		$criteria->order = 'program.date DESC';
				
		$all = Program::model()->findAll($criteria);		
	
		$arYear = array();		
				
		foreach ( $all as $one ) {
			$arYear[] = $one->date;
		}	
		return $arYear;
	}
 
}