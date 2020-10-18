<?php
/**
 * controller.php
 * arquivo responsavel por ter os metodos ajudadores que alimentarão todos os controllers quando for estendido neles
 * @author Daniel Florêncio
 * @copyright (c) 2018, Daniel Florêncio - StylusPrime.com
 */

class Controller {
 private $home;
 protected $db;

	public function __construct() {
		global $config;
    $pghome=new Home();
    $this->home=$pghome->getHome();
	}
	/**
   * methodo responsavel por carregar a view que a gente quer que carregue
   * @param type $viewName
   * @param type $viewData
   */
	public function loadView($viewName, $viewData = array()) {
		extract($viewData);//o extract tranforma os indices do array em uma variavel pra ser usada posteriormente
		include 'views/'.$viewName.'.php';
	}
/**
 * metodo responsavel por carregar o tamplate da pagina, deve ser chamado na pagina exemploController
 * @param type $viewName
 * @param array $viewData
 */
	//public function loadTemplate($viewName, $viewData = array()) {
	//	include 'views/template.php';
	//}
  /**
 * metodo responsavel por carregar o tamplate da pagina, deve ser chamado na pagina exemploController
 * @param type $viewName
 * @param array $viewData
 */
	public function loadTemplate($viewName, $viewData = array()) {
		include 'views/templates/'.$this->home['site_template'].'.php';
	}
/**
 * metodo responsavel por chamar a view dwntro do template, deve ser usado no arquivo do template
 * @param type $viewName
 * @param type $viewData
 */
	public function loadViewInTemplate($viewName, $viewData) {
		extract($viewData);
		include 'views/'.$viewName.'.php';
	}
  
  
  /**
 * metodo responsavel por carregar o tamplate da pagina, deve ser chamado na pagina exemploController
 * @param type $viewName
 * @param array $viewData
 */
	public function loadTemplateInAdmin($viewName, $viewData = array()) {
		include 'views/templates/admin_template.php';
	}
  
  	public function loadMenu() {
		$m = array();
		$menu = new Menu();		
		$m['menu'] = $menu->getMenu();

		$this->loadView("menu", $m);		
	}


}