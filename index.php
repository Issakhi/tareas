<?php
include "includes/conectarbd.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/estilo.css">

</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col">

            </div>
            <div class="col-8 ">

                <form method="post" id="formulario">
                    <div class="input-group mb-3">
                        <input type="text" id="nombretarea" class="form-control" placeholder="Introduzca tarea" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2">Añadir</button>
                    </div>
                </form>
                <h3 class="msj"></h3>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#mostrartareas').load('includes/mostrartareas.php');


                        $("#button-addon2").click(function() {

                            if ($("#nombretarea").value != "") {
                                var tarea = $("#nombretarea").val();


                                $.ajax({
                                    url: 'includes/add.php',
                                    type: 'post',
                                    data: {
                                        "nombre": tarea
                                    },
                                    success: function(response) {
                                        $('#mostrartareas').load('includes/mostrartareas.php');
                                        $('#nombretarea').val("");
                                    }
                                })
                            }
                        })

                        $(document).on("click", "#borrar", function() {
                            
                            var id = $(this).attr("codigo");
                            var dato = 'cod=' + id;
                            $.post("includes/eliminar.php", dato).done(function() {
                                $('#mostrartareas').load('includes/mostrartareas.php');
                            })
                        });

                        $(document).on("click", ".check", function() {

                            var codigo = $(this).attr("codigo");
                            var rs = $(this).attr("resultado");

                            var dt;

                            if(rs==1){
                                dt=0;
                            }

                            if(rs ==0){
                                dt=1;
                            }
                           
                            $.post("includes/checked.php", {
                                id: codigo,
                                valor: dt
                            }).done(function() {
                                $("#mostrartareas").load("includes/mostrartareas.php");

                            })
                        })


                    })
                </script>
                <div id='mostrartareas'></div>
                <p id="bd"></p>
            </div>
            <div class="col">
            </div>
        </div>
    </div>
</body>

</html>