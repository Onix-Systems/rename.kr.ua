<?php

class ApiController extends IndexController
{

	public function actionV1()
	{
		if (isset($_GET['streets'])) {
			header('Content-Type: application/json');
			header('Last-Modified:'+date('YY MM DD'));
			if (Sili::$db->insert('stats', ['info' => json_encode($_SERVER)])) {
				echo json_encode(Sili::$model->data->getData());
			}
		}	
		
	}

}

