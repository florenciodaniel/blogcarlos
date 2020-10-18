<?php
/**
 * Core.php
 * arquivo base do sistema que identifica qual arquivo deve ser acessado apartir de uma requisição
 * @author Daniel Florêncio
 * @copyright (c) 2018, Daniel Florêncio - StylusPrime.com
 */

/**
 * Core- classe responsavel por dar inicio para o funcionamento do sistema 
 */
class Core {
/**
 * metodo  que pega a url enviada e identifica qual controller acessar e apartir dele qual action
 */
	public function run() {
        $url = '/'.(isset($_GET['url'])?$_GET['url']:'');

		$params = array();
		if(!empty($url) && $url != '/') {
			$url = explode('/', $url);
			array_shift($url);

			$currentController = $url[0].'Controller';
			array_shift($url);

			if(isset($url[0]) && $url[0] != '/') {
				$currentAction = $url[0];
				array_shift($url);
			} else {
				$currentAction = 'index';
			}

			if(count($url) > 0) {
				$params = $url;
			}

		} else {
			$currentController = 'homeController';
			$currentAction = 'index';
		}

		if(!file_exists('controllers/'.$currentController.'.php')) {
			$currentController = 'notFoundController';
			$currentAction = 'index';
		}

		$c = new $currentController();

		if(!method_exists($c, $currentAction)) {
			$currentAction = 'index';
		}

		call_user_func_array(array($c, $currentAction), $params);

	}

}