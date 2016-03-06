<?php

class ImagesController extends AdminController
{


	public function actionDeleteNews($id)
	{
		if ( $id ) {
			$img = NewsImage::model()->findByPk($id);
			UploadFile::deleteFile('News',$img->news_id, $img->src);
			NewsImage::model()->deleteByPk($id);
			echo '{}';
		}
	}

	public function actionDeleteFilm($id)
	{
		if ( $id ) {
			$img = FilmImage::model()->findByPk($id);
			UploadFile::deleteFile('Film',$img->film_id, $img->src);
			FilmImage::model()->deleteByPk($id);
			echo '{}';
		}
	}

}