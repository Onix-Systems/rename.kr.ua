<?php

class IndexController extends Controller
{

	public function always(){


		$addedMeta = false;
		if ($this->engine->config->route['controllerId'] == 'StreetController') {
			$addedMeta = '
				<meta property="og:keywords" content="кіровоград, переіменування, вулиці, стара назва, нова назва, декомунізація, '.$this->render[1]['street']['old_name'].', '.$this->render[1]['street']['new_name'].'" />
				<meta property="og:description" content="Як переіменували в м. Кіровоград вулицю '.$this->render[1]['street']['old_name'].' ? " />
				<meta property="og:image" content="{бажано зрендерить карту гугла з відміченною вулицею}" />
			';
		}

		$this->layoutVars = ['meta' => $addedMeta];
		
	}

	public function isError($code = false){
		$this->render = ['404'];
	}

}