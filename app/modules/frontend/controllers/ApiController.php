<?php

class ApiController extends IndexController
{

	public function actionV1()
	{
		if (isset($_GET['streets'])) {
			header('Content-Type: application/json');
			if ($filter = Sili::$app->request->get('filter')) {
				foreach ($filter as $key => $value) {
					if (strpos($key, '_like') !== false) {
						$filter[explode('_like', $key)[0].'[~]'] = $value;
						unset($filter[$key]);
					}
				}
				$data = Sili::$model->data->getData(['AND' => $filter]);
				print_r($filter);
				if ($data) {
					echo json_encode($data);
				}
			}else{
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

}

