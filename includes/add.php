<?php 
       include "conectarbd.php";
       
       if($_POST['nombre'] !=""){
         
           $nombre =$_POST['nombre'];
           $fecha = date("y/n/j| h:i:sa");
           $resultado = 0;

            $insertar = "INSERT INTO tarea( Nombre,Resultado, Fecha) VALUES ('".$nombre."',$resultado,'".$fecha."')";

            mysqli_query($conex,$insertar) or die("Error: al insertar tarea.");
       }
?>