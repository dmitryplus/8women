<?php

class ImagesController extends AdminController
{


	public function actionDelete($id)
	{
		if ( $id ) {
			$img = AkirosInfoImages::model()->findByPk($id);
			UploadFile::deleteFile('AkirosInfoImages',$id, $img->src);
			AkirosInfoImages::model()->deleteByPk($id);
			echo '{}';
		}
	}

}