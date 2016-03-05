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

}