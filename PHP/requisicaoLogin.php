<?php

include('conexao.php');
session_start();

if( isset($_POST['email']) || isset($_POST['senha']) )
{

  $email = $_POST['email'];
  $senha = $_POST['senha'];

  $queryLogin = "SELECT COUNT(*) AS TOTAL 
                   FROM registros.funcionarios f
                  WHERE f.email = '$email'
                    AND f.senha = '$senha'";
          
  foreach ($conn->query($queryLogin) as $row) {
    $total = $row['TOTAL'];
  }

  echo $total;
  if ($total <> 0 ) {
    header('Location: views/home.php');
    
  }else{echo 'revise o email ou senha!';}

}
