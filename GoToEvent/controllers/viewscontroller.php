<?php
namespace controllers;


use controllers\CalendarController as C_Calendar;
use controllers\UserController as C_User;
use controllers\EventSquareController as C_Event_square;
use controllers\SquareTypeController as C_Square_type;
use controllers\ArtistController as C_Artist;
use controllers\CategoryController as C_Category;
use controllers\EventController as C_Event;
use controllers\FileController as C_File;
use controllers\PurchaseController as C_Purchase;
use controllers\PurchaseLineController as C_Purchase_line;
use controllers\EventPlaceController as C_Event_place;
use controllers\TicketController as C_Ticket;



use models\User as M_User;

$userController = new C_User;
$user = $userController->checkSession();

class ViewsController {

    private $artisController;
    private $calendarController;
    private $categoryController;
    private $eventController;
    private $eventPlaceController ;
    private $eventSquareController ;
    private $fileController ;
    private $purchaseController;
    private $puchaseLineController;
    private $squareTypeController;
    private $ticketController;
    private $userController;

    public function __construct()
    {

    }

    public function index()
    {
        /*echo "<pre>";
        var_dump($_SESSION['carrito']);
        echo "</pre>";*/
        $this->userController = new C_User;
        $user = $this->userController->checkSession();

        $this->calendarController = new C_Calendar;
        $calendarlist = $this->calendarController->readAll();
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
        $this->userController = new C_User;
        $user = $this->userController->checkSession();

        require(ROOT . VIEWS . 'login.php');
    }

    public function viewShoppingCart()
    {
      $this->userController = new C_User;
      $user = $this->userController->checkSession();

      require(ROOT . VIEWS . 'viewsshoppingcart.php');
    }

    public function viewAdmin(){

        $this->userController = new C_User;
        $user = $this->userController->checkSession();

        if ($user && $user->getType()== "admin"){
            require(ROOT . VIEWS . 'admin.php');
        } else {
            require(ROOT . VIEWS . 'home.php');
             echo '<script>alert("ALTO AHI VAQUERO");</script>';
           }
    }

    public function viewArtistsAdmin(){

        $this->artistController = new C_Artist;
        $this->userController = new C_User;

        $list = $this->artistController->readAll();
        $user = $this->userController->checkSession();

        $userController = new C_User;
        $user = $userController->checkSession();
        if ($user && $user->getType()== "admin"){
            require(ROOT . VIEWS . 'artistsadmin.php');
        } else {
            require(ROOT . VIEWS . 'home.php');
             echo '<script>alert("ALTO AHI VAQUERO");</script>';
           }
    }

    public function viewEventsAdmin(){

        $this->eventController = new C_Event;
        $list = $this->eventController->readAll();

        $this->categoryController = new C_Category();
        $listCategory = $this->categoryController->readAll();

        $this->userController = new C_User;
        $user = $this->userController->checkSession();

        if ($user && $user->getType()== "admin"){
            require(ROOT . VIEWS . 'eventsadmin.php');
        } else {
            require(ROOT . VIEWS . 'home.php');
             echo '<script>alert("ALTO AHI VAQUERO");</script>';
           }
    }

    public function viewCategoriesAdmin(){
        $this->userController = new C_User;
        $user = $this->userController->checkSession();

        $this->categoryController = new C_Category;
        $list = $this->categoryController->readAll();

        if ($user && $user->getType()== "admin"){
            require(ROOT . VIEWS . 'categoriesAdmin.php');
        } else {
            require(ROOT . VIEWS . 'home.php');
             echo '<script>alert("ALTO AHI VAQUERO");</script>';
           }
    }

    public function viewUsersAdmin(){

        $this->userController = new C_User;
        $user = $this->userController->checkSession();

        $list = $this->userController->readAll();

        if ($user && $user->getType()== "admin"){
            require(ROOT . VIEWS . 'usersAdmin.php');
        } else {
            require(ROOT . VIEWS . 'home.php');
             echo '<script>alert("ALTO AHI VAQUERO");</script>';
           }
    }

    public function viewTicketsAdmin(){

        $this->userController = new C_User;
        $user = $this->userController->checkSession();

        $this->ticketController = new C_Ticket;
        $list = $this->ticketController->readAll();

        if ($user && $user->getType()== "admin"){
            require(ROOT . VIEWS . 'ticketsAdmin.php');
        } else {
            require(ROOT . VIEWS . 'home.php');
             echo '<script>alert("ALTO AHI VAQUERO");</script>';
           }
    }

