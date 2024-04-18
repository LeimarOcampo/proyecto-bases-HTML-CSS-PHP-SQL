<?php
 
// Create connection
require('../configuraciones/conexion.php');

//query
$query="delete FROM herbivoro where codAnimal='$_POST[d]'";
$result = mysqli_query($conn, $query) or 
die(mysqli_error($conn));
 
if($result){
    header ("Location: Herbivoro.php");
    
     
 }else{
     echo "Ha ocurrido un error al eliminar el herbivoro";
 }
 
mysqli_close($conn);



?>