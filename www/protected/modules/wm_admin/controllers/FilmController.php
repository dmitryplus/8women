<?php

class FilmController extends AdminController
{

	public $pages, $offset, $allRec;

	public function actionIndex($id = false)
	{

		$request = Yii::app()->request;
		if ( $request->isPostRequest ) {


				if ( $_POST['ajax'] == 'del-film' ) {

					$id = $_POST['id'];
					$one = Film::model()->findByPk( $id );
					UploadFile::deleteFile('Film',$id, $one->image_src);
					foreach ( $one->filmImages as $img ) {
						UploadFile::deleteFile('Film',$id, $img->src);
						FilmImage::model()->deleteByPk($img->id);
					}
					Film::model()->deleteByPk( $id );
					
					echo "ok"; exit;
				}
				


			if ( $_POST['Film']['id'] ) {
				$one = Film::model()->findByPk($_POST['Film']['id']);
			} else {
				$one = new Film;
			}

			$one->attributes = $_POST['Film'];

			if ( $_POST['Film']['id'] ) {
				$one->update();
			} else {
				$one->save();
			}

			if ( $_FILES['image_src']['name'] && $one->image_src) {
				UploadFile::deleteFile('Film',$one->id, $one->image_src);
			}

			if ( $_FILES['image_src']['name']) {
				$one->image_src = UploadFile::save('Film',$one->id,'image_src' );
				$one->update();
			}


			if ( $_FILES['producer_photo']['name'] && $one->producer_photo) {
				UploadFile::deleteFile('Film',$one->id, $one->producer_photo);
			}

			if ( $_FILES['producer_photo']['name']) {
				$one->producer_photo = UploadFile::save('Film',$one->id,'producer_photo' );
				$one->update();
			}

			if ( $_FILES['gallery']['name'][0] ) { 
				foreach ( UploadFile::saves('Film',$one->id,'gallery') as $img){
					$link = new FilmImage;
					$link->film_id = $one->id;
					$link->src = $img;
					$link->save();
				}

			}

		//	print_R( $_POST );
		//	print_R( $_FILES );

		//	echo "error"; exit;
			$this->redirect( Yii::app()->getBaseUrl(true).'/wm_admin/film' );

		}



		$criteria = new CDbCriteria;
		$criteria->select = '*';
		$criteria->alias = 'film';

		if ( $_COOKIE['filtr-find'] ) {
			$criteria->addSearchCondition("film.name", $_COOKIE['filtr-find'], true, 'OR', 'LIKE');
			$criteria->addSearchCondition("film.description", $_COOKIE['filtr-find'], true, 'OR', 'LIKE');
			$criteria->addSearchCondition("film.tech_info", $_COOKIE['filtr-find'], true, 'OR', 'LIKE');
		}

		if ( $_COOKIE['filtr-year'] ) { 
			//$criteria->addcondition("DATE_FORMAT(film.date,'%Y')=".$_COOKIE['filtr-year']);
			$criteria->addcondition("film.year=".$_COOKIE['filtr-year']);
	
		}



		$criteria->order = 'film.id DESC';
		$criteria->order = 'film.year DESC';

		$this->pages = new CPagination(Film::model()->count($criteria));		
		$this->pages->pageSize = Yii::app()->params['perpage'];
		$this->pages->applyLimit($criteria);
		$this->pages->route = "/wm_admin/film";
		$this->pages->params = array();
		$this->offset = $this->pages->getOffset();
		$this->allRec = Film::model()->findAll($criteria);	

		$this->render('index');

	}


	public function actionEdit($id = false)
	{

		if ( $id ) {
			$this->render('_form', array('one' => Film::model()->findByPk($id)));
		} else {
			$this->render('_form');
		}

	}



	public function getAllYear(){

		$criteria = new CDbCriteria;
		///$criteria->select = "DATE_FORMAT(date,'%Y') as date";
		$criteria->select = "year";

		$criteria->alias = 'film';
		$criteria->distinct = true;
		$criteria->group = 'film.year';
		$criteria->order = 'film.year DESC';
				
		$all = Film::model()->findAll($criteria);		
	
		$arYear = array();		
				
		foreach ( $all as $one ) {
			$arYear[] = $one->year;
		}	
		return $arYear;
	}
 
}