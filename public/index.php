<?php

session_start();

$path = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];

include "../app/initialize.php";

$path = str_replace("index.php", "", $path);

define("ROOT", $path);
define("ASSETS", $path . "assets/");
define('ROOT_PATH', "/http://clipclassic.ci/");


$app = new App();