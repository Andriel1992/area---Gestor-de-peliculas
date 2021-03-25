<?php

include 'servicesSession.php';
include '../helpers/utilities.php';

    if (isset($_POST["NombrePelicula"]) && isset($_POST["DescripcionPelicula"]) && isset($_POST["GeneroId"])) {
       
        $status = "Activa";

        if (isset($_POST["StatusActiva"])) {
            $status = "Activa";
        }
        if (isset($_POST["StatusInactiva"])) {
            $status =  "Inactiva";
        }

        $pelicula = ["name" =>$_POST["NombrePelicula"],"descipccion" => $_POST["DescripcionPelicula"],"status" => $status,"genero" => $_POST["GeneroId"]];
        add($pelicula);

        header("Location: ../index.php");
    }


?>