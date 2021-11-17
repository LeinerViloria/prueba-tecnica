<?php
    require_once './estructura/header.php';
    require_once '../APIS/api_propietarios.php';

    $api = new api_propietarios();
        
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
                Debe recibir un parámetro get
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