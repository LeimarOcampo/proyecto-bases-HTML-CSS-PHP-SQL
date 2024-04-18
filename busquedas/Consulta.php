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
    <title>Baase de datos Zoologico Zoobomafufu</title>
    <!--CDN de boostraps: Libreria de estilos SCSS y CSS para darle unas buena apariencia a la aplicacion
    para mas informacion buscar documentacion de boostraps en: https://getbootstrap.com/docs/4.3/getting-started/introduction/ -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
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
    <div class="container mt-5">
        <div class="form-check">
            <p>Selecciona una de las consultas para ver el resultado</p>
            <form action="Consulta.php" class="form-group" method="post" target="_blank">
            <input type="radio" name="consulta" value="1" checked>Consulta 1<br><br>
            <input type="radio" name="consulta" value="2">Consulta 2<br><br>
            <input type="radio" name="consulta" value="3">Consulta 3<br><br>
            <input type="submit" class="btn btn-primary" value="Buscar">
            </form>
        </div>
    </div>
 <?php
if(isset($_POST['consulta'])){
    $consulta = $_POST['consulta'];
    if($consulta == 1){
        header('Location: ./consulta1.php');
    }
    else if($consulta == 2){
        header('Location: ./consulta2.php');
    }
    else if($consulta ==3){
        header('Location: ./consulta3.php');
    }
}