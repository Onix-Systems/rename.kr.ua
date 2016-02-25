<?php

class MainController extends IndexController
{

	public function actionIndex()
	{
		$this->pageTitle = 'Test application';
		
		$this->render = ['main', ['test' => 'Hello world']];
	}

}






