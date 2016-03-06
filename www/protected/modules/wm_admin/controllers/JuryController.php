<?php

class JuryController extends AdminController
{

	public $pages, $offset, $allRec;

	public function actionIndex($id = false)
	{

		$request = Yii::app()->request;
		if ( $request->isPostRequest ) {


				if ( $_POST['ajax'] == 'del-jury' ) {

					$id = $_POST['id'];
					$one = Jury::model()->findByPk( $id );
					UploadFile::deleteFile('Jury',$id, $one->image_src);
					Jury::model()->deleteByPk( $id );
					
					echo "ok"; exit;
				}


			if ( $_POST['Jury']['id'] ) {
				$one = Jury::model()->findByPk($_POST['Jury']['id']);
			} else {
				$one = new Jury;
			}

			$one->attributes = $_POST['Jury'];

			if ( $_POST['Jury']['id'] ) {
				$one->update();
			} else {
				$one->save();
			}

			if ( $_FILES['image_src']['name'] && $one->image_src) {
				UploadFile::deleteFile('Jury',$one->id, $one->image_src);
			}

			if ( $_FILES['image_src']['name']) {
				$one->image_src = UploadFile::save('Jury',$one->id,'image_src' );
				$one->update();
			}



//			print_R( $_POST );
//			print_R( $_FILES );

//			echo "error"; exit;
			$this->redirect( Yii::app()->getBaseUrl(true).'/wm_admin/jury' );

		}



		$criteria = new CDbCriteria;
		$criteria->select = '*';
		$criteria->alias = 'jury';

		if ( $_COOKIE['filtr-find'] ) {
			$criteria->addSearchCondition("jury.name", $_COOKIE['filtr-find'], true, 'OR', 'LIKE');
			$criteria->addSearchCondition("jury.description", $_COOKIE['filtr-find'], true, 'OR', 'LIKE');
		}

		$this->pages = new CPagination(Jury::model()->count($criteria));		
		$this->pages->pageSize = Yii::app()->params['perpage'];
		$this->pages->applyLimit($criteria);
		$this->pages->route = "/wm_admin/jury";
		$this->pages->params = array();
		$this->offset = $this->pages->getOffset();
		$this->allRec = Jury::model()->findAll($criteria);	

		$this->render('index');

	}


	public function actionEdit($id = false)
	{

		if ( $id ) {
			$this->render('_form', array('one' => Jury::model()->findByPk($id)));
		} else {
			$this->render('_form');
		}

	}


 
}