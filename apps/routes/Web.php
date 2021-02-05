<?php
namespace MiniMvc\Apps\Routes\Bootstraping;

use \MiniMvc\Apps\Core\Bootstraping\Routes;
use \Bramus\Router\Router;

class Web extends Routes
{
	/**
	 * -------------------------------------------------------------------------------
	 * Documentasi Code Web
	 * @author : nagara
	 * -------------------------------------------------------------------------------
	 * 
	 *  untuk mengatur Route view yang diambil pada controller
	 *  Route menggunakan library bramus/router
	 * 
	 * -------------------------------------------------------------------------------
	 *  Example 
	 * -------------------------------------------------------------------------------
	 * 
	 * 	$router->get('/login', function () {
	 *      // handle here
	 *  	$this->Routing('folder/controller', 'method');
	 *  die;
	 * 	});
	 * 
	 * 	$router->get('/news/{slug}', function ($slug) {
	 * 		// handle here
	 *  	$this->Routing('folder/controller', 'method',[$slug]);
	 *  die;
	 * 	});
	 * 
	 * 	$router->get('/about', function () {
	 * 		// handle here
	 *  	$this->Routing('controller', 'method');
	 * 	die;
	 * 	});
	 * 
	 * 	$router->get('/info', function () {
	 * 		// handle here
	 *  	phpinfo();
	 *  die;
	 * 	});
	 * --------------------------------------------------------------------------------
	 * 
	 * 
	 */

	
	public function __construct()
	{

		// Create a Router object
		$router = new Router();

		#custom 404 header un-commnet baris berikut
		// $router->set404(function() {
		// 	header('HTTP/1.1 404 Not Found');
		// 	$this->showerror_404();
		// 	exit();
		// });


		// your route here
		$router->get('/info', function () {
			$this->Routing('welcome', 'show');
		});
		$router->get('/', function () {
			$this->Routing('welcome', 'index');
		});


		// run route!
		$router->run();
	}
}