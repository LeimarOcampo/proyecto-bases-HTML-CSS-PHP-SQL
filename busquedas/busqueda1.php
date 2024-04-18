<html lang="en">
<head>
    <!--configuraciones basicas del html-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--titrulo de la pagina-->
    <title>BUSQUEDA1</title>
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
    <div class="col-12" style="margin-top: 30px">
        <p style="font-style: italic">Se imprimirán los patios de recreo reservados para el carnivoro ingresado y que son accedidos
        por la membresia ingresada</p>
    </div>
    <div class="col-6 px-2" style="margin-top: 30px">
        <table class="table border-rounded">
            <thead class="thead ">
                <tr>
                    <th scope="col">Nombre del patio</th>
                    <th scope="col">Fecha de ingreso</th>
                    <th scope="col">Codigo carnivoro</th>
                </tr>
            </thead>
            <tbody>
            <?php   
                    require('../configuraciones/conexion.php');
                    $codAnimal = $_POST['codAnimal'];
                    $codMembresia = $_POST['codMembresia'];
                    $nose = 'SELECT *
                            FROM carnivoro
                            WHERE' . "'" . $codAnimal . "'" . 'IN (SELECT codCarnivoro codAnimal
                            FROM patio_de_recreo, acceso
                            WHERE (patio_de_recreo.nombre = acceso.nombrePatio) AND codMembresia = ' . $codMembresia . ');';
                    $animal = 'SELECT nombre FROM carnivoro WHERE codAnimal = ' . "'" . $codAnimal . "'" . ';';
                    $membresia = 'SELECT color FROM membresia WHERE codMembresia = ' . $codMembresia . ';';
                    $comprobacionM = mysqli_query($conn, $membresia) or die(mysqli_error($conn));
                    $comprobacionA = mysqli_query($conn, $animal) or die (mysqli_error($conn));
                    $comprobacionAM = mysqli_query($conn, $nose) or die (mysqli_error($conn));
                    if(mysqli_num_rows($comprobacionA) == 0){
                        $message = "El carnivoro ingresado no existe";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                    }
                    else if(mysqli_num_rows($comprobacionM) == 0){
                        $message = "La membresia ingresada no existe";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                    }
                    else if(mysqli_num_rows($comprobacionAM) == 0){
                        $message = "No tiene patio reservado";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                    }
                    else{
                        $query = 'SELECT nombre, fechaIngreso,codHerbivoro, codCarnivoro
                                  FROM (SELECT*
                                  FROM patio_de_recreo, acceso
                                  WHERE (patio_de_recreo.nombre = acceso.nombrePatio) AND codMembresia = ' . $codMembresia . ') AS nuevoPatio
                                  WHERE nuevoPatio.codCarnivoro = ' . "'" . $codAnimal . "'" . ';';
                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                    if($result){
                        foreach($result as $fila){
                        ?>
                            <tr>
                                <td><?=$fila['nombre'];?></td>
                                <td><?=$fila['fechaIngreso'];?></td>
                                <td><?=$fila['codCarnivoro'];?></td>
                            </tr>
                        <?php
                        }
                    }
                    else{
                        echo "Ha ocurrido un error al buscar la información";
                    }
                    }
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>