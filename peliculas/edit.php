<?php
    include '../layout/layout.php';
    include '../helpers/utilities.php';
    include 'servicesSession.php';

    $pelicula = null;

    if (isset($_GET["id"])) {
        
        $pelicula = GetById($_GET["id"]);

        if (isset($_POST["NombrePelicula"]) && isset($_POST["DescripcionPelicula"]) && isset($_POST["GeneroId"])) {

            $pelicula = ["id"=> $_GET["id"] ,"name" =>$_POST["NombrePelicula"],"descipccion" => $_POST["DescripcionPelicula"],"status" => $status,"genero" => $_POST["GeneroId"]];
            edit($pelicula);

            header("Location: ../index.php");
        }
    }

    

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editar</title>
</head>

<body>

    <?php echo printHeader()?>

    <?php if($pelicula == null || count($pelicula) == 0):?>

    <h2>No Existe Esta Pelicula</h2>

    <?php else:?>

        <form action="edit.php?id=<?= $pelicula["id"]?>" method="POST">
            <div class="mb-3">
                <label for="nombre-pelicula" class="form-label">Nombre:</label>
                <input name="NombrePelicula" value="<?php echo $pelicula["name"]?>" type="text" class="form-control" id="nombre-pelicula">
            </div>
            <div class="mb-3">
                <label for="descripcion-pelicula" class="form-label">Descripcion: </label>
                <input name="DescripcionPelicula" value="<?php echo $pelicula["descipccion"]?>" type="text" class="form-control" id="descripcion-pelicula">
            </div>
            <div>
                <label for="status-pelicula" class="form-label">Status:</label>
            </div>
            <div class="form-check">
                <input name="StatusActiva"  type="checkbox" class="form-check-input" id="activa">
                <label class="form-check-label" for="activa">Activa</label>
            </div>
            <div class="form-check">
                <input name="StatusInactiva" type="checkbox" class="form-check-input" id="inactiva">
                <label class="form-check-label" for="inactiva">Inactiva</label>
            </div>
            <div class="mb-3">
                <label class="form-label" for="inactiva">Genero:</label>
                <select name="GeneroId" id="genero-pelicula" class="form-select">
                    <option value="">Elija un Genero</option>
                    <?php foreach($genero as $value => $text): ?>

                        <?php if($text == $pelicula["genero"]):?>
                            
                            <option selected value="<?= $text ?>"><?= $text ?></option>
                        <?php else:?>
                            
                            <option value="<?= $text ?>"><?= $text ?></option>
                        <?php endif;?>

                        
                    <?php endforeach;?>
                </select>
            </div>

            
            <a href="../index.php" class="btn btn-secondary" >Atras</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
            

        </form>

    <?php endif;?>

    <?php echo printFooter()?>

</body>

</html>