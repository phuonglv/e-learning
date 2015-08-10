<?php
//load config
require_once 'config.php';

//xử lý request từ trình duyệt và gọi controller/action tương ứng
if (isset($_POST['controller'])) {
	$controller = $_POST['controller'].'Controller';
} else {
	$controller = 'testController';
}

if (isset($_POST['action'])) {
	$action = $_POST['action'];
} else {
	$action = 'index';
}

$file = 'controllers'.DS.$controller.'.php';
if (file_exists($file)) {
	require $file;
	$c = new $controller;
	$c->$action();
} else {

	require ROOT.DS.'error_404.php';
}

//đóng kết nối
$db = null;

?>