<?php

$numero_encriptado = "";
$numero_original = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["numero_encriptado"])) {
        $numero_encriptado = $_POST["numero_encriptado"];

       
        $numero1 = ($numero_encriptado % 10 + 3) % 10;
        $numero2 = (($numero_encriptado / 10) % 10 + 3) % 10;
        $numero3 = (($numero_encriptado / 100) % 10 + 3) % 10;
        $numero4 = (($numero_encriptado / 1000) + 3) % 10;

        
        $numero_original = $numero2 * 1000 + $numero1 * 100 + $numero4 * 10 + $numero3;
    }
}

?>

<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="style.css">
<head>
    <title>Desencriptador</title>
</head>
<body>
    <h1>Desencriptador</h1>
    
    <h2> numero a desencriptar  porfavor </h2>
    <form action="desencriptar.php" method="post">
        <label for="numero_encriptado">Ingrese el número encriptado de cuatro dígitos:</label>
        <input type="text" id="numero_encriptado" name="numero_encriptado" value="<?php echo $numero_encriptado; ?>" required pattern="[0-9]{4}">
        <input type="submit" value="Desencriptar">
    </form>

    <?php if ($numero_original !== "") { ?>
        <h2>Número original desencriptado:</h2>
        <p><?php echo $numero_original; ?></p>
    <?php } ?>
</body>
</html>