<?php 


class chatController{


	static public function AddRespuestacontroller(){
		if( !empty($_POST["message"]) && !empty($_POST["chat"])  ){
			// $_SESSION["Usuario"] , $_SESSION["Id"]
			chatModel::UpdateAgenteCharModel($_POST["chat"], $_SESSION["Id"]);

			chatModel::AddAgenteAddModel($_POST["chat"], $_SESSION["Id"], $_POST["message"]);

		}

	}



	static public function ListaDeChatController(){

		$fecha = (empty($_GET["fecha"]))?date("Y-m-d"):$_GET["fecha"];

		$dato = chatModel::ListaDeChatModel($fecha);
		$intervenciones = count($dato);

		if( count($dato)> 0 && is_array($dato)  ){	

			$rows = null;			
			foreach ($dato as $row => $item) { 
				#elUser

				$resp = chatModel::ChatPendienteModel($item["id"]);
				$label = ($resp["admin"]<1)?'<span class="pull-right label label-warning">Pend...</span>':null;

				$lasResponse = chatModel::UltimaRespuestaModel($item["id"]);

				if($lasResponse["user"]==$item["elUser"])$label = '<span class="pull-right label label-primary"><i class="fa fa-clock-o"></i></span>';

				$rows .= '<div class="chat-user">
											'.$label.'
                                            <img class="chat-avatar" src="'.$item["image"].'" alt="" >
                                            <div class="chat-user-name verChat" style="cursor:pointer" data-id="'.$item["id"].'" >
                                                 <span class="text-navy bold small">'.$item["user"].'</span> 
                                            </div>
                           </div>'; 
			}
			echo $rows;

		}else{

			echo ' <div class="chat-user m-lg">
                        <div class="alert alert-info">No hay chats</div>
                    </div>';

		}
	}// method



	static public function ConversacionChatNewController(){
		$new = chatModel::ConversacionChatNewModel(date("Y-m-d"));
		return $new["Total"];
	}





	static public function ConversacionChatIDController($id){ 
		 $datosUltimo = chatModel::UltimaConversacionIdChatModel($id);

		 #var_dump($datosUltimo);

		 if( count($datosUltimo)> 0 && is_array($datosUltimo)  ){

		 	 $datosChat = chatModel::ConversacionChatModel($datosUltimo["id"]);
		 	 if( count($datosChat)> 0 && is_array($datosChat)  ){
		 	 	$rows =null;
		 	 	$user = null;
		 	 	$aling = null;
		 	 	$inv = array();
		 	 	$label = array("right", "left");
		 	 	$cont = 0;
		 	 		foreach ($datosChat as $row => $dat) { 

		 	 			if( !array_key_exists($dat["user"], $inv)){$inv[$dat["user"]] = $label[$cont]; $cont++;}
		 	 			

		 	 			$rows .= '<div class="chat-message '.$inv[$dat["user"]] .'">
                                        <img class="message-avatar" src="'.$dat["image"].'" alt="" >
                                        <div class="message">
                                            <span class="text-navy">'.$dat["user"].' </span>
                                            <span class="message-date"> '.PresentarFecha($dat["fecha"]).' - '.Hora($dat["fecha"]).' </span>
                                            <span class="message-content"> '.$dat["message"].' </span>
                                        </div>
                                    </div>';
		 	 		}


		 	 		$rows .= '<script> $(function() { $("#chat").val('.$datosUltimo["id"].');  });  </script>';


		 	 		return $rows;
		 	 		//var_dump($inv);
		 	 }

		 }else{
		 	return '<div class="alert alert-warning">No hay conversaciones</div>';
		 }	

		 

	}// method







	static public function ConversacionChatController(){
		 $fecha = (empty($_GET["fecha"]))?date("Y-m-d"):$_GET["fecha"];
		 $datosUltimo = chatModel::UltimaConversacionChatModel($fecha );

		 if( !empty($_POST["chat"]) )$datosUltimo = chatModel::UltimaConversacionIdChatModel($_POST["chat"]);

		 #var_dump($datosUltimo);

		 if( count($datosUltimo)> 0 && is_array($datosUltimo)  ){

		 	 $datosChat = chatModel::ConversacionChatModel($datosUltimo["id"]);
		 	 if( count($datosChat)> 0 && is_array($datosChat)  ){
		 	 	$rows =null;
		 	 	$user = null;
		 	 	$aling = null;
		 	 	$inv = array();
		 	 	$label = array("right", "left");
		 	 	$cont = 0;
		 	 		foreach ($datosChat as $row => $dat) { 

		 	 			if( !array_key_exists($dat["user"], $inv)){$inv[$dat["user"]] = $label[$cont]; $cont++;}
		 	 			

		 	 			$rows .= '<div class="chat-message '.$inv[$dat["user"]] .'">
                                        <img class="message-avatar" src="'.$dat["image"].'" alt="" >
                                        <div class="message">
                                            <span class="text-navy">'.$dat["user"].' </span>
                                            <span class="message-date"> '.PresentarFecha($dat["fecha"]).' - '.Hora($dat["fecha"]).' </span>
                                            <span class="message-content"> '.$dat["message"].' </span>
                                        </div>
                                    </div>';
		 	 		}


		 	 		$rows .= '<script> $(function() { $("#chat").val('.$datosUltimo["id"].');  });  </script>';


		 	 		return $rows;
		 	 		//var_dump($inv);
		 	 }

		 }else{
		 	return '<div class="alert alert-warning">No hay conversaciones</div>';
		 }	

		 

	}// method














}