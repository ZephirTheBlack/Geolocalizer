<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>map</title>
</head>

<body>

    <?php
    $client = new SoapClient(null, array(
        'location' => "http://localhost/forty/api/geolocalizer.php",
        'uri'      => "http://localhost/forty/api//geolocalizer.php",
        'trace'    => 1 ));
       $datos=$client->__soapCall("Localizame", array() );
    ?>
    <div id="map" style="height: 400px;width: 50%"></div>
    <script>
        function initMap() {
            var coordenadas = {
                lat: <?= $datos["latitud"] ?>,
                lng: <?= $datos["longitud"] ?>
            };

            var mapa = new google.maps.Map(document.getElementById('map'), {
                zoom: 12,
                center: coordenadas
            });

            var marker = new google.maps.Marker({
                position: coordenadas,
                map: mapa
            });
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6xIvXttv_L5AWMbCKN80rOw2ICQCxaz0
&callback=initMap" async defer></script>
</body>

</html>