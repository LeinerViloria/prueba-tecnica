<?php
require_once './estructura/header.php';
require_once './funciones.php';

//Se define el rango, aqui seran constantes, ya que su valor no cambiará
define("desde", 1);
define("hasta", 100);

$texto = "";

for($i=desde; $i<=hasta; $i++){
    $palabra = palabra_segun_divisor(hasta, $i);
    if(!empty($palabra)){
        $texto.="<p>--> <strong>".$palabra."</strong></p>";
    }else{
        $texto.="<p>--> <strong>".$i."</strong></p>";
    }
}

?>


<div class="container">
    <div class="row">
        <div class="col">
            <p>
            Escriba un algoritmo que imprima los números del 1 al 100. Pero para los múltiplos
            de 3 imprima "Fizz" en lugar del número y para los múltiplos de 5 imprima "Buzz". Para los
            números que son múltiplos de ambos imprima "FizzBuzz".
            </p>
            <hr>
            <?=$texto?>
        </div>
    </div>        
</div>

<?php
require_once './estructura/footer.php';
?>