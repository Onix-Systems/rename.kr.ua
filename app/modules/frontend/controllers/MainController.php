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

		$tmp = [];

		foreach ($data as $key => $value) 
			$tmp[mb_substr(str_replace(' ', '', $value['old_name']), 0, 1)] [] = $value;
		
		$this->render = ['main', ['data' => $tmp]];
	}

}






