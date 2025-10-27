<?php

    class CatalogoCine
    {
        var $contenido;

        function __construct()
        {
            $this->contenido = file_get_contents('https://tastedive.com/api/similar?type=movie&k=1061021-CATALOGO-75738F7F&q=el&info=1');
        }



        function mostrar()
        {
            return json_decode($this->contenido, true);
        }

        function __destroy()
        {

        }


    }



    $catalogo_cine = new CatalogoCine();

    echo '<pre>';
    var_dump($catalogo_cine->mostrar());




?>