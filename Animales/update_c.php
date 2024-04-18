<?php
 
// Create connection
require('../configuraciones/conexion.php');

//query
$query="UPDATE carnivoro SET nombre='$_POST[nombre]',comidaFavorita='$_POST[comidaFavorita]',peso='$_POST[peso]' WHERE codAnimal='$_POST[codAnimal]'";
$result = mysqli_query($conn, $query) or 
die(mysqli_error($conn));
 
if($result){
    header ("Location: Carnivoro.php");
    
     
 }else{
     echo "Ha ocurrido un error al actualizar el Carnivoro";
 }
 
mysqli_close($conn);



?>