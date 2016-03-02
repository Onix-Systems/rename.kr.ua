<?php

class MainController extends IndexController
{

	public function actionIndex()
	{
		$this->pageTitle = 'Rename.kr.ua - Нові назви вулиць міста Кіровограда';
		
		$this->render = ['main', [
									'data' => Sili::$model->data->getData([
												//Order by
												'ORDER' => 'old_name', 
												//Where
												'old_name[!]' => ''
											]),
									'areas' => Sili::$db->select('areas', '*')

								 ]
						];

	}

}






