<?php
    require_once './estructura/header.php';
    require_once '../APIS/api_propietarios.php';

    $api = new api_propietarios();

    if($_SERVER['REQUEST_METHOD']=='GET'){
        $texto="";
        $nombre = !empty($_GET['nombre']) ? trim($_GET['nombre']) : null;

        if(!is_null($nombre) && ctype_alpha($nombre)){            
            $datos = json_decode($api->getJson());
            $lista = $datos->lista;
            $resultado = buscar($lista, $nombre);
            
            if($resultado){
                $texto.="<p style='color:green'>$nombre se encuentra en el JSON</p>";
            }else{
                $texto .= "<p style='color:red;'>$nombre no se encuentra en el JSON</p>";
            }
            
        }else{
            $texto .= "<p style='color:red;'>La busqueda no es valida</p>";
        }

    }

    function buscar(Array $lista, $nombre){
        $encontrado = false;
        foreach($lista as $objeto){            
            if($nombre==$objeto->nombre){
                $encontrado=true;
            }
        }
        return $encontrado;
    }
        
?>

<div class="container">
    <div class="row">
        <div class="col">
            <p>
            Con el lenguaje de su preferencia debe construir una API Rest que cumpla con lo
            siguiente:
            </p>
            <ul>
                <li>
                <p>Debe recibir un parámetro get</p>
                <p>Aqui se ingresaria un nombre de un propietario para buscar en el JSON traido</p>                
                <form action="./punto6.php" method="get" class="row g-3">
                    <div class="col-auto">                        
                        <input type="text" class="form-control" id="propietario" name="nombre" placeholder="Buscar un propietario" autofocus required>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Buscar</button>
                    </div>
                </form>
                <?php echo !empty($texto) ? $texto : '' ?>                
                </li>
                <li>
                Debe consultar en la base de datos con una de las consultas anteriores
                <ul>
                    <li>
                        <p>La consulta realizada fue:</p>
                        <p>SELECT p.id, p.nombre, mascota.cantidad FROM propietarios p, (SELECT m.id_propietario id, COUNT(1) cantidad FROM mascotas m GROUP BY m.id_propietario) mascota WHERE p.id=mascota.id AND mascota.cantidad>1</p>
                    </li>
                </ul>
                </li>
                <li>
                Debe responder en formato Json
                <ul>
                    <li>
                        <?=$api->getAll();?>
                    </li>
                </ul>
                </li>
            </ul>
        </div>
    </div>
</div>

<?php
    require_once './estructura/footer.php';
?>