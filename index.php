<!DOCTYPE html>

<?php
require 'idioma.php';
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>MiniMyCloud</title>
    <link href="estilos.css" rel="stylesheet">
</head>
<!-- Página inicial -->
<body>
    <nav>
        <ul>
            <li> MiniMyCloud </li>
            <li><a href="index.php?idioma=<?= $idioma ?>">Home</a></li>
            <li><a href="subir.php?idioma=<?= $idioma ?>">Subir</a></li>
            <li><a href="cloud.php?idioma=<?= $idioma ?>">Ficheros</a></li>
            <li>
                <form action="#" method="get" id="form">
                    <p>
                        <select name="idioma" id="select">
                            <option value="es" <?php if ($idioma == 'es') {
                                                    echo 'selected';
                                                } ?>>Español</option>
                            <option value="en" <?php if ($idioma == 'en') {
                                                    echo 'selected';
                                                } ?>>English</option>
                        </select>
                    </p>
            </li>
            <li>
                <input type="submit" value="Ok" id="ok">
            </li>
            </form>
        </ul>
    </nav>
    <main>
    <div id="fondo">
        <?php
        echo "<h1>" . getCadena('bienvenida') . "</h1>";
        echo getCadena('administrar');
        ?>
        <br>
        <br>
        <form action="subir.php">
            <input type="submit" value="<?= getCadena('boton'); ?>" id="blue">
        </form>
        <br>
        <br>
        <hr>
    </div>
    &copy; 2022 DWES, Inc.
</body>

</html>