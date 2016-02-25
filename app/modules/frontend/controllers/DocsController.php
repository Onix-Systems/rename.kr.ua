<?php

class DocsController extends IndexController
{

	public function actionIndex()
	{
		$this->pageTitle = 'Как использовать API rename.kr.ua';
		
		$this->render = ['docs'];
	}

}

