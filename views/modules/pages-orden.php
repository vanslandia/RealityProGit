<?php 


require_once "../../models/conexion.php";

if ( !empty($_POST["list"]) ) { 

    GuardarOrdenActividad(json_decode($_POST['list'], true));   
}


function GuardarOrdenActividad($list, $parent_id = 0, $m_order = 0){

      foreach($list as $item) {

                $m_order++; 

                $sql = " UPDATE pages  SET parent = :parent, posicion = :posicion WHERE id = :id "; //, nodoPadre=:nodoPadre
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindValue(":parent", $parent_id, PDO::PARAM_INT);
                $stmt->bindValue(":id", $item["id"], PDO::PARAM_INT); 
                $stmt->bindValue(":posicion", $m_order, PDO::PARAM_INT);
                $stmt->execute();
 

                if (array_key_exists("children", $item)) {
                    GuardarOrdenActividad($item["children"], $item["id"], $m_order);
                } 

    }//foreach     

}// function 
      
 
