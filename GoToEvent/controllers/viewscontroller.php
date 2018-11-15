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

    public function viewUsers(){
        require(ROOT . VIEWS . 'users.php');
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

    public function viewSquareTypesAdmin(){
        require(ROOT . VIEWS . 'squaretypesadmin.php');
    }

    public function viewEventPlacesAdmin(){
        require(ROOT . VIEWS . 'eventplacesadmin.php');
    }

    public function viewPurchasesAdmin(){
        require(ROOT . VIEWS . 'purchasesadmin.php');
    }

    public function viewEventSquaresAdmin($id_calendar=''){
        //echo "id de calendar: " . $id_calendar;
        require(ROOT . VIEWS . 'eventsquaresadmin.php');
    }

    public function calendarsAdmin(){
        require(ROOT . VIEWS . 'calendarsadmin.php');
    }

    public function viewEvent (){
        require(ROOT . VIEWS . 'viewevent.php');
    }
}
?>
