<?php 
/**
 * AltuhovKernel
 *
 * @copyright 	2015 Altuhov Konstantin
 * @author 		Altuhov Konstantin
 *
 * Класс шаблонизации приложения с помощью Twig
 *
 */
class TwigTemplateEngine implements TemplateEngineInterface{	

	public $config;

	public $design;

	public function beforeRender($config){
		
		$this->config = $config;

		if ( class_exists('Twig_Loader_Filesystem') && class_exists('Twig_Environment') ) {

			$loader = new Twig_Loader_Filesystem([$this->config->viewsPath, $this->config->viewsPath.'/layouts']);

			$this->design = new Twig_Environment($loader, [

			    'cache' => DOCUMENT_ROOT.$this->config->templateEngineConfig['compiledDir'],

			    'debug' => true
			    
			]);


		}else
			throw new Exception("Twig components is not defined", 1);
		
			
	} 

	public function render($config){

		$this->config = $config;

		if ($this->config->renderOptions->template) {

			$this->config->renderOptions->layoutVars['content'] = $this->design->render($this->config->renderOptions->template.'.html', $this->config->renderOptions->vars);

			$this->config->renderOptions->layoutVars['pageTitle'] = $this->pageTitle;

			echo $this->design->render($this->config->renderOptions->layout.'.html', $this->config->renderOptions->layoutVars);

		}
		

	}

	public function renderPartial($templateName, $vars = []){

		return $this->design->render($templateName.'.html', $vars);

	}
}




