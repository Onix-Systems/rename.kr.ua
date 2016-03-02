<?php

class AboutController extends IndexController
{

	public function actionIndex()
	{
		$this->pageTitle = 'Про проект';
		
		$this->render = ['about'];
	}

}






