<?php
namespace controllers;
class HomeController
{

    public function __construct()
    {
    }

    public function index()
    {
        require(ROOT . VIEWS . 'Home.php');
    }




}
?>