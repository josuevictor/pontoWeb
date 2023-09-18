<?php

  $host = "localhost";
  $user = "root";
  $pass = "";
  $dbname = "registros";
  $port = 3306;

  try {
    $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);
    echo "conexão realizada com sucesso";
  } catch (PDOException $err) {
    echo "Erro: conexão com o banco ed dados não realizada com secesso. Erro gerado " . $err->getMessage();
  }

?>