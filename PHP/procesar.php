<?php
function esPrimo($numero) {
    if ($numero <= 1) {
        return false;
    }
    for ($i = 2; $i <= sqrt($numero); $i++) {
        if ($numero % $i == 0) {
            return false;
        }
    }
    return true;
}

function numerosPrimosMenoresQue($limite) {
    $numeros_primos = array();
    for ($i = 2; $i < $limite; $i++) {
        if (esPrimo($i)) {
            $numeros_primos[] = $i;
        }
    }
    return $numeros_primos;
}

// Verificar si se ha enviado un número
if(isset($_POST['numero'])) {
    // Obtener el número enviado por el formulario
    $numero = intval($_POST['numero']);

    // Obtener y mostrar los números primos menores que el número ingresado
    echo "Los números primos menores que $numero son: ";
    $primos = numerosPrimosMenoresQue($numero);
    echo implode(", ", $primos);
} else {
    echo "No se recibió ningún número.";
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="stylesheet" href="../CSS/cssseccion4.css">
</head>
<body>
    <form action="procesar.php" method="post">
        <label for="numero">Ingrese un número:</label>
        <input type="number" id="numero" name="numero">
        <button type="submit">Enviar</button>
        

    
    </form>
</body>
</html>


