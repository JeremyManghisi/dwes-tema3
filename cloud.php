<!DOCTYPE html>
<?php
require 'idioma.php';
$ficheros = scandir('./ficheros');
$ficherosPdf = [];
$ficherosImg = [];
?>

<head>
    <meta charset="UTF-8">
    <title>Ficheros</title>
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
    //Se hace una lista y se recorren los ficheros con extensión pdf y se muestran como una lista
    echo "<h1>" . getCadena('ficheros') . "</h1>";
    echo "<ul>";
        if ($ficheros !== false) {
            foreach ($ficheros as $fic) {
                if (pathinfo($fic, PATHINFO_EXTENSION) == 'pdf') {
                    $ficherosPdf[] = "$fic";
                }
            }   
        }
            foreach ($ficherosPdf as $fic){
                $rutaFicheroDestino = './ficheros/'  . $fic;
                echo "<li><a href='$rutaFicheroDestino' download>$fic</a></li>";
            }
            echo "</ul>";
            if ($ficherosPdf == null){
                echo getCadena('noficheros');
            }
        ?>
    <br>
    <br>
    <?php
    //Se recorren los ficheros png, jpeg y gif y se muestran como img (no me funciona pero es lo que debería hacer)
    echo "<h1>" . getCadena('imagenes') . "</h1>";
    if ($ficheros !== false) {
        foreach ($ficheros as $fic) {
            if (pathinfo($fic, PATHINFO_EXTENSION) == 'png' || pathinfo($fic, PATHINFO_EXTENSION) == 'jpeg' || pathinfo($fic, PATHINFO_EXTENSION) == 'gif') {
                $ficherosImg[] = "$fic";
            }
        }   
    }
        foreach ($ficherosImg as $fic){
            $rutaFicheroDestino = './ficheros/'  . $fic;
            echo "<img src='$rutaFicheroDestino' width='20%'>";
            echo "<br>";
        }
        if ($ficherosImg == null){
            echo getCadena('noimagenes');
        }
    ?> 
</body>
</html>