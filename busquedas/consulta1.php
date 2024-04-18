<!DOCTYPE html>
<html lang="en">
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
    <div class="col-6" style="margin-top: 30px">
        <p style="font-style: italic">Se imprimirá el nombre y el codigo de cada carnívoro que tenga más de dos patios de recreación reservados,
 y además estos patios son accedidos por accesos que registran una cantidad de visitas mayor a 1.</p>
    </div>
    <div class="col-6 px-2" style="margin-top: 30px">
        <table class="table border-rounded">
            <thead class="thead ">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Codigo Animal</th>
                </tr>
            </thead>
            <tbody>
            <?php
                    require('../configuraciones/conexion.php');
                    $query = 'SELECT carnivoro.nombre, codAnimal
                                FROM carnivoro, (SELECT *
                                                 FROM patio_de_recreo, acceso
                                                 WHERE (patio_de_recreo.nombre = acceso.nombrePatio) AND cantVisitas > 1) AS nuevosPatios
                                WHERE carnivoro.codAnimal = nuevosPatios.codCarnivoro
                                GROUP BY codAnimal
                                HAVING COUNT(*) > 2;';
                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                    if($result){
                        foreach($result as $fila){
                        ?>
                            <tr>
                                <td><?=$fila['nombre'];?></td>
                                <td><?=$fila['codAnimal'];?></td>
                            </tr>
                        <?php
                        }
                    }
                    else{
                        echo "Ha ocurrido un error al buscar la información";
                    }
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>