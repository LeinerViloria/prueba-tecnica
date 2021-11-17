<?php
    require_once './estructura/header.php';
?>

<div class="container">
    <div class="row">
        <div class="col">
            <h4>Teniendo la funcion:</h4>
            <hr>
            <p> <strong>funcion metodoQueHaceAlgo (Entero valor)</strong> </p>
            <p> <strong>si (valor < 3) entonces</strong> </p>
            <p> <strong>retornar valor;</strong> </p>
            <p> <strong>fin si</strong> </p>
            <p> <strong>retornar metodoQueHaceAlgo(valor-1)*metodoQueHaceAlgo(valor-1);</strong> </p>
            <p> <strong>fin funcion</strong> </p>
            <hr>
            <p>Y pasandole como argumento el <strong>5</strong></p>
            <p><em>El resultado es 8</em></p>
        </div>
    </div>
</div>

<?php
    require_once './estructura/footer.php';
?>