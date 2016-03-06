<?php

class NewsController extends AdminController
{

	public $pages, $offset, $allRec;

	public function actionIndex($id = false)
	{

		$request = Yii::app()->request;
		if ( $request->isPostRequest ) {


				if ( $_POST['ajax'] == 'del-news' ) {

					$id = $_POST['id'];
					$one = News::model()->findByPk( $id );
					UploadFile::deleteFile('News',$id, $one->image_src);
					foreach ( $one->newsImages as $img ) {
						UploadFile::deleteFile('News',$id, $img->src);
						newsImage::model()->deleteByPk($img->id);
					}
					News::model()->deleteByPk( $id );
					
					echo "ok"; exit;
				}
				


			if ( $_POST['News']['id'] ) {
				$one = News::model()->findByPk($_POST['News']['id']);
			} else {
				$one = new News;
			}

			$one->attributes = $_POST['News'];

			if ( $_POST['News']['id'] ) {
				$one->update();
			} else {
				$one->save();
			}

			if ( $_FILES['image_src']['name'] && $one->image_src) {
				UploadFile::deleteFile('News',$one->id, $one->image_src);
			}

			if ( $_FILES['image_src']['name']) {
				$one->image_src = UploadFile::save('News',$one->id,'image_src' );
				$one->update();
			}

			if ( $_FILES['gallery']['name'][0] ) { 
				foreach ( UploadFile::saves('News',$one->id,'gallery') as $img){
					$link = new NewsImage;
					$link->news_id = $one->id;
					$link->src = $img;
					$link->save();
				}

			}

		//	print_R( $_POST );
		//	print_R( $_FILES );

		//	echo "error"; exit;
			$this->redirect( Yii::app()->getBaseUrl(true).'/wm_admin/news' );

		}



		$criteria = new CDbCriteria;
		$criteria->select = '*';
		$criteria->alias = 'news';

		if ( $_COOKIE['filtr-find'] ) {
			$criteria->addSearchCondition("news.name", $_COOKIE['filtr-find'], true, 'OR', 'LIKE');
			$criteria->addSearchCondition("news.description", $_COOKIE['filtr-find'], true, 'OR', 'LIKE');
			$criteria->addSearchCondition("news.content", $_COOKIE['filtr-find'], true, 'OR', 'LIKE');
		}

		if ( $_COOKIE['filtr-year'] ) { 
			$criteria->addcondition("DATE_FORMAT(news.date,'%Y')=".$_COOKIE['filtr-year']);
		
		}



		$criteria->order = 'news.date DESC';

		$this->pages = new CPagination(News::model()->count($criteria));		
		$this->pages->pageSize = Yii::app()->params['perpage'];
		$this->pages->applyLimit($criteria);
		$this->pages->route = "/wm_admin/news";
		$this->pages->params = array();
		$this->offset = $this->pages->getOffset();
		$this->allRec = News::model()->findAll($criteria);	

		$this->render('index');

	}


	public function actionEdit($id = false)
	{

		if ( $id ) {
			$this->render('_form', array('one' => News::model()->findByPk($id)));
		} else {
			$this->render('_form');
		}

	}



	public function getAllYear(){

		$criteria = new CDbCriteria;
		$criteria->select = "DATE_FORMAT(date,'%Y') as date";
		$criteria->alias = 'news';
		$criteria->distinct = true;
		$criteria->group = 'news.date';
		$criteria->order = 'news.date DESC';
				
		$all = News::model()->findAll($criteria);		
	
		$arYear = array();		
				
		foreach ( $all as $one ) {
			$arYear[] = $one->date;
		}	
		return $arYear;
	}
 
}