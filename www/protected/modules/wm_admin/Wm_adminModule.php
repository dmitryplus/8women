<?php

class Wm_adminModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'wm_admin.models.*',
			'wm_admin.components.*',
		));



	}

	public function beforeControllerAction($controller, $action)
	{

		if ( Yii::app()->user->isGuest ) {  
		
			if ( ( $controller->id == 'default' ) && ( $action->id == 'login' ) ) {
			
				return true;
			
			} else {

				Yii::app()->request->redirect( Yii::app()->getBaseUrl(true).'/wm_admin/login');
			}
		
		} else {

			return true;

		}

	}


}
