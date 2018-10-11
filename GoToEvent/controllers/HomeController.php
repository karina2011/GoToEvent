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

    public function creatEvent()
    {
       	require(ROOT . VIEWS . 'CreatEvent.php');
    }

    public function createArtist()
    {
        require(ROOT . VIEWS . 'CreateArtist.php');
    }

    public function deleteArtist()
    {
        require(ROOT . VIEWS . 'DeleteArtist.php');
    }

    public function deleteEvent()
    {
        require(ROOT . VIEWS . 'DeleteEvent.php');
    }

}
?>