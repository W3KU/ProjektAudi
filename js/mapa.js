function initMap() {
    var map = L.map('map').setView([51.5, -0.09], 13); // Ustawienia początkowe i zoom
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Dodanie znacznika na mapie
    var marker = L.marker([51.5, -0.09]).addTo(map);
    marker.bindPopup("<b>Witaj!</b><br>Jestem tutaj.").openPopup();
  }

  // Wywołanie funkcji inicjalizującej mapę po załadowaniu strony
  window.onload = function() {
    initMap();
  };