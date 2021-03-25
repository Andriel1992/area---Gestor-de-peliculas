<?php

    include 'helpers/utilities.php';
    include 'peliculas/servicesSession.php';
    include 'layout/layout.php';

    $peliculas = GetList();

?>

<?php echo printHeader(true)?>



        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md 2">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                    data-bs-target="#nueva-pelicula-modal">
                    Nueva pelicula
                </button>
            </div>
        </div>

        <div class="row ">

            <?php if(count($peliculas) == 0): ?>

                <h2>No hay Peliculas Registradas</h2>

            <?php else:?>

                <?php foreach ($peliculas as $pelicula): ?>
                    <div class="col-md-3">
                        <div class="card margin-top-3">

                            <div class="card-body">
                                <h5 class="card-title"><?= $pelicula['name']?></h5>
                                <p class="card-text"><?= $pelicula['descipccion']?></p>
                                <p class="card-text"><?= $pelicula['status']?></p>
                                <p class="card-text"><?= $pelicula['genero']?></p>
                            </div>

                            <div class="card-body">
                                <a href="peliculas/edit.php?id=<?= $pelicula['id']?>" class="btn btn-primary">Editar</a>
                                <a href="#" class="btn btn-danger">Eliminar</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
                
            <?php endif;?>
        </div>    
        
        <!-- Modal -->
 <div class="modal fade" id="nueva-pelicula-modal" tabindex="-1" aria-labelledby="nuevaPeliculaLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="nuevaPeliculaLabel">Registrar pelicula</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="peliculas/add.php" method="POST"> 
                        <div class="mb-3">
                            <label for="nombre-pelicula" class="form-label">Nombre:</label>
                            <input name="NombrePelicula" type="text" class="form-control" id="nombre-pelicula">
                        </div>
                        <div class="mb-3">
                            <label for="descripcion-pelicula" class="form-label">Descripcion:   </label>
                            <input name="DescripcionPelicula" type="text" class="form-control" id="descripcion-pelicula">
                        </div>
                        <div >
                            <label for="status-pelicula" class="form-label">Status:</label>
                        </div>
                        <div class="form-check">
                            <input name="StatusActiva" type="checkbox" class="form-check-input" id="activa">
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
                                    <option value="<?= $text ?>"><?= $text ?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>                        
                        </div>
                    
                    </form> 
                </div>
                
            </div>
        </div>
    </div>
        
<?php echo printFooter(true)?>   

 
        