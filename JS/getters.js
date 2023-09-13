function atualizaHora(){
  let data = new Date().toLocaleString("pt-br", {
    timeZone: 'America/Maceio'
  });

  let getHoraAtual = document.getElementById('horaAtual').innerHTML = data.replace(", ", " - ");
  
 }
 setInterval(atualizaHora, 1000);

