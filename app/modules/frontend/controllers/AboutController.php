<?php

class AboutController extends IndexController
{

	public function actionIndex()
	{
		$this->pageTitle = 'О проекте';
		
		$this->render = ['about'];
	}

}






