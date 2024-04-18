<?php
require('../configuraciones/conexion.php');
if($_POST["exampleRadios2"]==="herbivoro"){
    $query="UPDATE patio_de_recreo SET fechaIngreso='$_POST[fechaIngreso]',codHerbivoro='$_POST[codAnimal]',codCarnivoro=NULL WHERE nombre='$_POST[nombre]'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    if($result){
        header ("Location: Patio.php");


     }else{
         echo "Ha ocurrido un error al actualizar el herbivoro";
     }  
}
else{
    $query="UPDATE patio_de_recreo SET fechaIngreso='$_POST[fechaIngreso]',codHerbivoro=NULL,codCarnivoro='$_POST[codAnimal]' WHERE nombre='$_POST[nombre]'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    if($result){
        header ("Location: Patio.php");
        
     }else{
         echo "Ha ocurrido un error al actualizar el herbivoro";
     }
}
mysqli_close($conn);
?>