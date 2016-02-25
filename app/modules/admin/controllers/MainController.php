<?php

class MainController extends IndexController
{

	public function actionIndex()
	{
		$this->pageTitle = 'Test site'; 
		
		$this->render = ['main'];
	}

}