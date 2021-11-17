<?php

require_once '../componentes/conectar.php';

class propietario extends conectar{

    public function __construct(){
        conectar::__construct("localhost", "mascotas_y_mascotas", "root", "");        
    }

    public function propietariosConVariasMascotas(){    
        $query = $this->getConexion()->query("SELECT p.id, p.nombre, mascota.cantidad FROM propietarios p, (SELECT m.id_propietario id, COUNT(1) cantidad FROM mascotas m GROUP BY m.id_propietario) mascota WHERE p.id=mascota.id AND mascota.cantidad>1");
        return $query;
    }
    
}