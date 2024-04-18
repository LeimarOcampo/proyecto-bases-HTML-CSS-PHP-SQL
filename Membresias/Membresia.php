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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!--CDN de forntawesome: Libreria de estilos SCSS y CSS incluir icononos y formas 
         para mas informacio : https://fontawesome.com/start-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
            integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    </head>
    
    <body>
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
                <a class="nav-link" href="../Patio/Patio.php">Patio de recreo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./Membresia.php">Membresia</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../busquedas/Busqueda.php">Busquedas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../busquedas/Consulta.php">Consultas</a>
            </li>
        </ul>
        <div class="container mt-3">
            <div class="row">
                <?php
                    if(isset($_GET["codMembresia"])){
                 ?>
                <div class="col-6 px-2">
                    <div class="card">
                        <div class="card-header">
                            Editar Membresia
                        </div>
                        <div class="card-body">
                            <!--formulario para insertar una persona mediante el metodo post-->
                            <form action="update_m.php" class="form-group" method="post">
                                <div class="form-group">
                                    <label for="codMembresia">Codigo de membresia</label>
                                    <input type="text" readonly name="codMembresia" value='<?=$_GET["codMembresia"];?>' id="codMembresia"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Color</label>
                                    <input type="text" name="color" value='<?=$_GET["color"];?>' id="color" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Fecha de compra</label>
                                    <input type="date" name="fechaCompra" value='<?=$_GET["fechaCompra"];?>' id="fechaCompra" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Guardar">
                                    <a href="Membresia.php" class="btn btn-danger">Descartar</a>
                                    
                                </div>
    
                            </form>
    
                        </div>
                    </div>
                </div>
                <?php
               }
            else{
                 ?>
                <div class="col-6 px-2">
                    <div class="card">
                        <div class="card-header">
                            Insertar Membresia
                        </div>
                        <div class="card-body">
                            <!--formulario para insertar una persona mediante el metodo post-->
                            <form action="insert_m.php" class="form-group" method="post">
                                <div class="form-group">
                                    <label for="codMembresia">Codigo Membresia</label>
                                    <input type="text" name="codMembresia" id="codMembresia" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Color</label>
                                    <input type="text" name="color" id="color" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Fecha de compra</label>
                                    <input type="date" name="fechaCompra" id="fechaCompra" class="form-control">
                                </div>    
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Insertar">
                                    <a href="Membresia.php" class="btn btn-success">Reiniciar</a>
                                </div>
                            </form>
    
                        </div>
                    </div>
                </div>
    
                <?php
            }
            ?>
                <div class="col-6 px-2">
    
                    <table class="table border-rounded">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Codigo Membresia</th>
                                <th scope="col">Color</th>
                                <th scope="col">Fecha de compra</th>
                                <th scope="col">Opciones</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            require('select_m.php');
                            if($result){
                                foreach ($result as $fila){
                            ?>
                            <tr>
                                <td><?=$fila['codMembresia'];?></td>
                                <td><?=$fila['color'];?></td>
                                <td><?=$fila['fechaCompra'];?></td>
                                <td>
    
                                    <form action="delete_m.php" method="POST">
                                        <input type="text" value=<?=$fila['codMembresia'];?> hidden>
                                        <input type="text" name="d" value=<?=$fila['codMembresia'];?> hidden>
                                        <button class="btn btn-danger" title="eliminar" type="submit"><i
                                                class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                                <td class="mx-0 pr-2">
                                    <form action="Membresia.php" method="GET">
                                     
                                        <input type="text" name="codMembresia" value=<?=$fila['codMembresia'];?> hidden>
                                        <input type="text" name="color" value='<?=$fila['color'];?>' hidden>
                                        <input type="text" name="fechaCompra" value='<?=$fila['fechaCompra'];?>' hidden>
    
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