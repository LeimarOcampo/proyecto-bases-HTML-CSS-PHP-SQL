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
        <title>Herbivoro</title>
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
        <!--Barra de navegacion-->
        <ul class="nav" style="box-shadow: 0 5px 5px rgba(0,0,0,0.4);">
            <li class="nav-item">
                <a class="nav-link active" href="../index.html">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="./Herbivoro.php">Herbivoro</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="./Carnivoro.php">Carnivoro</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../Patio/Patio.php">Patio de recreo</a>
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
        <div class="container mt-3">
            <div class="row">
                <?php
                    if(isset($_GET["codAnimal"])){
                 ?>
                <div class="col-6 px-2">
                    <div class="card">
                        <div class="card-header">
                            Editar Herbivoro
                        </div>
                        <div class="card-body">
                            <!--formulario para insertar una persona mediante el metodo post-->
                            <form action="update_h.php" class="form-group" method="post">
                                <div class="form-group">
                                    <label for="codAnimal">Codigo animal</label>
                                    <input type="text" readonly name="codAnimal" value='<?=$_GET["codAnimal"];?>' id="codAnimal"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Edad</label>
                                    <input type="text" name="edad" value='<?=$_GET["edad"];?>' id="edad" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Altura</label>
                                    <input type="text" name="altura" value='<?=$_GET["altura"];?>' id="altura" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Fruta Favorita</label>
                                    <input type="text" name="frutaFavorita" value='<?=$_GET["frutaFavorita"];?>' id="frutaFavorita" class="form-control">
                                </div>
    
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Guardar">
                                    <a href="Herbivoro.php" class="btn btn-danger">descartar</a>
                                    
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
                            Insertar Herbivoro
                        </div>
                        <div class="card-body">
                            <!--formulario para insertar una persona mediante el metodo post-->
                            <form action="insert_h.php" class="form-group" method="post">
                                <div class="form-group">
                                    <label for="codAnimal">Codigo Animal</label>
                                    <input type="text" name="codAnimal" id="codAnimal" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Edad</label>
                                    <input type="text" name="edad" id="edad" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Altura</label>
                                    <input type="text" name="altura" id="altura" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Fruta Favorita</label>
                                    <input type="text" name="frutaFavorita" id="frutaFavorita" class="form-control">
                                </div>
    
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Insertar">
                                    <a href="Herbivoro.php" class="btn btn-success">Reiniciar</a>
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
                                <th scope="col">Codigo Animal</th>
                                <th scope="col">Edad</th>
                                <th scope="col">Altura</th>
                                <th scope="col">Fruta Favorita</th>
                                <th scope="col">Opciones</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            require('select_h.php');
                            if($result){
                                foreach ($result as $fila){
                            ?>
                            <tr>
                                <td><?=$fila['codAnimal'];?></td>
                                <td><?=$fila['edad'];?></td>
    
                                <td><?=$fila['altura'];?></td>
    
                                <td><?=$fila['frutaFavorita'];?></td>
                                <td>
    
                                    <form action="delete_h.php" method="POST">
                                        <input type="text" value=<?=$fila['codAnimal'];?> hidden>
                                        <input type="text" name="d" value=<?=$fila['codAnimal'];?> hidden>
                                        <button class="btn btn-danger" title="eliminar" type="submit"><i
                                                class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                                <td class="mx-0 pr-2">
                                    <form action="Herbivoro.php" method="GET">
                                        
                                        <input type="text" name="codAnimal" value=<?=$fila['codAnimal'];?> hidden>
                                        <input type="text" name="edad" value='<?=$fila['edad'];?>' hidden>
                                        <input type="text" name="altura" value='<?=$fila['altura'];?>' hidden>
                                        <input type="text" name="frutaFavorita" value=<?=$fila['frutaFavorita'];?> hidden>
    
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
