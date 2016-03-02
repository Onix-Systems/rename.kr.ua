<?php

class DocsController extends IndexController
{

	public function actionIndex()
	{
		$this->pageTitle = 'Як використовувати API rename.kr.ua';
		
		$this->render = ['docs'];
	}

}

