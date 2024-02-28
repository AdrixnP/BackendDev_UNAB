<?php
session_start();

if (!isset($_SESSION['contador'])) {
    $_SESSION['contador'] = 0;
    $_SESSION['sumaedad'] = 0;
    $_SESSION['edadanterior'] = 999;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputedad = (int)$_POST["inputedad"];
    
    if ($inputedad != 0) {
        if ($inputedad >= 18) {
            $_SESSION['contador']++;
            $_SESSION['sumaedad'] += $inputedad;

            if ($inputedad < $_SESSION['edadanterior']) {
                $_SESSION['edadanterior'] = $inputedad;
            }
        }
    } else {
        $_SESSION['contador'] = 0;
        $_SESSION['sumaedad'] = 0;
        $_SESSION['edadanterior'] = 999;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
    <link rel="stylesheet" href="../CSS/styles.css">
</head>
<body>
    <h1>FIESTA EN BUCARAMANGA</h1>

    <div class="resultados">
        <p><span class="resaltado">Total personas:</span> <?php echo $_SESSION['contador']; ?></p>
        <p><span class="resaltado">Promedio de edad:</span> <?php echo ($_SESSION['contador'] > 0) ? ($_SESSION['sumaedad'] / $_SESSION['contador']) : 0; ?></p>
        <p><span class="resaltado">Edad menor:</span> <?php echo ($_SESSION['contador'] > 0) ? $_SESSION['edadanterior'] : 0; ?></p>
    </div>
    <h4 class="ti1">Ingresa la edad de la persona (0 para terminar):</h4>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Edad: <input type="number" name="inputedad" min="0"><br><br>
        <input type="submit" value="Enviar">
    </form>

</body>
</html>
