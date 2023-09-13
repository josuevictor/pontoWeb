<?php 
  //Define um fuso horário padrão
  date_default_timezone_set('America/Maceio');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CSS/home.css">

  <!-- ICONS -->
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

  <!-- LEAFLET -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Make sure you put this AFTER Leaflet's CSS -->
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
      integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
      crossorigin=""></script>


  <title>Document</title>
</head>
<body>
  <header>
    <ul>
      <li> <i class="fa fa-bars"  aria-hidden="true" style="font-size: 24px"></i></li>
      <li><i class="fa fa-user-circle-o" aria-hidden="true" style="font-size: 24px"></i></li>
    </ul>
  </header>
  <main class="container">    
    <p id="horaAtual"> <?php echo date("d/m/Y H:i:s");?> </p>
    <p class="lat"></p>  
    <p class="long"></p>
    
    <div id="map">

    </div>
    
    <div class="button">
      <a href="../php/registrar_ponto.php">Registrar Ponto</a>
    </div>

    <section class="checklist-pontos">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Entrada</th>
            <th scope="col">Saída Intervalo</th>
            <th scope="col">Retorno Intervalo</th>
            <th scope="col">Saída</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>12:00:00</td>
            <td>12:00:00</td>
            <td>12:00:00</td>
            <td>12:00:00</td>
          </tr>
        </tbody>
      </table>
    </section>
  </main>
</body>
 <script src="../js/getters.js"></script>
 <script src="../js/leaflet.js"></script>
</html>