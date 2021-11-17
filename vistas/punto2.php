<?php
require_once './estructura/header.php';

require_once './funciones.php';


if(!empty($_GET)){
    $numero1 = !empty($_GET['numero1']) ? (int)$_GET['numero1'] : null;
    $numero2 = !empty($_GET['numero2']) ? (int)$_GET['numero2'] : null;

    $errores = array();   

    if(is_null($numero1)||is_null($numero2)){
        $errores['vacio']="No puede dejar ni un numero vacio";
    }

    if(!is_int($numero1)||!is_int($numero2)){
        $errores['tipo']="Debe ingresar numeros enteros";
    }

    if(count($errores)==0){
        $resultado = dividir($numero1, $numero2);
        if(is_null($resultado)){
            $texto="<p>No se puede dividir entre cero</p>";
        }else{
            $texto="<p>El resultado es: $resultado</p>";
        }
    }else{
        $texto = "";
        foreach($errores as $error){
            $texto.="<p>$error</p>";
        }
    }
    
}
?>

<div class="container">
    <div class="row">
        <div class="col">
            <p>
                Realice un algoritmo que reciba como parámetro dos números enteros y retorne la
                división de ambos números.
            </p>
            <form action="./punto2.php" method="get" class="row g-3">
                <div class="col-auto">
                    <input type="number" class="form-control" name="numero1" placeholder="Ingrese el numero 1" autofocus required>
                </div>
                <div class="col-auto">
                    <input type="number" class="form-control" name="numero2" placeholder="Ingrese el numero 2" required>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">Dividir</button>
                </div>
            </form>
        </div>
    </div> 
    <div class="row">
        <div class="col">
            <?php echo !empty($texto) ? $texto : '' ?>   
        </div>
    </div>    
</div>

<?php
require_once './estructura/footer.php';
?>