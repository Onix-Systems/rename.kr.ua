<?php 
/**
 * AltuhovKernel
 *
 * @copyright 	2015 Altuhov Konstantin
 * @author 		Altuhov Konstantin
 *
 * Класс шаблонизации приложения с помощью PHP
 *
 */
class PhpTemplateEngine implements TemplateEngineInterface
{	

	//Храним сдесь конфигурацию
	
	public $config;

	public function beforeRender($config){
		$this->config = $config;
	}

	public function render($config){

		$this->config = $config;

		$fileName = $this->config->viewsPath.'layouts/'.$this->config->renderOptions->layout.'.php';;

		if ($this->config->renderOptions->template) {

			if (file_exists($fileName)) {

				if ($this->config->renderOptions->layoutVars) 
					extract($this->config->renderOptions->layoutVars);
				
				$pageTitle = $this->config->pageTitle ? $this->config->pageTitle : false;

				$content = $this->renderPartial($this->config->renderOptions->template, $this->config->renderOptions->vars);

				$baseUrl = $_SERVER['SERVER_NAME'];

				return require_once $this->config->viewsPath.'layouts/'.$this->config->renderOptions->layout.'.php';

			}else
				throw new Exception("File on layout - $fileName is not defined", 1);

		}
	} 

	public function renderPartial($view_name, $vars = []){

		if ($vars) 
			extract($vars);
		
		ob_start();

	    include $this->config->viewsPath.$view_name.'.php';

	    return ob_get_clean();

	}

}