<html lang="en">
<head>
    <!--configuraciones basicas del html-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--titrulo de la pagina-->
    <title>BUSQUEDA2</title>
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
        <p style="font-style: italic">Se imprimirán la cantidad de visitas de cada membresia que visita los patios reservados para el herbivoro ingresado</p>
    </div>
    <div class="col-6 px-2" style="margin-top: 30px">
        <table class="table border-rounded">
            <thead class="thead ">
                <tr>
                    <th scope="col">Codigo de membresia</th>
                    <th scope="col">Cantidad de visitas</th>
                </tr>
            </thead>
            <tbody>
            <?php
                    require('../configuraciones/conexion.php');
                    $codAnimal = $_POST['codAnimal'];
                    $fechaInicio = $_POST['fechaInicio'];
                    $fechaFinaliza = $_POST['fechaFinaliza'];
                    $codHerbivoro = 'SELECT edad FROM herbivoro WHERE codAnimal =' . "'" . $codAnimal . "';";
                    $comprobacionH = mysqli_query($conn, $codHerbivoro) or die(mysqli_error($conn));
                    $comprobacionFecha = 'SELECT edad
                                          FROM herbivoro
                                          WHERE' . " '" . $codAnimal . "' " . 'IN (SELECT codHerbivoro codAnimal
                                          FROM patio_de_recreo
                                          WHERE fechaIngreso BETWEEN' . " '" . $fechaInicio . "' " . 'AND' . " '" . $fechaFinaliza . "');";
                    $recomprobacionFecha = mysqli_query($conn, $comprobacionFecha) or die(mysqli_error($conn));
                    if(mysqli_num_rows($comprobacionH) == 0){
                        $message = "El herbivoro ingresado no existe";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                    }
                    else if(mysqli_num_rows($recomprobacionFecha) == 0){
                        $message = "No tiene patios reservados entre las dos fechas";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                    }
                    else{
                        $query = 'SELECT codMembresia, SUM(cantVisitas) AS unidades
                                  FROM (SELECT*
                                  FROM patio_de_recreo, acceso
                                  WHERE patio_de_recreo.nombre = acceso.nombrePatio) AS patioNuevo
                                  WHERE (' . "'" . $codAnimal . "'" . '= patioNuevo.codHerbivoro) AND fechaIngreso BETWEEN' . " '" . $fechaInicio . "' " . 
                                  'AND' . " '" . $fechaFinaliza . "' " . 'GROUP BY codMembresia;';
                        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                        if($result){
                            foreach($result as $fila){
                            ?>
                                <tr>
                                    <td><?=$fila['codMembresia'];?></td>
                                    <td><?=$fila['unidades'];?></td>
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

<?php

?>
