<?php
    include "conectarbd.php";

    $select = "SELECT * FROM tarea ORDER BY Resultado,Fecha  DESC";

    $tareas = mysqli_query($conex, $select) or die("Error: al seleccionar tareas.");
    
   
    $imgEliminar = "https://cdn-icons-png.flaticon.com/512/70/70757.png";
?>


<div class='container mt-5' id='contenedor'>
    <?php
         $nu=0;

          while($dt = $tareas -> fetch_assoc()){
         
             $id = $dt['id'];

             
             $check ="";
             $texto="";
             $desactivar="";

             $resultado = $dt['Resultado'];
             $nu++;
             if($resultado == 1){
                $texto="text-decoration-line-through";
                $check = "checked";
                $nu--;
                
             }
             
              
            echo "
            <div class='row  mt-3 border rounded fondo' id='fil'>
            <div class='col-1'> 
            <input class='check' resultado='".$resultado."' id='check' type='checkbox' ".$check." codigo='".$id."'>
            </div>
            <div class='col-10 txt ".$texto."'>
               ".$dt['Nombre']."
            </div>
            <div class='col-1 p-1  clbtn'>
            <button class='btn bg-warning' id='borrar' codigo='".$id."'>
             <img src='".$imgEliminar."' id='im'></img>
             </button>
            </div>
            </div>
            ";
          }
           $s ="";
          if($nu ==0){
            echo "<h2 class='text-info'>Actualmente tiene 0 tareas registradas.</h2>";
          }else{
            if($nu >1){
               $s="s";
            }
            echo "<p class='fs-6 mt-3'>Tienes $nu tarea$s sin completar.</p>";
          }
    ?>
</div>


