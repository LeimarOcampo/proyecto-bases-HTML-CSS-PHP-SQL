<?php
 
// Create connection
require('../configuraciones/conexion.php');

    $query="INSERT INTO herbivoro VALUES ('$_POST[codAnimal]','$_POST[edad]','$_POST[altura]','$_POST[frutaFavorita]')";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    if($result){
        header ("Location: Herbivoro.php");
        
         
    }else{
        echo "Ha ocurrido un error al crear el herbivoro";
    }

?>
