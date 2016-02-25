<?php 
/**
 * AltuhovKernel
 *
 * @copyright 	2015 Altuhov Konstantin
 * @author 		Altuhov Konstantin
 *
 * Класс шаблонизации приложения с помощью Smarty
 *
 */
class SmartyTemplateEngine implements TemplateEngineInterface
{	

	public $config;

	public $design;

	public function beforeRender($config){

		$this->config = $config;

		if (class_exists('Smarty')) 
			$this->design = new Smarty;
		else
			throw new Exception("Smarty is not defined", 1);
			
	} 

	public function render(){

		if ($this->config->renderOptions->template) {

			if (!empty($this->config->renderOptions->vars)) 
				foreach ($this->config->renderOptions->vars as $key => $value)
					$this->design->assign($key, $value);

			$this->design->assign('content', $this->design->fetch($this->config->viewsPath.$this->config->renderOptions->template.'.tpl'));

			$this->design->display($this->config->viewsPath.'layouts/'.$this->config->renderOptions->layout.'.tpl');
			
		}
		

	}

	public function renderPartial($templateName, $vars = []){
		if ($vars) 
			foreach ($vars as $key => $value)
				$this->design->assign($key, $value);

		return $this->design->fetch($this->config->viewsPath.$templateName.'.tpl');
	}
}