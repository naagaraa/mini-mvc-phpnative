<?php

/**
 * Documentasi Code
 * 
 * Bootstraping adalah salah satu teknik untuk memanggil semua file pada direktori tertentu
 * menggunakan file init.php lalu di call melalui index.php 
 */

require 'vendor/autoload.php';



require_once 'apps/init.php';

// use naming or namespace
use MiniMvc\Apps\Core\Bootstraping\App;
use MiniMvc\Apps\Core\Bootstraping\Routes;

/**
 *  Initialisasi Class App untuk menjalankan File App
 * 	App/core/App.php
 */
$Route = new Routes;
$App = new App;

// var_dump($Route->info());


/**
 *  panggil file init dan initialize dengan Filee App
 */