<?php

$numero = "";
$numero_encriptado = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["numero"])) {
        $numero = $_POST["numero"];

       
        $numero1 = ($numero % 10 + 7) % 10;
        $numero2 = (($numero / 10) % 10 + 7) % 10;
        $numero3 = (($numero / 100) % 10 + 7) % 10;
        $numero4 = (($numero / 1000) % 10 + 7) % 10;

        $numero_encriptado = $numero2 * 1000 + $numero1 * 100 + $numero4 * 10 + $numero3;
    }
}

?>

<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="style.css">
<head>
    <title>Encriptador </title>
</head>
<body>
    <h1>Encriptador</h1>
    
    <h2>numero a Encriptar </h2>
    <form action="encriptar.php" method="post">
        <div>
        <label for="numero">Ingrese un número de cuatro dígitos:</label>
        </div>
        <input type="text" id="numero" name="numero" value="<?php echo $numero; ?>" required pattern="[0-9]{4}">
        <div>
        <input type="submit" value="Encriptar" id="boton">
        </div>
    </form>

    <?php if ($numero_encriptado !== "") { ?>
        <h2>Número ya encriptado:</h2>
        <p><?php echo $numero_encriptado; ?></p>
    <?php } ?>
</body>
</html>