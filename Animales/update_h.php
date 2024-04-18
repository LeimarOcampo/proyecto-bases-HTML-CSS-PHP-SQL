<?php
 
// Create connection
require('../configuraciones/conexion.php');

//query
$query="UPDATE herbivoro SET edad='$_POST[edad]',altura='$_POST[altura]',frutaFavorita='$_POST[frutaFavorita]' WHERE codAnimal='$_POST[codAnimal]'";
$result = mysqli_query($conn, $query) or 
die(mysqli_error($conn));
 
if($result){
    header ("Location: Herbivoro.php");
    
     
 }else{
     echo "Ha ocurrido un error al actualizar el herbivoro";
 }
 
mysqli_close($conn);



?>