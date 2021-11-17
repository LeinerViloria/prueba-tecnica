<?php
require_once '../modelos/propietario.php';

class api_propietarios {

    function getAll(){
        $propietario = new propietario();
        
        $propietarios = array();
        $propietarios["lista"]=array();

        $res = $propietario->propietariosConVariasMascotas();

        if($res->rowCount()){
            while($row = $res->fetch(PDO::FETCH_ASSOC)){
                $item = array(
                    'id'=>$row['id'],
                    'nombre'=>$row['nombre'],
                    'cantidad'=>$row['cantidad']
                );
                array_push($propietarios['lista'],$item);
            }
            echo json_encode($propietarios);
        }else{
            echo json_encode(array("mensaje"=>"No hay elementos registrados"));
        }
    }
}