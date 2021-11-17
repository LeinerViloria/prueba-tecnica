<?php
require_once './estructura/header.php';

?>

<div class="container">
    <div class="row">
        <div class="col">
            <p>
            La empresa “Mascotas y Mascotas”, rescata animales que han sido abandonados, los
            rehabilitan y cuando están totalmente sanos, los ponen a disposición para que estos sean
            adoptados, se tienen las siguientes entidades:
            </p>
            <img src="../img/modelo.jpg" alt="Mascotas y mascotas">
            <p>
            Construya el modelo entidad relación en la base de datos de su elección (relaciones, tipos
            de datos, llaves primarias y foráneas, etc…), si ud. lo considera necesario, puede adicionar
            más entidades o tablas.
            </p>
            <p>
            De acuerdo al modelo ER que Ud. acaba de transcribir, escriba las siguientes instrucciones
            SQL:
            </p>
            <ul>
                <li>
                    Listar todas las mascotas.
                    <ul>
                        <li>SELECT id, nombre FROM mascotas;</li>
                    </ul>
                </li>
                <br>
                <li>
                    Listar las mascotas que no han sido adoptadas.
                    <ul>
                        <li>
                        SELECT m.id "Id mascota", m.nombre "Nombre mascota", m.id_propietario "Id propietario"
                        FROM mascotas m
                        WHERE m.id_propietario=NULL;
                        </li>
                    </ul>
                </li>
                <br>
                <li>
                    Listar el número de mascotas por cada tipo de mascota.
                    <ul>
                        <li>
                        SELECT tm.id "Tipo de mascota", tm.nombre "Nombre del tipo", COUNT(1) "Numero de mascotas"
                        FROM mascotas m, tipos_mascota tm
                        WHERE m.id_tipo_mascota=tm.id
                        GROUP BY m.id_tipo_mascota;
                        </li>
                    </ul>
                </li>
                <br>
                <li>
                    Listar los propietarios que tengan más de una mascota.
                    <ul>
                        <li>
                        SELECT p.id, p.nombre, mascota.cantidad
                        FROM propietarios p, (SELECT m.id_propietario id, COUNT(1) cantidad
                                            FROM mascotas m
                                            GROUP BY m.id_propietario) mascota
                        WHERE p.id=mascota.id AND mascota.cantidad>1;
                        </li>
                    </ul>
                </li>
                <br>
                <li>
                    Listar el número de mascotas por cada tipo de mascota y por cada propietario
                    <ul>
                        <li>
                        SELECT t.nombre "Nombre tipo", p.nombre "Nombre del propietario", COUNT(1) cantidad
                        FROM mascotas m, tipos_mascota t, propietarios p
                        WHERE m.id_tipo_mascota=t.id AND m.id_propietario=p.id
                        GROUP BY m.id_tipo_mascota, m.id_propietario
                        ORDER BY 1, 2;
                        </li>
                    </ul>
                </li>
                <br>
                <li>
                    Listas los propietarios que no tienen mascotas
                    <ul>
                        <li>
                        SELECT p.id, p.nombre
                        FROM propietarios p
                        WHERE NOT(p.id IN (SELECT m.id_propietario
                                    FROM mascotas m
                                    GROUP BY m.id_propietario));
                        </li>
                    </ul>
                </li>
            </ul>
            <button type="button" class="btn btn-info"><a href="../bd/mascotas_y_mascotas.sql" download>Descargar base de datos</a></button>
            <br><br>
        </div>
    </div>        
</div>

<?php
require_once './estructura/footer.php';
?>