<?php

// Create connection
require('../configuraciones/conexion.php');

//query
$query="UPDATE acceso SET fechaUltimoIngreso='$_POST[fechaUltimoIngreso]',cantVisitas='$_POST[cantVisitas]' WHERE codMembresia='$_POST[codMembresia]' AND nombrePatio='$_POST[nombrePatio]'";
$result = mysqli_query($conn, $query) or 
die(mysqli_error($conn));
 
if($result){
    header ("Location: Patio.php");
    
     
 }else{
     echo "Ha ocurrido un error al actualizar el acceso";
 }
 
mysqli_close($conn);
?>