<?php
       include "conectarbd.php";
        
       $id = $_POST['id'];

       $valor = $_POST['valor'];

       $update = "UPDATE tarea SET Resultado= $valor  WHERE id=$id";

       mysqli_query($conex,$update) or die("ERROR: al actualizar datos");
?>