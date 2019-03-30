//check if the browser have the geolocation
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(map) //call function map to load the map
    } else { 
        alert("Geolocation is not supported by this browser.")
    }
}

//loading the map
function map(position) {

    var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: position.coords.latitude, lng: position.coords.longitude},
      zoom: 11,
    })
    google.maps.event.addListener(map, 'click', function(e){
        $.get(`http://api.openweathermap.org/data/2.5/forecast?lat=${e.latLng.lat()}&lon=${e.latLng.lng()}&appid=8308a0579530d6c50d4c3257b5a16d2f`,
            function(results){
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(e.latLng.lat(), e.latLng.lng()),
                    map: map,
                    title: results.city.name,
                })
                temp = results.list[0].main.temp-273.15
                var infoWindow = new google.maps.InfoWindow({
                    content: `<br>
                              <p id = 'left'>The weather in ${results.city.name} is ${results.list[0].weather[0].description}</p>
                              <p id = 'left'>and the temperature is ${Number(temp).toFixed(2)} c</p>`
                })
                google.maps.event.addListener(marker, 'click', function(){
                    infoWindow.open(map, marker)
                })
            }
        )
    })
}