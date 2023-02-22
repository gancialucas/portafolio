<?php 
        include("navbar.php"); 
        include("conexion_base.php");        
        
        if ($_POST) {
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descripcion'];

                // Bloque para subir archivos multimedia
                $fecha = new DateTime();
                $archivo = $fecha -> getTimestamp()."_".$_FILES['archivo']['name']; // Para diferenciar imagenes usamos un registro de la fecha
                $archivo_temporal =  $_FILES['archivo']['tmp_name'];
                move_uploaded_file($archivo_temporal, "assets/img/".$archivo);

                $obj_conexion = new conexion();
                $sql = "INSERT INTO `proyectos`(`id`, `nombre`, `archivo`, `descripcion`) VALUES ('[]', '$nombre','$archivo','$descripcion')";
                $obj_conexion->ejecutar($sql);

                header('location: portafolio.php');
        }

        if ($_GET) {
                $id = $_GET['borrar'];
                $obj_conexion = new conexion();
                
                $imagen = $obj_conexion->consultar("SELECT archivo FROM `proyectos` WHERE id=".$id); ;
                unlink("assets/img/".$imagen[0]['archivo']); // Función que permite el borrado a partir de url o ruta
                
                $sql = "DELETE FROM proyectos WHERE `proyectos`.`id` = " . $id;
                $obj_conexion->ejecutar($sql);
                
                header('location: portafolio.php');
        }

        $obj_conexion = new conexion();
        $proyectos = $obj_conexion->consultar("SELECT * FROM `proyectos`"); 
?>

        <section class="home">
            <div class="container">
                <div class="text-title">#. Sube tu proyecto</div>
                    <div class="card text-start">
                        <div class="card">
                            <div class="card-header">
                                #no sé - Datos del proyecto
                            </div>

                            <div class="card-body">
                                <form action="portafolio.php" method="post" enctype="multipart/form-data">
                                    <div class="form-outline m-2">
                                            <input required type="file" class="form-control" name="archivo">
                                    </div>        
                                    <div class="form-outline m-2">
                                            <input required type="text" class="form-control" name="nombre" placeholder="Nombre">
                                    </div>
                                    <div class="form-outline m-2">
                                            <input required type="text" class="form-control" name="descripcion">
                                    </div>
                                    <div class="form-outline m-2">
                                            <input type="submit" class="btn btn-secondary" value="Enviar proyecto">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>    
                    
                    <!-- MOSTRAR Y EDITAR PROYECTOS SUBIDOS -->
                    <br><div class="text-title">#. Crud</div>

                    <?php foreach ($proyectos as $proyecto) {?>
                        <div class="card text-start">
                            <div class="card">
                                <div class="card-header">
                                    #<?php echo $proyecto['id']; ?>. no sé
                                </div>

                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-6">
                                            <img width="100px" class="img-fluid mx-auto d-block" src="assets/img/<?php echo $proyecto['archivo']; ?>" alt="imagen_proyecto">
                                        </div>   

                                        <div class="col-6">
                                            <h1 class="card-title"><?php echo $proyecto['nombre']; ?></h1>
                                            <p class="card-text"><?php echo $proyecto['descripcion']; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a class="btn btn-danger" href="?borrar=<?php echo $proyecto['id']; ?>">Eliminar</a>
                                </div>
                            </div>
                        </div>
                    <?php }?>
            </div><br>      
        </section>

<?php include("footer.php");?>