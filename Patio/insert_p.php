<?php
 
// Create connection
require('../configuraciones/conexion.php');

//query

if($_POST["exampleRadios2"]==="herbivoro"){
    $query="INSERT INTO patio_de_recreo VALUES ('$_POST[nombre]','$_POST[fechaIngreso]','$_POST[codAnimal]',NULL);";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if($result){
        header("Location: ./Patio.php");
    }
    else{
        echo "Ha ocurrido un error al crear patio";
    }
    
}
else{
    $query="INSERT INTO patio_de_recreo VALUES ('$_POST[nombre]','$_POST[fechaIngreso]',NULL,'$_POST[codAnimal]');";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if($result){
        header("Location: ./Patio.php");
    }
    else{
        echo "Ha ocurrido un error al crear patio";
    }
}

?>
