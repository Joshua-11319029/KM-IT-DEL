<?php

define('BASEURL', 'http://localhost/KM%20IT%20DEL/');
define("DB_HOST", "localhost:3306");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "km_it_del");


function redirect($_location)
{
    header("location: " . BASEURL . $_location);
}
