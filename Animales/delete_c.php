<?php
 
// Create connection
require('../configuraciones/conexion.php');

//query
$query="delete FROM carnivoro where codAnimal='$_POST[d]'";
$result = mysqli_query($conn, $query) or 
die(mysqli_error($conn));
 
if($result){
    header ("Location: Carnivoro.php");
    
     
 }else{
     echo "Ha ocurrido un error al eliminar el carnivoro";
 }
 
mysqli_close($conn);



?>