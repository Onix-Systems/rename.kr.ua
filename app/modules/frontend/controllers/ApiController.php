<?php

class ApiController extends IndexController
{

	public function actionV1()
	{
		if (isset($_GET['streets'])) {
			header('Content-Type: application/json');
			if (Sili::$db->insert('stats', ['info' => json_encode($_SERVER)])) {

				$area = ['r' => [
						'oldAreaName' => '',
						'newAreaName' => '',
						'objects' => []
					]
				];
				foreach (Sili::$model->data->getData() as $key => $value) {
					$area['r']['objects'][] = [

						'type' => $value['object_type'],

						'newType' => '',

						'oldName' => $value['old_name'],

						'newName' => $value['bew_name'],

						'restored'=> true,

						'link' => [

							'href' => $value['eponim'],

							'type' => $value['eponim_type']

						]
					];
				}
				echo json_encode($area);
			}
		}	
		
	}

}

