<?php
 
// Create connection
require('../configuraciones/conexion.php');

//query
$query="UPDATE membresia SET color='$_POST[color]',fechaCompra='$_POST[fechaCompra]' WHERE codMembresia='$_POST[codMembresia]'";
$result = mysqli_query($conn, $query) or 
die(mysqli_error($conn));
 
if($result){
    header ("Location: Membresia.php");
    
     
 }else{
     echo "Ha ocurrido un error al actualizar la membresia";
 }
 
mysqli_close($conn);



?>