<?php include 'templates/header.php' ?>

<?php

   include_once "models/conexion.php";
  $sentencia = $bd -> query("select * from persona");
  $persona = $sentencia->fetchAll(PDO::FETCH_OBJ);
   

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <!--Inicio alerta-->
                <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){

                

                ?>
                <div class="alert alert-danger|secondary|success|info|warning|danger|light|dark alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                
                    <strong>Error:</strong>Rellena todos los campos.
                </div>
                <?php
                  }

                ?>

                <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){

                ?>
                <div class="alert alert-primary|secondary|success|info|warning|danger|light|dark alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                
                    <strong>Registrado:</strong>Se agregaron los datos.
                </div>
                <?php
                  }

                ?>

                <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){

                ?>
                <div class="alert alert-danger|secondary|success|info|warning|danger|light|dark alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                
                    <strong>Error:</strong>Vuelve a intentarlo.
                </div>
                <?php
                  }

                ?>
                <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){

                ?>
                <div class="alert alert-primary|secondary|success|info|warning|danger|light|dark alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                
                    <strong>Cambiado:</strong>Los datos fueron actualizados.
                </div>
                <?php
                  }

                ?>

                <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){

                ?>
                <div class="alert alert-primary|secondary|success|info|warning|danger|light|dark alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                
                    <strong>Eliminado:</strong>Los datos fueron eliminados.
                </div>
                <?php
                  }

                ?>
      
                <!-- Fin alerta-->
                <div class="card-header">
                    Lista de personas
                </div>
                <div class="p-4">
                    <table class="table">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Edad</th>
                                    <th scope="col">Signo</th>
                                    <th scope="col" colspan="2">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                 foreach($persona as $dato){

                                 

                                ?>
                                <tr>
                                    <td scope="row ="1"><?php echo $dato->codigo; ?></td>
                                    <td><?php echo $dato->nombre; ?></td>
                                    <td><?php echo $dato->edad; ?></td>
                                    <td><?php echo $dato->signo; ?></td>
                                    <td><a href ="editar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                    <td><a  onclick = "return confirm('Estas seguro de eliminar');" href ="eliminar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-trash"></i></a></td>
                                </tr>
                                <?php
                                

                                     }

                                ?>


                            
                                
                            </tbody>
                        </table>
                        
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ingresar Datos
                </div>
                <form  class="p-4" method="post" action="registar.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Edad: </label>
                        <input type="number" class="form-control" name="txtEdad" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Signo: </label>
                        <input type="text" class="form-control" name="txtSigno" autofocus required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                
                </form>
            </div>

        </div>
  </div>
</div>


<?php include 'templates/footer.php' ?>

  