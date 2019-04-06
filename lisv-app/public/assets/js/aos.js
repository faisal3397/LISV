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
    }, 1000);


    const shops =[
    {
        name: "صيانة",
        lat: 24.729635,
        lng: 46.620593
    },
    {
        name: "صيانة",
        lat: 24.576866,
        lng: 46.624984
    },
    {
        name: "صيانة",
        lat: 24.765577,
        lng: 46.706748
    }
    ]

    window.setInterval(function(){
        shops.forEach(shops => {
            if(position.coords.latitude  + 0.02 > shops.lat && position.coords.latitude  - 0.02 < shops.lat
                && position.coords.longitude + 0.02 > shops.lng && position.coords.longitude - 0.02 < shops.lng){
        
                    var shopicon = {
                        url: "https://s3.amazonaws.com/iconbros/icons/icon_pngs/000/000/304/original/tools.png", // url
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
                }
        });
    }, 1000);
}