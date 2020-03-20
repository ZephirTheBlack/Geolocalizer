<?php
    include "./geolocalizer.php";
    include "./WSDLDocument.php";
    $wsdl = new WSDLDocument("Geolocalizador");
    echo $wsdl->saveXml();
?>