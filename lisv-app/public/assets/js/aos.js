console.log("It Works");

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
    var caricon = {
        url: "https://cdn0.iconfinder.com/data/icons/classic-cars-by-cemagraphics/512/red_512.png", // url
        scaledSize: new google.maps.Size(30, 40), // scaled size
        //origin: new google.maps.Point(0,0), // origin
        //anchor: new google.maps.Point(0, 0) // anchor
    }

    var markers = [];
    window.setInterval(function(){
        var carMarker = new google.maps.Marker({
            position: new google.maps.LatLng(position.coords.latitude, position.coords.longitude),
            map: map,
            title: "Car",
            icon: caricon,
        })

        var infoWindow = new google.maps.InfoWindow({
            content: "<p id = 'left'>The current location of the Car</p>"
        })

        google.maps.event.addListener(carMarker, 'click', function(){
            infoWindow.open(map, carMarker)
        })
        markers.push(carMarker);
    }, 1000);

    window.setInterval(function(){
        for (var i = 0; i < markers.length-1; i++) {
            markers[i].setMap(null);
            }
    }, 1000);


    const shops =
    {
        name: "مجمع الفوزان الطبي",
        discount: true,
        lat: 24.778363,
        lng: 46.775690,
    }

    window.setInterval(function(){
        if(shops.discount == true ){
            if(position.coords.latitude  + 0.02 > shops.lat && position.coords.latitude  - 0.02 < shops.lat
            && position.coords.longitude + 0.02 > shops.lng && position.coords.longitude - 0.02 < shops.lng){

                var shopicon = {
                    url: "https://cdn1.iconfinder.com/data/icons/ecommerce-and-business-icon-set/256/store.png", // url
                    scaledSize: new google.maps.Size(30, 30), // scaled size
                    origin: new google.maps.Point(0,0), // origin
                    anchor: new google.maps.Point(0, 0) // anchor
                }

                var shopMarker = new google.maps.Marker({
                    position: new google.maps.LatLng(shops.lat, shops.lng),
                    map: map,
                    title: shops.name,
                    icon: shopicon,
                })
            
                var info = new google.maps.InfoWindow({
                    content: `<p id = 'left'>${shops.name} have a discount</p>`
                })
                
                google.maps.event.addListener(shopMarker, 'click', function(){
                    info.open(map, shopMarker)
                })
                markers.push(shopMarker);
            }
        }
    }, 1000);
}