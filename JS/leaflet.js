//Geolocalizacao

const long = document.querySelector(".long");
const lat = document.querySelector(".lat");

if(navigator.geolocation){

  navigator.geolocation.watchPosition(mostrarLocalizacao)
}else {console.log('erro')};

function mostrarLocalizacao(pos){
  console.log(pos);
  long.innerHTML=pos.coords.longitude;
  lat.innerHTML=pos.coords.latitude;


  var map = L.map('map').setView([pos.coords.latitude, pos.coords.longitude],15);
  
  L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map);
  
  L.marker([pos.coords.latitude, pos.coords.longitude]).addTo(map)
      .bindPopup('Minha Localização')
      .openPopup();
}



