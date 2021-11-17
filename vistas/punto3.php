<?php
    require_once './estructura/header.php';
    require_once './funciones.php';

    if($_SERVER['REQUEST_METHOD']=='POST'){
        //Por lo menos debe existir un numero
        if(!empty($_POST['numero1'])){
            $numeros = Array();            
            $texto = "";

            $i=1;

            do{
                $numeros[$i] = $_POST['numero'.$i];

                if(!is_numeric($numeros[$i])){
                    $texto.="'<p>$numeros[$i]' no es un numero</p>";
                }else if($numeros[$i]<=0){
                    $texto.="<p>$numeros[$i] no es positivo</p>";
                }else if($numeros[$i]==1){
                    $texto.="<p>El <strong>1</strong> no se tiene en cuenta</p>";
                }else{
                    $divisores = divisores($numeros[$i]);
                    $suma = sumarDivisores($divisores);
                    $perfecto = numeroPerfecto($numeros[$i], $suma);

                    if($perfecto){
                        $texto.="<p><strong>$numeros[$i]</strong> es un numero perfecto, sus divisores son <strong>".implode(", ", $divisores)."</strong> y la suma de sus divisores es <strong>$suma</strong></p>";
                    }else{
                        $texto.="<p><strong>$numeros[$i]</strong> no es un numero perfecto, sus divisores son <strong>".implode(", ", $divisores)."</strong> y la suma de sus divisores es <strong>$suma</strong></p>";
                    }
                }                

                $i++;
            }while(!empty($_POST['numero'.$i]));            
            
        }


    }

?>

<div class="container">
    <div class="row">
        <div class="col">
            <p>Un entero positivo se llama perfecto si éste es igual a la suma de todos sus divisores
            diferentes de él. Por ejemplo:
            </p>
            <p>--> 6 es perfecto porque 6 = 1 + 2 + 3</p>
            <p>--> 28 es perfecto porque 28 = 1 + 2 + 4 + 7 + 14</p>
            <p>Escriba un programa que reciba como entrada n números enteros positivos, y por cada uno
            de ellos imprima sus divisores e indique si es perfecto o no.</p>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col">
            <form action="./punto3.php" method="post" class="row g-3">                
                <!--En el div adicionales se pondran los inputs para los n numeros-->
                <div id="adicionales" class="col-auto">
                    <div class="col-auto">
                        <input type="number" class="form-control" name="numero1" placeholder="Ingrese el numero 1" autofocus required>
                    </div>
                </div>

                <div class="col-auto">
                    <button type="button" onclick="agregar()" class="btn btn-primary mb-3">Agregar numero</button>
                    <button type="submit" class="btn btn-primary mb-3">Ejecutar</button>
                </div>
            </form>
        </div>
        <?php if(!empty($texto)): ?>
        <div class="col">
            <?=$texto?>
        </div>
        <?php endif; ?>
    </div>
</div>

<script src="../js/agregarInput.js"></script>

<?php
    require_once './estructura/footer.php';
?>