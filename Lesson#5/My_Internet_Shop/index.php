<?php

/**
 * ниже код который записыват 5 последних просматриваемых страниц
 */

session_start();
if (!isset($_SESSION['po']))  $_SESSION['po']=array();
$_SESSION['po'][] = array($_SERVER["REQUEST_URI"]);
if (count($_SESSION['po'])>5) array_shift($_SESSION['po']);


/**
 * 	Фронтенд контроллер
 */

spl_autoload_register(function ($classname){
	include_once("c/$classname.php");
});
	
//Какой метод будет вызываться $_GET['act'] = 'index', 'product', 'admin', 'info', 'reg', 'login', 'logout', '',
//если один из вариантов то вызыватеться определенный класс
//$_GET['c'] = 'page', 'user', 'admin', 'basket'
//строки запроса href="index.php?c=user&act=info"

$action = 'action_';
$action .= (isset($_GET['act'])) ? $_GET['act'] : 'index';

if (isset($_GET['id'])) {
	$id = $_GET['id'];
} else {
	$id = false;
}

if (isset($_GET['c'])) {
	if ($_GET['c'] == 'page') {
		$controller = new C_Page();
	} else if ($_GET['c'] == 'user') {
		$controller = new C_User();
	}else if ($_GET['c'] == 'admin') {
		$controller = new C_Admin();
	}else if ($_GET['c'] == 'basket') {
		$controller = new C_Basket();
	}
	
} else {
	$controller = new C_Page();
}

$controller->Request($action);