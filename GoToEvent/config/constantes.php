<?php
namespace config;

define('ROOT', str_replace('\\','/',dirname(__DIR__) . "/"));
define('VIEWS', 'views/');
//define('ROOT', str_replace('localhost/tpbecharge/'));

$base=explode($_SERVER['DOCUMENT_ROOT'],ROOT);
define("BASE",$base[1]);

define('DB_HOST',"localhost");
define('DB_USER',"root");
define('DB_PASS',"");
define('DB_NAME',"GoToEvent");
define('IMG_UPLOADS',ROOT.'assets/img');
define('IMG_EVENT','assets/img/eventimg/');

//Declaramos una carpeta temporal para guardar la imagenes generadas
define('DIR_QR', 'temp/');





?>
