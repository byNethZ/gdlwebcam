<?php


require 'paypal/autoload.php';

define('URL_SITIO', 'http://localhost:8080/gdlwebcam_inicio');

$apiContext = new \PayPal\Rest\ApiContext(
      new \PayPal\Auth\OAuthTokenCredential(
          'ATNchdgRvpiLjJHWrALscWHt53unEcc54W1YemE9B-FCm2tHgNjdSHwKPQkuSVQgysnzaVQWW1F087Z0',  // ClienteID
          'EC8uZ-2xQvAbMYthrTLRC3kD4y1PlWvvujrXV-7wAGCUx0Qw2BF-tjHb3mCfAQMU_ome0oHO0Iy3v78V'  // Secret
      )
);

