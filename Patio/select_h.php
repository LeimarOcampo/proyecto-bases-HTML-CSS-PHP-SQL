<?php
 
// Create connection
require('../configuraciones/conexion.php');

//query
$query="SELECT * FROM herbivoro";
$resultH = mysqli_query($conn, $query) or die(mysqli_error($conn));
 

 
mysqli_close($conn);



?>
