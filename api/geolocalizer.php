<?php
/**
 * Servicio de geolocalizacion.
 * Este servicio nos devuelve nuestras coordenadas geograficas en base a nuestra ip publica,
 * nunca nos dara nuestra posicion esacta a menos que lo mejoremos,aunque ahora mismo no nos interesa,
 * debido a que compartir esa informacion de manera publica va en contra de la LOPD.
 * 
 * 
 * @service
 * @binding.soap
 *
 */
class Geolocalizador
{

   /**
    * Devuelve las coordenadas de nuestra ubicacion en base a nuestra ip. 
   * @return array
   */
   function Localizame()
   {
      $datos = unserialize(file_get_contents("http://www.geoplugin.net/php.gp"));

      $latitud = $datos["geoplugin_latitude"];
      $longitud = $datos["geoplugin_longitude"];

      $coordenadas = ["latitud" => $latitud, "longitud" => $longitud];

      return $coordenadas;
   }
}

$server = new SoapServer(null, ['uri'=> 'http://localhost:8080/soap_server.php', ]);
$server->setClass('Geolocalizador');
$server->handle();
