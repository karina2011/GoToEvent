<?php
namespace controllers;
class HomeController
{

    public function __construct()
    {
    }

    public function index()
    {
        require(ROOT.'views/Home.php');
    }

    public function creatEvent()
    {
       	require(ROOT.'views/CreatEvent.php');
    }

}
?>