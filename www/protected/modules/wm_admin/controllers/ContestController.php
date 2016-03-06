<?php

class ContestController extends AdminController
{


	public function actionIndex($id = false)
	{

		$path = Yii::getPathOfAlias('webroot').'/'.Yii::app()->params['contest'];

		if (file_exists($path)) { 
			$one = unserialize( file_get_contents($path) );
		} else {
			$one = array();
			file_put_contents( $path, serialize($one) );
		}


		$request = Yii::app()->request;
		if ( $request->isPostRequest ) {

			$one['active'] = $_POST['Contest']['active'];

			if ( $_FILES['anketa']['name'] ) {
				$one['anketa'] = UploadFile::save('Contest','','anketa' );
			}

			file_put_contents( $path, serialize($one) );
			$this->redirect( Yii::app()->getBaseUrl(true).'/wm_admin/contest' );

		}


		$this->render('index', array('one' => unserialize( file_get_contents($path) ) ));

	}


 
}