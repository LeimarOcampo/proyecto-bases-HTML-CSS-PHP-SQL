<?php
 
// Create connection
require('../configuraciones/conexion.php');

    $query="INSERT INTO membresia VALUES ('$_POST[codMembresia]','$_POST[color]','$_POST[fechaCompra]')";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    if($result){
        header ("Location: Membresia.php");
        
         
    }else{
        echo "Ha ocurrido un error al crear la membresia";
    }

?>
