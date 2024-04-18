<?php

// Create connection
require('../configuraciones/conexion.php');
    $codMembresia = $_POST['codMembresia'];
    $nombrePatio = $_POST['nombrePatio'];
    $membresia = 'SELECT color FROM membresia WHERE codMembresia = ' . $codMembresia . ';';
    $patio = 'SELECT nombre FROM patio_de_recreo WHERE nombre = ' . "'" . $nombrePatio . "'" . ';';
    $comprobacionMembresia = mysqli_query($conn, $membresia) or die(mysqli_error($conn));
    $comprobacionPatio = mysqli_query($conn, $patio) or die(mysqli_error($conn));
    if(mysqli_num_rows($comprobacionMembresia) == 0){
        $message = "La membresia ingresada no existe";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    else if(mysqli_num_rows($comprobacionPatio) == 0){
        $message = "El nombre de patio ingresado no existe";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    else{
        $query="INSERT INTO acceso VALUES ('$_POST[fechaUltimoIngreso]','$_POST[nombrePatio]','$_POST[codMembresia]','$_POST[cantVisitas]')";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if($result){
            header ("Location: Patio.php");
        }else{
           echo "Ha ocurrido un error al crear el acceso";
    }
    }

?>