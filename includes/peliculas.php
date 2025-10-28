<?php

//    class CatalogoCine
//    {
//        var $contenido;

//         function __construct()
//         {
//             $this->contenido = file_get_contents('https://tastedive.com/api/similar?type=movie&k=1061021-CATALOGO-75738F7F&q=el&info=1');
//         }



//         function mostrar()
//         {
//             return json_decode($this->contenido, true);
//         }

//         function __destroy()
//         {

//         }


//     }



//     $catalogo_cine = new CatalogoCine();

//     // echo '<pre>';
//     // var_dump($catalogo_cine->mostrar());


//     // $datos_peliculas = $catalogo_cine->mostrar();

//     // $peliculas = $datos_peliculas["Similar"]["Results"];

//     // echo '<pre>';
//     // var_dump($peliculas);


//     $peliculas = $catalogo_cine->mostrar();



//     foreach($peliculas['similar']["results"] as $indice_pelicula => $datos_pelicula)
//     {
//         // echo '<pre>';
//         $id = $indice_pelicula;
//         $titulo = $datos_pelicula['name'];
//     }


$peliculas = [
    [
        "id" => 1,
        "titulo" => "El Señor de los Anillos",
        "director" => "Peter Jackson",
        "anio" => 2001,
        "genero" => "Ciencia Ficcion",
        "poster" => "portadas/el_señor_de_los_anillos.jpg"
    ],
    [
        "id" => 2,
        "titulo" => "Inception",
        "director" => "Christopher Nolan",
        "anio" => 2010,
        "genero" => "Ciencia Ficcion",
        "poster" => "portadas/inception.jpg"
    ],
    [
        "id" => 3,
        "titulo" => "Pulp Fiction",
        "director" => "Quentin Tarantino",
        "anio" => 1994,
        "genero" => "Crimen/Drama",
        "poster" => "portadas/pulp_fiction.jpg"
    ],
    [
        "id" => 4,
        "titulo" => "The Dark Knight",
        "director" => "Christopher Nolan",
        "anio" => 2008,
        "genero" => "Acción/Crimen",
        "poster" => "portadas/the_dark_knight.jpg"
    ],
    [
        "id" => 5,
        "titulo" => "Parasite",
        "director" => "Bong Joon-ho",
        "anio" => 2019,
        "genero" => "Drama/Suspenso",
        "poster" => "portadas/parasite.jpg"
    ],
    [
        "id" => 6,
        "titulo" => "La La Land",
        "director" => "Damien Chazelle",
        "anio" => 2016,
        "genero" => "Musical/Romance",
        "poster" => "portadas/lalaland.jpg"
    ]
];
?>