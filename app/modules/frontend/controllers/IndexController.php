<?php

class IndexController extends Controller
{

	public function always(){

		$this->assets = [
			'css' => [
				'main.css'
			],
			'js' => [
				'jquery.js',
				'main.js'
			]
		];

		$this->layoutVars = ['test' => '123'];
		
	}

	public function isError($code = false){
		$this->render = ['404'];
	}

}