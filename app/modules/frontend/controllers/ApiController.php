<?php

class ApiController extends IndexController
{

	public function actionV1()
	{
		if (isset($_GET['streets'])) {
			header('Content-Type: application/json');
			if (Sili::$db->insert('stats', ['info' => json_encode($_SERVER)])) {
				$areas = false;
				foreach (Sili::$db->select('areas' , '*') as $keyArea => $valueArea) {
					$areas['r'.$valueArea['id']] = [
												'oldAreaName' => $valueArea['old_name'],
												'newAreaName' => $valueArea['new_name'],
												'objects' => Sili::$model->data->getData(['area_id' => $valueArea['id']])
											];
				}

				echo json_encode($areas);
			}
		}	
		
	}

}

