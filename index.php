<?php


require_once "controllers/autoloaderController.php";
require_once "views/funciones.php";

 
$autoload = new autoloaderController();
$template = new templateController();

						
/*++++++++++++++++++++++++++++++++++++ 
//  Funciones CMS
 ++++++++++++++++++++++++++++++++++++*/

//require_once "views/funciones.php";

/*++++++++++++++++++++++++++++++++++++ 
//  Controladores
 ++++++++++++++++++++++++++++++++++++ 
require_once "controllers/templateController.php"; 
require_once "controllers/siteController.php";
require_once "controllers/modulosController.php";
require_once "controllers/ingresoController.php";
require_once "controllers/sliderController.php";
require_once "controllers/articuloController.php";
require_once "controllers/galeriaController.php";
require_once "controllers/videoController.php";
require_once "controllers/usuariosController.php";
require_once "controllers/bitacoraController.php";
require_once "controllers/notificacionController.php";
require_once "controllers/paginasController.php";
require_once "controllers/contactController.php";
require_once "controllers/inmueblesController.php";
require_once "controllers/productosController.php";
require_once "controllers/ventasController.php";
 
require_once "models/modulosModel.php"; 
require_once "models/siteModel.php";
require_once "models/ingresoModel.php";
require_once "models/sliderModel.php";
require_once "models/articuloModel.php";
require_once "models/galeriaModel.php";
require_once "models/videoModel.php";
require_once "models/usuariosModel.php";
require_once "models/bitacoraModel.php";
require_once "models/notificacionModel.php";
require_once "models/paginasModel.php";
require_once "models/contactModel.php";
require_once "models/inmueblesModel.php";
require_once "models/productosModel.php";
require_once "models/ventasModel.php";


$template = new TemplateController();
$template -> template();

/*
$_SESSION["LoginAcceso"] = true;
$_SESSION["Usuario"] = $respuesta["nombre"];
$_SESSION["Email"] = $respuesta["email"];
$_SESSION["Nivel"] = $respuesta["nivel"];
$_SESSION["Id"] = $respuesta["id"];
*/





