<?php
 
// Create connection
require('../configuraciones/conexion.php');

if($_POST["comidaFavorita"] == 'pescado'){
    $query="INSERT INTO carnivoro VALUES ('$_POST[codAnimal]','$_POST[nombre]','$_POST[comidaFavorita]','$_POST[peso]')";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    if($result){
        header ("Location: Carnivoro.php");
    }else{
        echo "Ha ocurrido un error al crear el carnivoro";
    }
}
else if($_POST["comidaFavorita"] == 'res'){
    $query="INSERT INTO carnivoro VALUES ('$_POST[codAnimal]','$_POST[nombre]','$_POST[comidaFavorita]','$_POST[peso]')";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    if($result){
        header ("Location: Carnivoro.php");
    }else{
        echo "Ha ocurrido un error al crear el carnivoro";
    }
}
else if ($_POST["comidaFavorita"] == "pollo"){
    $query="INSERT INTO carnivoro VALUES ('$_POST[codAnimal]','$_POST[nombre]','$_POST[comidaFavorita]','$_POST[peso]')";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    if($result){
        header ("Location: Carnivoro.php");
    }else{
        echo "Ha ocurrido un error al crear el carnivoro";
    }
}
else{
    echo "Se ingresó un tipo de comida no valido";
}
?>
