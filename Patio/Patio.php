<!-- En esta pagina puede encontrar mas informacion acerca de la estructura de un documento html 
    http://www.iuma.ulpgc.es/users/jmiranda/docencia/Tutorial_HTML/estruct.htm-->
    <!DOCTYPE html>
    <html lang="en">
    <!--cabezera del html -->
    
    <head>
        <!--configuraciones basicas del html-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!--titrulo de la pagina-->
        <title>inicio</title>
        <!--CDN de boostraps: Libreria de estilos SCSS y CSS para darle unas buena apariencia a la aplicacion
        para mas informacion buscar documentacion de boostraps en: https://getbootstrap.com/docs/4.3/getting-started/introduction/ -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
            crossorigin="anonymous">
        <!--CDN de forntawesome: Libreria de estilos SCSS y CSS incluir icononos y formas 
         para mas informacio : https://fontawesome.com/start-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
            crossorigin="anonymous">
    </head>
    
    <body>
        <!--Barra de navegacion-->
        <ul class="nav" style="box-shadow: 0 5px 5px rgba(0,0,0,0.4);">
            <li class="nav-item">
                <a class="nav-link active" href="../index.html">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="../Animales/Herbivoro.php">Herbivoro</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="../Animales/Carnivoro.php">Carnivoro</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./Patio.php">Patio de recreo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../Membresias/Membresia.php">Membresia</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../busquedas/Busqueda.php">Busquedas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../busquedas/Consulta.php">Consultas</a>
            </li>
        </ul>  
        <?php
                    if(isset($_GET["nombre"])){
        ?>
                <div class="container mt-3">
        <div class="row">
            <div class="col-5 px-2">
                <div class="card">
                    <div class="card-header">
                        Editar patio de recreo
                    </div>
                    <div class="card-body">
                        <!--formulario para insertar una persona mediante el metodo post-->
                        <form action="update_p.php" class="form-group" method="post">
                            <div class="form-group">
                                <label for="nombre">Nombre del patio</label>
                                <input type="text" readonly name="nombre" value='<?=$_GET["nombre"];?>' id="nombre"
                                        class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Fecha de Ingreso</label>
                                <input type="date" name="fechaIngreso" value='<?=$_GET["fechaIngreso"];?>' id="fechaIngreso" class="form-control"">
                            </div>
                            <div class="form-group">
                                <label for="">Animal</label>
                                <div class="form-check">
                                    <input class="form-check-input" onclick="cambioAnimal(this);" type="radio" name="exampleRadios2" id="exampleRadios2"
                                        value="herbivoro" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Herbivoro
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input"  onclick="cambioAnimal(this);" type="radio" name="exampleRadios2" id="exampleRadios2"
                                        value="carnivoro">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Carnivoro
                                    </label>
                                </div>
                            </div>
                            <div id="selectCarnivoros" class="form-group">
                                <label for="exampleFormControlSelect2">Carnivoros</label>
                                <select name="codAnimal" id="codAnimal" multiple class="form-control" id="exampleFormControlSelect2">
                                    <?php
                                    require('select_c.php');
                                    if($resultC){
                                        foreach ($resultC as $fila){
                                    ?>
                                            <option value=<?=$fila['codAnimal'];?>  ><b>Codigo Animal :</b> <?=$fila['codAnimal'];?><b> con Nombre: </b><?=$fila['nombre'];?></option>
                                    <?php
                                        }
                                    }
                                    else{
                                        echo "no hay carnivoros";
                                    }
                        
                                    ?>    
                                      
                                </select>
                            </div>
                            <div id="selectHerbivoros"  class="form-group">
                                <label for="exampleFormControlSelect2">Herbivoros</label>
                                <select name="codAnimal" id="codAnimal"  multiple class="form-control" id="exampleFormControlSelect2">
                                    <?php
                                    require('select_h.php');
                                    if($resultH){
                                        foreach ($resultH as $fila){
                                    ?>
                                            <option value=<?=$fila['codAnimal'];?>  ><b>Codigo Animal :</b> <?=$fila['codAnimal'];?><b> con Edad: </b><?=$fila['edad'];?></option>
                                    <?php
                                        }
                                    }
                                    else{
                                        echo "no hay herbivoros";
                                    }
                        
                                    ?>    
                                      
                                </select>
                            </div>
                            
                            <!--librerias para usar jquery-->
                            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
                             <!--controlador de los tipo radio-->
                            <script>
                                $("#selectCarnivoros").hide();
                                function cambioAnimal(myRadio) {
                                    
                                    
                                    if(myRadio.value==="carnivoro"){
                                       
                                        $("#selectCarnivoros").show();
                                        $("#selectHerbivoros").hide();
                                    }
                                    if(myRadio.value==="herbivoro"){
                                        $("#selectCarnivoros").hide();
                                        $("#selectHerbivoros").show();
                                    }
                                    $("#codAnimal").val('');
                                }
                            </script>
                          
                           
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Insertar">
                                <a href="Patio.php" class="btn btn-success">Reiniciar</a>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        
        <?php
               }
            else{
                 ?>
        <div class="container mt-3">
        <div class="row">
            <div class="col-5 px-2">
                <div class="card">
                    <div class="card-header">
                        Insertar Patio De Recreo
                    </div>
                    <div class="card-body">
                        <!--formulario para insertar una persona mediante el metodo post-->
                        <form action="insert_p.php" class="form-group" method="post">
                            <div class="form-group">
                                <label for="nombre">Nombre del patio</label>
                                <input type="text" name="nombre" id="nombre" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Fecha de Ingreso</label>
                                <input type="date" name="fechaIngreso" id="fechaIngreso" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Animal</label>
                                <div class="form-check">
                                    <input class="form-check-input" onclick="cambioAnimal(this);" type="radio" name="exampleRadios2" id="exampleRadios2"
                                        value="herbivoro" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Herbivoro
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input"  onclick="cambioAnimal(this);" type="radio" name="exampleRadios2" id="exampleRadios2"
                                        value="carnivoro">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Carnivoro
                                    </label>
                                </div>
                            </div>
                            <div id="selectCarnivoros" class="form-group">
                                <label for="exampleFormControlSelect2">Carnivoros</label>
                                <select name="codAnimal" id="codAnimal" multiple class="form-control" id="exampleFormControlSelect2">
                                    <?php
                                    require('select_c.php');
                                    if($resultC){
                                        foreach ($resultC as $fila){
                                    ?>
                                            <option value=<?=$fila['codAnimal'];?>  ><b>Codigo Animal :</b> <?=$fila['codAnimal'];?><b> con Nombre: </b><?=$fila['nombre'];?></option>
                                    <?php
                                        }
                                    }
                                    else{
                                        echo "no hay carnivoros";
                                    }
                        
                                    ?>    
                                      
                                </select>
                            </div>
                            <div id="selectHerbivoros"  class="form-group">
                                <label for="exampleFormControlSelect2">Herbivoros</label>
                                <select name="codAnimal" id="codAnimal"  multiple class="form-control" id="exampleFormControlSelect2">
                                    <?php
                                    require('select_h.php');
                                    if($resultH){
                                        foreach ($resultH as $fila){
                                    ?>
                                            <option value=<?=$fila['codAnimal'];?>  ><b>Codigo Animal :</b> <?=$fila['codAnimal'];?><b> con Edad: </b><?=$fila['edad'];?></option>
                                    <?php
                                        }
                                    }
                                    else{
                                        echo "no hay herbivoros";
                                    }
                        
                                    ?>    
                                      
                                </select>
                            </div>
                            
                            <!--librerias para usar jquery-->
                            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
                             <!--controlador de los tipo radio-->
                            <script>
                                $("#selectCarnivoros").hide();
                                function cambioAnimal(myRadio) {
                                    
                                    
                                    if(myRadio.value==="carnivoro"){
                                       
                                        $("#selectCarnivoros").show();
                                        $("#selectHerbivoros").hide();
                                    }
                                    if(myRadio.value==="herbivoro"){
                                        $("#selectCarnivoros").hide();
                                        $("#selectHerbivoros").show();
                                    }
                                    $("#codAnimal").val('');
                                }
                            </script>
                          
                           
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Insertar">
                                <a href="Patio.php" class="btn btn-success">Reiniciar</a>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
            <?php
            }
            ?>
                            <div class="col-7 px-2">
    
                    <table class="table border-rounded">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Nombre Patio</th>
                                <th scope="col">Fecha Ingreso</th>
                                <th scope="col">Codigo Herbivoro</th>
                                <th scope="col">Codigo Carnivoro</th>
                                <th scope="col">Opciones</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            require('select_p.php');
                            if($result){
                                foreach ($result as $fila){
                            ?>
                            <tr>
                                <td><?=$fila['nombre'];?></td>
                                <td><?=$fila['fechaIngreso'];?></td>
    
                                <td><?=$fila['codHerbivoro'];?></td>
    
                                <td><?=$fila['codCarnivoro'];?></td>
                                <td>
    
                                    <form action="delete_p.php" method="POST">
                                        <input type="text" value=<?=$fila['nombre'];?> hidden>
                                        <input type="text" name="d" value=<?=$fila['nombre'];?> hidden>
                                        <button class="btn btn-danger" title="eliminar" type="submit"><i
                                                class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                                <td class="mx-0 pr-2">
                                    <form action="Patio.php" method="GET">
                                        
                                        <input type="text" name="nombre" value='<?=$fila['nombre'];?>' hidden>
                                        <input type="text" name="fechaIngreso" value='<?=$fila['fechaIngreso'];?>' hidden>
                                        <input type="text" name="codHerbivoro" value='<?=$fila['codHerbivoro'];?>' hidden>
                                        <input type="text" name="codCarnivoro" value='<?=$fila['codCarnivoro'];?>' hidden>
    
                                        <button class="btn btn-primary" title="editar" type="submit"><i
                                                class="far fa-edit"></i></button>
                                    </form>
                                </td>
    
                                
    
                            </tr>
                            <?php                    
    
                                    }
                                }
                                
                                ?>
                        </tbody>
                    </table>
    
                </div>
        </div>
            <div class="container mt-3"><br></div>
            <div class="container mt-3">
            <div class="row">
                <?php
                    if(isset($_GET["codMembresia"]) && isset($_GET['nombrePatio'])){
                 ?>
                <div class="col-5 px-2">
                    <div class="card">
                        <div class="card-header">
                            Editar Acceso
                        </div>
                        <div class="card-body">
                            <!--formulario para insertar una persona mediante el metodo post-->
                            <form action="update_acc.php" class="form-group" method="post">
                                <div class="form-group">
                                    <label for="fechaUltimoIngreso">Fecha de Ultimo Ingreso</label>
                                    <input type="date" name="fechaUltimoIngreso" id="fechaUltimoIngreso" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Nombre del Patio</label>
                                    <input type="text" name="nombrePatio" readonly name="nombrePatio" value='<?=$_GET["nombrePatio"];?>' id="nombrePatio" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Codigo de Membresia</label>
                                    <input type="text" name="codMembresia" readonly name="codMembresia" value='<?=$_GET["codMembresia"];?>' id="codMembresia" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="cantVisitas">Cantidad de visitas</label>
                                    <input type="text" name="cantVisitas" id="cantVisitas" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Guardar">
                                    <a href="Patio.php" class="btn btn-danger">Descartar</a> 
                                </div>
    
                            </form>
    
                        </div>
                    </div>
                </div>
                <?php
               }
            else{
                 ?>
                <div class="col-5 px-2">
                    <div class="card">
                        <div class="card-header">
                            Insertar Acceso
                        </div>
                        <div class="card-body">
                            <!--formulario para insertar una persona mediante el metodo post-->
                            <form action="insert_acc.php" class="form-group" method="post">
                                <div class="form-group">
                                    <label for="fechaUltimoIngreso">Fecha de Ultimo Ingreso</label>
                                    <input type="date" name="fechaUltimoIngreso" id="fechaUltimoIngreso" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="codMembresia">Codigo Membresia</label>
                                    <input type="text" name="codMembresia" id="codMembresia" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Nombre del Patio</label>
                                    <input type="text" name="nombrePatio" id="nombrePatio" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Cantidad de visitas</label>
                                    <input type="text" name="cantVisitas" id="cantVisitas" class="form-control">
                                </div>    
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Insertar">
                                    <a href="Patio.php" class="btn btn-success">Reiniciar</a>
                                </div>
                            </form>
    
                        </div>
                    </div>
                </div>
    
                <?php
            }
            ?>
                <div class="col-7 px-2">
    
                    <table class="table border-rounded">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Fecha Ultimo Ingreso</th>
                                <th scope="col">Codigo Membresia</th>
                                <th scope="col">Patio</th>
                                <th scope="col">Cantidad Visitas</th>
                                <th scope="col">Opciones</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            require('select_acc.php');
                            if($result){
                                foreach ($result as $fila){
                            ?>
                            <tr>
                                <td><?=$fila['fechaUltimoIngreso'];?></td>
                                <td><?=$fila['codMembresia'];?></td>
                                <td><?=$fila['nombrePatio'];?></td>
                                <td><?=$fila['cantVisitas'];?></td>
                                <td>
    
                                    <form action="delete_acc.php" method="POST">
                                        <input type="text" value=<?=$fila['codMembresia'];?> hidden>
                                        <input type="text" value=<?=$fila['nombrePatio'];?> hidden>
                                        <input type="text" name="m" value=<?=$fila['codMembresia'];?> hidden>
                                        <input type="text" name="n" value=<?=$fila['nombrePatio'];?> hidden>
                                        <button class="btn btn-danger" title="eliminar" type="submit"><i
                                                class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                                <td class="mx-0 pr-2">
                                    <form action="Patio.php" method="GET">
                                     
                                        <input type="date" name="fechaUltimoIngreso" value=<?=$fila['fechaUltimoIngreso'];?> hidden>
                                        <input type="text" name="codMembresia" value='<?=$fila['codMembresia'];?>' hidden>
                                        <input type="text" name="nombrePatio" value='<?=$fila['nombrePatio'];?>' hidden>
                                        <input type="text" name="cantVisitas" value='<?=$fila['cantVisitas'];?>' hidden>
                                        <button class="btn btn-primary" title="editar" type="submit"><i
                                                class="far fa-edit"></i></button>
                                    </form>
                                </td>
    
    
    
                            </tr>
                            <?php                    
    
                                    }
                                }
                                
                                ?>
                        </tbody>
                    </table>
    
                </div>
            </div>
    
    
        </div>
        
    </body>
    </html>
