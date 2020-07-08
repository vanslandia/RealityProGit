<?php 


class bitacoraController{


	static public function ListaSucesoController(){

        $limite = 150;

        if(empty($_POST["buscar"])){
            $respuesta = bitacoraModel::ListaSucesoModel();
        }else{
            $arrayItem = array(); 
            $qryStr="";

            if(!empty($_POST["suceso"])){
                array_push($arrayItem, $_POST["suceso"] ); 
                array_push($arrayItem, $_POST["suceso"] ); 
                $qryStr .= "  suceso LIKE  CONCAT('%',?,'%') OR usuario LIKE  CONCAT('%',?,'%') ";
            }
            if(!empty($_POST["fecha"]) && !empty($_POST["fecha2"]) ){
                 if(count($arrayItem)>0)$pre = " AND ";else  $pre = " ";
                 array_push($arrayItem,$_POST["fecha"]);
                 array_push($arrayItem,$_POST["fecha2"]);
                 $qryStr .= $pre."  fecha BETWEEN ? AND ? "; 
             }

           // var_dump($arrayItem);

            $respuesta = bitacoraModel::BuscarSucesoModel($arrayItem, $qryStr);
        }

		

		if(count($respuesta)>0){
			foreach ($respuesta as $key => $value) {
				echo '
					<div class="timeline-item">
                                        <div class="row">
                                            <div class="col-xs-3 date">
                                                <i class="fa fa-file-text"></i>
                                                <small>'.Hora($value["fecha"]).'</small>
                                                <br/>
                                                <small class="text-navy">'.PresentarFecha($value["fecha"]).'</small>
                                            </div>
                                            <div class="col-xs-10 content">
                                                <p class="m-b-xs"><strong><small>'.$value["usuario"].'</small></strong>
                                                <span class="label label-primary pull-right">'.$value["ip"].'</span>
                                                </p>
                                                <p><small>'.$value["suceso"].'</small><small class="text-navy"> </small></p>
                                            </div>
                                        </div>
                                    </div> <!-- timeline-item -->
				';
			}

		}else{
			echo '<div class="alert alert-warning">No hay registros.</div>';
		}


		
	}//function 


    static public function Registro($datos, $otro=NULL){

        if(!empty($_SESSION["Usuario"]))$usuario = $_SESSION["Usuario"]; else $usuario  = $otro;
        $datos = array("usuario"=>$usuario ,
                        "suceso"=>$datos,
                        "ip"=>$_SERVER["REMOTE_ADDR"]
                       );
        bitacoraModel::RegistroModel($datos);

    }// function 

































}