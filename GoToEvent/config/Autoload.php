<?php namespace config;

class Autoload
{
    public static function Start()
    {
        spl_autoload_register(function ($instancia) {

        	$instancia = strtolower($instancia);

            $ruta = ROOT . str_replace("\\", "/", $instancia) . ".php";
            include_once ($ruta);

        });
    }
}
