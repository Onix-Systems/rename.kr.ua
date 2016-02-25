<?php 
/**
 * AltuhovKernel
 *
 * @copyright 	2015 Altuhov Konstantin
 * @author 		Altuhov Konstantin
 *
 * Интерфейс для реализации сторонних шаблонизаторов
 *
 */
interface TemplateEngineInterface{

	//Функция вызываеться когда необходимо произвести рендер страници.
	//Принимает параметры для ее отображения
	public function render($config);

	//Функция вызываеться когда происходит вызов контроллра
	//и принимает базовые парамтеры. Можно использовать как конструктор
	public function beforeRender($config);

	//Функция для реализации рендера отдельной
	//части отображения
	// $templateName (string) - название view
	// $vars (object, array) - принимаемые переменнные
	public function renderPartial($templateName, $vars);
	
}
