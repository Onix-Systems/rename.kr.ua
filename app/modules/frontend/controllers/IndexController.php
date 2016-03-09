<?php

class IndexController extends Controller
{

	public function always(){


		$addedMeta = false;



		if ($this->engine->config->route['controllerId'] == 'StreetController') {
			$urlToGoogleStaticMap = 'https://maps.googleapis.com/maps/api/staticmap?center=%D0%9A%D1%96%D1%80%D0%BE%D0%B2%D0%BE%D0%B3%D1%80%D0%B0%D0%B4,%20%D0%B1%D0%BE%D0%BB%D1%8C%D1%88%D0%B0%D1%8F%20%D0%BF%D0%B5%D1%80%D1%81%D0%BF%D0%B5%D0%BA%D1%82%D0%B8%D0%B2%D0%BD%D0%B0%D1%8F&zoom=15&size=600x300&maptype=roadmap&markers=color:blue%7Clabel:S%7C40.702147,-74.015794&markers=color:green%7Clabel:G%7C40.711614,-74.012318&markers=color:red%7Clabel:C%7C40.718217,-73.998284&key='.trim(Sili::getConfig()['googleApiKey']);
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
