<?php

$idioma = 'es';

if ($_GET && isset($_GET['idioma'])) {
    $idioma = in_array($_GET['idioma'], ['es', 'en']) ? $_GET['idioma'] : 'es';
}

$cadenas = [
    'bienvenida' => [
        'es' => 'Bienvenid@ a MiniMyCloud',
        'en' => 'Welcome to MiniMyCloud'
    ],
    'subida' => [
        'es' => 'Sube ficheros PDF o imágenes GIF, PNG y JPEG',
        'en' => 'Upload PDF files or GIF, PNG and JPEG images'
    ],
    'ficheros' => [
        'es' => 'Tus ficheros',
        'en' => 'Your files'
    ],
    'imagenes' => [
        'es' => 'Tus imágenes',
        'en' => 'Your images'
    ],
    'administrar' => [
        'es' => 'Desde aqui puedes administrar tus ficheros',
        'en' => 'From here you can manage your files'
    ],
    'nombredelfichero' => [
        'es' => 'Nombre del fichero: ',
        'en' => 'File name: '
    ],
    'seleccionarfichero' => [
        'es' => 'Selecciona un fichero: ',
        'en' => 'Choose a file: '
    ],
    'boton' => [
        'es' => 'Empieza a subir tus ficheros',
        'en' => 'Upload your files'
    ],
    'boton2' => [
        'es' => 'Subir fichero',
        'en' => 'Upload file'
    ],
    'enlace' => [
        'es' => 'Subir otro fichero',
        'en' => 'Upload another file'
    ],
    'noficheros' => [
        'es' => 'No se encuentra ningún fichero pdf subido.',
        'en' => 'There is not uploaded any pdf file.'
    ],
    'noimagenes' => [
        'es' => 'No se encuentra ninguna imagen subida.',
        'en' => 'There is not uploaded any image.'
    ]
];

function getCadena(string $id): string
{
    global $idioma, $cadenas;

    if (isset($cadenas[$id])) {
        return $cadenas[$id][$idioma];
    } else {
        return "Error interno: la cadena identificada con $id no existe";
    }
}