<?php

class MainController extends IndexController
{

	public function actionIndex()
	{
		$this->pageTitle = 'Rename.kr.ua - Нові назви вулиць міста Кіровограда';
		mb_internal_encoding("UTF-8");
		$responce = [];
        if($streets = Sili::$model->data->getData(['ORDER' => 'old_name', 'old_name[!]' => ''])) {
            foreach ( $streets as $key => $value ) {
                $responce[mb_strtoupper(mb_substr( $value['old_name'], 0, 1 ))][] = $value;
            }
        }
	
		$this->render = ['main', [
									'data' => $responce,
									'areas' => Sili::$db->select('areas', '*'),
									'jsonRespounce' => json_encode($responce)
								 ]
						];

	}

}






