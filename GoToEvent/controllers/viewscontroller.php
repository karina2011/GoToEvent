<?php
namespace controllers;


use controllers\UserController as C_User;
use models\User as M_User;

$userController = new C_User;
$user = $userController->checkSession();

class ViewsController {

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
        $userController = new C_User;
        $user = $userController->checkSession();
        if ($user && $user->getType()== "admin"){
            require(ROOT . VIEWS . 'admin.php');
        } else {
            require(ROOT . VIEWS . 'home.php');
             echo '<script>alert("ALTO AHI VAQUERO");</script>';  
           }
    }

    public function viewArtistsAdmin(){
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
        $userController = new C_User;
        $user = $userController->checkSession();
        if ($user && $user->getType()== "admin"){
            require(ROOT . VIEWS . 'eventsadmin.php');
        } else {
            require(ROOT . VIEWS . 'home.php');
             echo '<script>alert("ALTO AHI VAQUERO");</script>';  
           }
    }

    public function viewCategoriesAdmin(){
        $userController = new C_User;
        $user = $userController->checkSession();
        if ($user && $user->getType()== "admin"){
            require(ROOT . VIEWS . 'categoriesAdmin.php');
        } else {
            require(ROOT . VIEWS . 'home.php');
             echo '<script>alert("ALTO AHI VAQUERO");</script>';  
           }
    }

    public function viewUsersAdmin(){
        $userController = new C_User;
        $user = $userController->checkSession();
        if ($user && $user->getType()== "admin"){
            require(ROOT . VIEWS . 'usersAdmin.php');
        } else {
            require(ROOT . VIEWS . 'home.php');
             echo '<script>alert("ALTO AHI VAQUERO");</script>';  
           }
    }

    public function viewTicketsAdmin(){
        $userController = new C_User;
        $user = $userController->checkSession();
        if ($user && $user->getType()== "admin"){
            require(ROOT . VIEWS . 'ticketsAdmin.php');
        } else {
            require(ROOT . VIEWS . 'home.php');
             echo '<script>alert("ALTO AHI VAQUERO");</script>';  
           }
    }

    public function viewSquareTypesAdmin(){
        $userController = new C_User;
        $user = $userController->checkSession();
        if ($user && $user->getType()== "admin"){
            require(ROOT . VIEWS . 'squaretypesadmin.php');
        } else {
            require(ROOT . VIEWS . 'home.php');
             echo '<script>alert("ALTO AHI VAQUERO");</script>';  
           }
    }

    public function viewEventPlacesAdmin(){
        $userController = new C_User;
        $user = $userController->checkSession();
        if ($user && $user->getType()== "admin"){
            require(ROOT . VIEWS . 'eventplacesadmin.php');
        } else {
            require(ROOT . VIEWS . 'home.php');
             echo '<script>alert("ALTO AHI VAQUERO");</script>';  
           }
    }

    public function viewPurchasesAdmin(){
        $userController = new C_User;
        $user = $userController->checkSession();
        if ($user && $user->getType()== "admin"){
            require(ROOT . VIEWS . 'purchasesadmin.php');
        } else {
            require(ROOT . VIEWS . 'home.php');
             echo '<script>alert("ALTO AHI VAQUERO");</script>';  
           }
    }

    public function viewEventSquaresAdmin($id_calendar=''){
        $userController = new C_User;
        $user = $userController->checkSession();
        if ($user && $user->getType()== "admin"){
            require(ROOT . VIEWS . 'eventsquaresadmin.php');
        } else {
            require(ROOT . VIEWS . 'home.php');
             echo '<script>alert("ALTO AHI VAQUERO");</script>';  
           }
    }

    public function calendarsAdmin(){
        $userController = new C_User;
        $user = $userController->checkSession();
        if ($user && $user->getType()== "admin"){
            require(ROOT . VIEWS . 'calendarsadmin.php');
        } else {
            require(ROOT . VIEWS . 'home.php');
             echo '<script>alert("ALTO AHI VAQUERO");</script>';  
           }
    }

    public function viewEvent (){
        require(ROOT . VIEWS . 'viewevent.php');
    }
}
?>
