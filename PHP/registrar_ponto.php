<?php 
  //Define um fuso horário padrão
  date_default_timezone_set('America/Maceio');

  //Gera com PHP o horário atual
  $horarioAtual = date("H:i:s");
  var_dump($horarioAtual);

  //Gera data com PHP no formato que será salvo no banco dew dados.
  $dataEntrada = date('Y/m/d');
  var_dump($dataEntrada);

  //Inclui conexao com o banco de dados.
  include_once("conexao.php");

  //ID do funcionario fixo para testes(ARMAZENAR NA SESSÃO DEPOIS!)
  $idFuncionario = 1;

  //Retornar o ultimo ponto do usuario
  $queryPonto = "SELECT id AS id_ponto,
                        saida_intervalo, 
                        retorno_Intervalo, 
                        saida
                  FROM pontos
                  WHERE id_funcionario =:id_funcionario	
                  ORDER BY id DESC
                  LIMIT 1";

  //Preparar a query
  $resultPonto = $conn->prepare($queryPonto);

  //Substitui o link da query pelo valor
  $resultPonto->bindParam(':id_funcionario', $idFuncionario);

  //Executar a query 
  $resultPonto->execute();
  //Verifica se encontgrou registros no banco de dados
  if (($resultPonto) and ($resultPonto->rowCount() != 0)) {
    //Faz a leitura do registro
    //fetch(ler o valor), PDO(conexão usada), FETCH_ASSOC(imprimir atraves do nome da coluna)
    $row = $resultPonto->fetch(PDO::FETCH_ASSOC);
    var_dump($row);

    //Extrai para imprimir através do nome chave no array
    extract($row);

    //Verifica se o usuario bateu o ponto de sáida pro intervalo 
    if (($saida_intervalo == "") or ($saida_intervalo == null)) {
      $colunaTipoRegistro = "saida_intervalo";//coluna vai receber o valor
      $tipoRegistro    = "editar";//tipo de registro
      $txtTipoRegistro = "Saída intervalo";//texto que será apresentado para o usuário
    }
    //verifica se o usuario bateu o ponta da volta do intervalo
    elseif (($retorno_Intervalo == "") or ($retorno_Intervalo == null)) {
      $colunaTipoRegistro = "retorno_Intervalo";//coluna vai receber o valor
      $tipoRegistro    = "editar";//tipo de registro
      $txtTipoRegistro = "Retorno intervalo";//texto que será apresentado para o usuário
      
    }elseif(($saida == "") or ($saida == null)) {
      $colunaTipoRegistro = "saida";//coluna vai receber o valor
      $tipoRegistro    = "editar";//tipo de registro
      $txtTipoRegistro = "saida";//texto que será apresentado para o usuário
      
    }else{//verifica se possui ponto de saída
      $tipoRegistro    = "entrada";//tipo de registro
      $txtTipoRegistro = "entrada";//texto que será apresentado para o usuário
    } 
  }else{
    echo("Nenhum ponto encontrado");
  }
  switch ($tipoRegistro) {
    case "editar":
        $queryHorario = "UPDATE pontos
                            SET $colunaTipoRegistro =:horarioAtual
                          WHERE id=:id
                          LIMIT 1";
        //Preparar a query
         $cadastraHorario = $conn->prepare($queryHorario);

         $cadastraHorario->bindParam(':horarioAtual', $horarioAtual);
         $cadastraHorario->bindParam(':id', $id_ponto);
         break;
      default:
        $queryHorario = "INSERT INTO pontos(id_funcionario, data_entrada, entrada) VALUES(:id_funcionario, :data_entrada, :entrada)";

        $cadastraHorario = $conn->prepare($queryHorario);
        $cadastraHorario->bindParam(':id_funcionario', $idFuncionario);
        $cadastraHorario->bindParam(':data_entrada', $dataEntrada);
        $cadastraHorario->bindParam(':entrada', $horarioAtual);
      break;
  }

  //Executar a query
  $cadastraHorario->execute();

  //Acessa o IF quando cadastrar com secesso
  if ($cadastraHorario->rowCount()) {
    echo "<p style='color: green';>Horário de $txtTipoRegistro cadastrado com sucesso!</p>";
  }else{
    echo "<p style='color: #f00';>Horário de $txtTipoRegistro não cadastrado!</p>";
  }

?>
