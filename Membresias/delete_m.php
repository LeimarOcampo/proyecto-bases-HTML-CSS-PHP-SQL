<?php
 
// Create connection
require('../configuraciones/conexion.php');

//query
$borrado = 'DELETE FROM patio_de_recreo
            WHERE nombre IN (SELECT nombre FROM patio_de_recreo, acceso  
            WHERE(patio_de_recreo.nombre  = acceso.nombrePatio) AND codMembresia = ' . $_POST[d] . ")";
mysqli_query($conn, $borrado) or die (mysqli_error($conn));
$query="delete FROM membresia where codMembresia='$_POST[d]'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
 
if($result){
    header ("Location: Membresia.php");
    
     
 }else{
     echo "Ha ocurrido un error al eliminar la membresia";
 }
 
mysqli_close($conn);



?>