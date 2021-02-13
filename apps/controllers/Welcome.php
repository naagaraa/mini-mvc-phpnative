<?php
defined('BASEURL') or exit('No direct script access allowed');

use MiniMvc\Apps\Core\Bootstraping\Controller;

/**
 * ------------------------------------------------------------------------------------
 * Documentasi
 * @author nagara
 * ------------------------------------------------------------------------------------
 * 
 * oke new, untuk menggunakan atau memanngil models ataupun view dapat menggunakan 
 * keyword $this ataupung menggunakan static function
 * 
 * contoh : 
 * menggunakan keyword $this
 * 
 * $this->view('namaview)
 * $this->model('namamodel)
 * 
 * menggunakan static function dengan memanggil nama class
 * 
 * Controller::view('namaview)
 * Controller::model('namamodel)
 * 
 */

class Welcome extends Controller
{

	public function __construct()
	{
		// code here
		
	}

	public function index()
	{
		echo "ini controller home";
	}


}