<?php

class IndexController extends Controller
{

	public function always(){


		$addedMeta = false;



		if ($this->engine->config->route['controllerId'] == 'StreetController') {
			
			$params = http_build_query([
				'center' =>  'Кіровоград, '.$this->render[1]['street']['old_name'],
				'zoom' => 17,
				'size' => '400x400',
				'key' => 'AIzaSyAIgYm-xXlstUJPRLaOrfPQBsD3lMXrnuM'
			]);

			$urlToGoogleStaticMap = 'https://maps.googleapis.com/maps/api/staticmap?'.$params;

			$addedMeta = '
				<meta property="og:keywords" content="кіровоград, переіменування, вулиці, стара назва, нова назва, декомунізація, '.$this->render[1]['street']['old_name'].', '.$this->render[1]['street']['new_name'].'" />
				<meta property="og:description" content="Як переіменували в м. Кіровоград вулицю '.$this->render[1]['street']['old_name'].' ? " />
				<meta property="og:image" content="'.$urlToGoogleStaticMap.'" />
			';
		}

		$this->layoutVars = ['meta' => $addedMeta];
		
	}

	public function isError($code = false){
		header("HTTP/1.0 404 Not Found");
		$this->layout = 'error';
		$this->render = ['404'];
	}

}
