<?php 


class notificacionController{


	static public function Usuarios(){
		$respuesta = notificacionModel::UsuariosModel();

		if(count($respuesta)>0){
			return '<span class="label label-primary pull-right">'.count($respuesta).'</span>';
		}

	}

	static public function Notificacion($table, $color=null, $filter = null){

		if($color==null)$color = 'primary'; 
		$respuesta = notificacionModel::NotificacionesModel($table, $filter);

		if($respuesta["Total"]>0){
			return '<span class="label label-'.$color.' pull-right">'.$respuesta["Total"].'</span>';
		}
	}

	static public function Ventas($var){

		if($var=="Completado")$color = 'primary'; else $color = 'danger';

		$respuesta = notificacionModel::VentasModel($var);

		 
		 return '<span class="label label-'.$color.' pull-right">'.$respuesta["total"].'</span>';
		 
	}

	static public function Chat(){ 

		$respuesta = notificacionModel::ChatModel(date("Y-m-d"));

		 
		 if($respuesta["total"]>0)return '<span class="label label-danger pull-right">'.$respuesta["total"].'</span>';
		 
	}


 





















}