<?php 


if(!empty($_POST["menu"])){
 
	if($_POST["menu"]=="true")setcookie("MenuReality", "", time() + (86400 * 30), "/");
	if($_POST["menu"]=="false")setcookie("MenuReality", "mini-navbar", time() + (86400 * 30), "/");

}





