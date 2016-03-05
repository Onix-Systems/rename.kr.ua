<?php

class StreetController extends IndexController
{

	public function actionIndex()
	{
		return Sili::$app->application->redirect('/');
	}

	public function actionView(){

		if ($street = Sili::$model->data->getData(['id[==]' => Sili::$app->request->get('id')])) {
			$area = Sili::$model->data->getAreas(['id[==]' => $street[0]]);
			$this->render = ['street', ['street' => $street[0], 'area' => $area[0]]]; 
		}else{
			return Sili::$app->application->redirect('/');
		}
	}

}

