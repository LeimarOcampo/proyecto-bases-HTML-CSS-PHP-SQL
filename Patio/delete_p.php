<?php
require('../configuraciones/conexion.php');
$query="delete FROM patio_de_recreo where nombre='$_POST[d]'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
 
if($result){
    header ("Location: Patio.php");
    
     
 }else{
     echo "Ha ocurrido un error al eliminar la membresia";
 }
 
mysqli_close($conn);

?>