<?php
 
// Create connection
require('../configuraciones/conexion.php');

//query
$query="delete FROM acceso where codMembresia=$_POST[m] AND nombrePatio='$_POST[n]'";
$result = mysqli_query($conn, $query) or 
die(mysqli_error($conn));
 
if($result){
    header ("Location: Patio.php");
    
     
 }else{
     echo "Ha ocurrido un error al eliminar el patio";
 }
 
mysqli_close($conn);


?>

