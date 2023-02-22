<?php 
    include("navbar.php"); 
    include("conexion_base.php");
    
    $obj_conexion = new conexion();
    $proyectos = $obj_conexion->consultar("SELECT * FROM `proyectos`"); 
?>

        <section class="home">
                <div class="text-title">Bienvenido a tu portafolio</div>

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
                        </div>
                    </div><br>
                <?php }?>  
        </section>

<?php include("footer.php"); ?>