<!DOCTYPE html>
<html>
  <head>
    <title>Aware</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/map.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style0.css">
  </head>
  <body>



    @include('partials.nav')

    <div id="map"></div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script src="assets/js/aos.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBiHIvet_7hBIrhJwTcI7vP0wTsH1gXFhs&callback=getLocation" async defer></script>
  </body>
</html>