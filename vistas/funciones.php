<?php

function dividir(int $numerador, int $denominador){    
    if($denominador!=0){
        return $numerador/$denominador;
    }else{
        return null;
    }
}

function divisores($numero){
    $divisores = array();

    for($i=($numero-1); $i>0; $i--){
        if($numero%$i==0){
            $divisores[count($divisores)]=$i;
        }
    }    

    return $divisores;
}

function sumarDivisores(Array $divisores){
    $suma = 0; 

    foreach($divisores as $divisor){
        $suma+=$divisor;
    }

    return $suma;
}

function numeroPerfecto($numero, $suma){       

    if($suma==$numero){
        return true;
    }else{
        return false;
    }

}

function multiplos($numeroTabla, $numero_a_buscar, $limite){
    /**
     * $numeroTabla es la tabla que se va a tener en cuenta para
     * multiplicar, en este caso seria la tabla del 3 y del 5
     * 
     * $numero_a_buscar es el numero que venga del bucle
     * 
     * $limite es hasta dónde va a buscar, en este caso, si se
     * sabe que hay un limite, no habria por qué buscar en un rango superior
     */
    $captura=false;

    for($i=1; $i<=$limite; $i++){
        $multiplicacion=$numeroTabla*$i;
        if($multiplicacion==$numero_a_buscar){
            $captura=true;
            break;
        }
    }

    return $captura;


}

function palabra_segun_divisor($limite_superior_Rango, $numero){    
    $palabras = array("Fizz", "Buzz");
    $palabra = "";

    $multiplo = multiplos(3, $numero, ($limite_superior_Rango/3));

    if($multiplo){
        $palabra.=$palabras[0];
    }

    $multiplo = multiplos(5, $numero, ($limite_superior_Rango/5));

    if($multiplo){
        $palabra.=$palabras[1];
    }
    
    return $palabra;

}