<?php

class MainController extends IndexController
{

	public function actionIndex()
	{
		$this->pageTitle = 'Rename.kr.ua - Новые названия улиц города кировограда';
		
		$data = Sili::$model->data->getData([

			//Order by
			'ORDER' => 'old_name', 

			//Where
			'old_name[!]' => ''

		]);
		
		$this->render = ['main', ['data' => $data]];
	}

}






