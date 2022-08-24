<?php

       include "conectarbd.php";
        //if($_POST['accion']=='borrar'){      
       echo $id= $_POST['cod'];

       echo $delete = "DELETE FROM tarea WHERE id=$id";

       mysqli_query($conex,$delete) or die("Error: al eliminar tarea.");
        
?>

<!--<form action="eliminar.php" method="POST">
       <input type='hidden' name='accion' value='borrar'>
       <input name="cod">
       <input type="submit" value='borra'>
</form>-->