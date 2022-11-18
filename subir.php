<!DOCTYPE html>
<?php
require 'idioma.php';

// Si hay post se sanea el nombre y se valida que el nombre no sea una cadena vacía
if ($_POST) {
    $nombre_saneado = htmlspecialchars(trim($_POST['nombre_fichero']));
    if ($nombre_saneado != "") {
        //Si fichero_usuario tiene algún valor, tiene tamaño mayor de 0 y se sube correctamente se asigna el fichero que solo puede ser gif, png, jpeg o pdf
        if (
            $_FILES && isset($_FILES['fichero_usuario']) &&
            $_FILES['fichero_usuario']['size'] > 0 &&
            $_FILES['fichero_usuario']['error'] == UPLOAD_ERR_OK
        ) {
            // Validación
            $fichero = $_FILES['fichero_usuario']['tmp_name'];

            $permitido = array('image/gif', 'image/png', 'image/jpeg', 'application/pdf');

            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime_fichero = finfo_file($finfo, $fichero);
            $nombre = $_FILES['fichero_usuario']['name'];
            $rutaFicheroDestino = './ficheros/'  . $nombre_saneado . "." . pathinfo($nombre, PATHINFO_EXTENSION);
            //Si no existe un fichero por lo que no está repetido, se mueve el fichero a la ruta /ficheros/
            if (!file_exists(($rutaFicheroDestino))) {
                $seHaSubido = move_uploaded_file($fichero, $rutaFicheroDestino);
            }
        }
    }
}
?>

<head>
    <meta charset="UTF-8">
    <title>Formulario</title>
    <link href="estilos.css" rel="stylesheet">
</head>

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
    <?php
    echo "<h1>" . getCadena('subida') . "</h1>";
    ?>
    <?php
    //Si no hay post, se muestra el formulario
    if (!$_POST) {
    ?>
        <form action="#" method="POST" enctype="multipart/form-data">
            <?php
            echo getCadena('nombredelfichero');
            ?>
            <input type="text" name="nombre_fichero">
            <br><br>
            <?php
            echo getCadena('seleccionarfichero');
            ?> <input type="text"><input type="file" name="fichero_usuario">
            <input type="submit" value="<?= getCadena('boton2'); ?>">
        </form>
        <hr>
        &copy; 2022 DWES, Inc.
        <?php
    }
    if ($_POST) {
        //Al final se muestra si se ha subido correctamente y un enlace al mismo fichero para subir otro fichero
        if ($seHaSubido) {
            echo "<p>Fichero " . $nombre_saneado . "." . pathinfo($nombre, PATHINFO_EXTENSION) . " subido correctamente</p>";
        ?>
            <a href="subir.php?idioma=<?= $idioma ?>"><?php
                                                        echo getCadena('enlace');
                                                        ?></a>
    <?php
        } else {
            echo "<p>No se ha subido el fichero</p>";
        }
        if (!in_array($mime_fichero, $permitido)) {
            echo "<p>Error: Los ficheros $mime_fichero no están permitidos</p>";
        }
    }
    ?>


    <!-- sanear con trim y htmlspecialchars, validación que no sea una cadena vacía -->
    <!-- utilizar file_exists para que no se sobreescriban ficheros -->
    <!-- indicar errores manteniendo el nombre -->
</body>

</html>