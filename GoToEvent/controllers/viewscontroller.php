<?php
namespace controllers;
class ViewsController
{

    public function __construct()
    {
    }

    public function index()
    {
        require(ROOT . VIEWS . 'Home.php');
    }

    public function viewCreateSquareType()
    {
        require(ROOT . VIEWS . 'createsquaretype.php');
    }

    public function viewCreateEventPlace()
    {
        require(ROOT . VIEWS . 'createeventplace.php');
    }

    public function viewCreateEventSquare()
    {
        require(ROOT . VIEWS . 'createeventsquare.php');
    }

    public function viewCreatePurchase()
    {
        require(ROOT . VIEWS . 'createpurchase.php');
    }

    public function viewCreatePurchaseLine()
    {
        require(ROOT . VIEWS . 'createpurchaseline.php');
    }

    public function viewCreateCalendar()
    {
        require(ROOT . VIEWS . 'createcalendar.php');
    }

    public function login()
    {
        require(ROOT . VIEWS . 'login.php');
    }

    public function viewAdmin(){
        require(ROOT . VIEWS . 'admin.php');
    }

    public function viewArtistsAdmin(){
        require(ROOT . VIEWS . 'artistsadmin.php');
    }

    public function viewEventsAdmin(){
        require(ROOT . VIEWS . 'eventsadmin.php');
    }

    public function viewCategoriesAdmin(){
        require(ROOT . VIEWS . 'categoriesAdmin.php');
    }

    public function viewUsersAdmin(){
        require(ROOT . VIEWS . 'usersAdmin.php');
    }

    public function viewTicketsAdmin(){
        require(ROOT . VIEWS . 'ticketsAdmin.php');
    }

}
?>