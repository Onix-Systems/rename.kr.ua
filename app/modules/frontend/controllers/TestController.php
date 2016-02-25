<?php

class TestController extends IndexController
{

	public function actionIndex()
	{
		$this->pageTitle = 'Test page';
		
		$this->render = ['main', ['test' => 'Hello world <span style="color: red;">(its action "index" on TestControlelr)</span>']];
	}

	public function actionExample()
	{
		$this->pageTitle = 'Test page - example action';
		
		$this->render = ['main', ['test' => 'Hello world <span style="color: red;">(its action "example" on TestControlelr)</span>']];
	}

}