    public function viewSquareTypesAdmin(){

        $this->userController = new C_User;
        $user = $this->userController->checkSession();

        $this->squareTypeController = new C_Square_Type;
        $list = $this->squareTypeController->readAll();

        if ($user && $user->getType()== "admin"){
            require(ROOT . VIEWS . 'squaretypesadmin.php');
        } else {
            require(ROOT . VIEWS . 'home.php');
             echo '<script>alert("ALTO AHI VAQUERO");</script>';
           }
    }

    public function viewEventPlacesAdmin(){

        $this->userController = new C_User;
        $user = $this->userController->checkSession();

        $this->eventPlaceController = new C_Event_place;
        $list = $this->eventPlaceController->readAll();

        if ($user && $user->getType()== "admin"){
            require(ROOT . VIEWS . 'eventplacesadmin.php');
        } else {
            require(ROOT . VIEWS . 'home.php');
             echo '<script>alert("ALTO AHI VAQUERO");</script>';
           }
    }

    public function viewPurchasesAdmin(){
        $this->userController = new C_User;
        $user = $this->userController->checkSession();
        $listUser = $this->userController->readAll();

        $this->purchaseController = new C_Purchase;
        $list = $this->purchaseController->readAll();

        $this->purchaseLineController = new C_Purchase_line;
        $listPurchaseLine = $this->purchaseLineController->readAll();

        $this->userController = new C_User;
        $user = $this->userController->checkSession();

        if ($user && $user->getType()== "admin"){
            require(ROOT . VIEWS . 'purchasesadmin.php');
        } else {
            require(ROOT . VIEWS . 'home.php');
             echo '<script>alert("ALTO AHI VAQUERO");</script>';
           }
    }

    public function viewPurchaseLinesAdmin(){
        require(ROOT . VIEWS . 'viewpurchaselines.php'); // hacer pruchaselineadmin
    }

    public function viewEventSquaresAdmin(){
        $this->userController = new C_User;
        $user = $this->userController->checkSession();

        $this->eventSquareController = new C_Event_square;
        $list = $this->eventSquareController->readAll();

        $this->squareTypeController = new C_Square_type;
        $listSquareType = $this->squareTypeController->readAll();

        if ($user && $user->getType()== "admin"){
            require(ROOT . VIEWS . 'eventsquaresadmin.php');
        } else {
            require(ROOT . VIEWS . 'home.php');
             echo '<script>alert("ALTO AHI VAQUERO");</script>';
           }
    }

    public function calendarsAdmin(){


        $this->userController = new C_User;
        $user = $this->userController->checkSession();

        $this->calendarController = new C_Calendar;
        $list = $this->calendarController->readAll();

        $this->eventController = new C_Event;
        $listEvents = $this->eventController->readAll();

        $this->artistController = new C_Artist;
        $listArtists = $this->artistController->readAll();

        $this->eventPlaceController = new C_Event_place;
        $listEventPlaces = $this->eventPlaceController->readAll();

        $calendarId = $this->calendarController->generateId(); // devuelve el id que va a usar el calendario a crear

        $this->eventSquareController = new C_Event_square;
        $listEventSquares = $this->eventSquareController->readAllByCalendarId($calendarId); // traer solo los eventsquares que correspondan al id calendario q se va a crear

        $this->squareTypeController = new C_Square_type;
        $listSquareType = $this->squareTypeController->readAll();


        if ($user && $user->getType()== "admin"){
            require(ROOT . VIEWS . 'calendarsadmin.php');
        } else {
            require(ROOT . VIEWS . 'home.php');
             echo '<script>alert("ALTO AHI VAQUERO");</script>';
           }
    }

    public function addEventSquareToCalendar(){
        $this->userController = new C_User;
        $user = $this->userController->checkSession();

        $this->calendarController = new C_Calendar;

        $calendar = $this->calendarController->readLastCalendar();

        $this->eventSquareController = new C_Event_square;
        $listEventSquares = $this->eventSquareController->readAllByCalendarId($calendar->getId()); // traer solo los eventsquares que correspondan al id calendario q se creo ultimo

        $this->squareTypeController = new C_Square_type;
        $listSquareType = $this->squareTypeController->readAll();

        require(ROOT . VIEWS . 'addeventsquarestocalendar.php');

    }

    public function viewEvent (){

        $this->userController = new C_User;
        $user = $this->userController->checkSession();

        $this->calendarController = new C_Calendar;
        $this->eventSquareController = new C_Event_square;

        $calendarId = $_GET["id_calendar"];

        $calendar = $this->calendarController->readById($calendarId);

        $event_squares = $this->eventSquareController->readAllByCalendarId($calendar->getId());

        require(ROOT . VIEWS . 'viewevent.php');
    }

    public function shoppingCart(){

        $this->userController = new C_User;
        $user = $this->userController->checkSession();
        require(ROOT . VIEWS . 'shoppingcart.php');
    }

}
?>
