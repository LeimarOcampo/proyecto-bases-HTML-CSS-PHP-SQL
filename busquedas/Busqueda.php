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
            <a class="nav-link active" href="../Animales/Herbivoro.php">Herbivoro</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="../Animales/Carnivoro.php">Carnivoro</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../Patio/Patio.php">Patio de recreo</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../Membresias/Membresia.php">Membresia</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./Busqueda.php">Busquedas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./Consulta.php">Consultas</a>
        </li>
    </ul>
    <div class="container mt-3">
         <div class="col-5 px-2" style="float:left">
                    <div class="card">
                        <div class="card-header">
                            Inserte datos para la busqueda tipo 1
                        </div>
                        <div class="card-body">
                            <!--formulario para insertar una persona mediante el metodo post-->
                            <form action="busqueda1.php" class="form-group" method="post" target="_blank">
                                <div class="form-group">
                                    <label for="codAnimal">Codigo de carnivoro</label>
                                    <input type="text" name="codAnimal" id="codAnimal" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Codigo de membresia</label>
                                    <input type="text" name="codMembresia" id="codMembresia" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Buscar">
                                </div>
                            </form>
                        </div>
                    </div>
         </div>
        <div class="col-2" style="float:left"><br></div>
         <div class="col-5 px-2" style="float:left">
                    <div class="card">
                        <div class="card-header">
                            Inserte datos para la busqueda tipo 2
                        </div>
                        <div class="card-body">
                            <!--formulario para insertar una persona mediante el metodo post-->
                            <form action="busqueda2.php" class="form-group" method="post" target="_blank">
                                <div class="form-group">
                                    <label for="codAnimal">Codigo de herbivoro</label>
                                    <input type="text" name="codAnimal" id="codAnimal" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Fecha de inicio</label>
                                    <input type="date" name="fechaInicio" id="fechaInicio" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Fecha de finalización</label>
                                    <input type="date" name="fechaFinaliza" id="fechaFinaliza" class="form-control">
                                </div>    
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Buscar">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
    </div>
    
</body>

</html>