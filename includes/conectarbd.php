<?php
      define("BD","tareas");
      define("LOCAL","127.0.0.1");
      define("USER","root");
      define("PASS", "");

      $conex=  new mysqli(LOCAL,USER,PASS,BD)or die("Error: al conectarse a la base de datos");
?>