<?php 


require "Controller.php";
require "Model.php";
require 'funciones.php';


if( !isset($_COOKIE["ElCliente"])  ){
	setcookie("ElCliente", mt_rand(5,50000), time() + (186400 * 30), "/");
}




 


if(!empty($_POST["id"]) ){

	$page = new Controller();
	$user = $page->GetUserController($_COOKIE["ElCliente"]);
	$cart = $page->GetCompraController($user["id"]);
	$oper = $page->InsertProductoController($cart["id"], $_POST["id"]);
	echo $oper;

}else{
	exit();
}















