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

    public function viewCreateArtist()
    {
        require(ROOT . VIEWS . 'CreateArtist.php');
    }

    public function viewDeleteArtist()
    {
        require(ROOT . VIEWS . 'DeleteArtist.php');
    }

    public function viewCreateCategory()
	{
		require(ROOT . VIEWS . 'createcategory.php');
	}

	public function viewDeleteCategory()
	{
        echo "SIN HACER";
	}

	public function viewCreateEvent()
	{
		require(ROOT . VIEWS . 'CreatEvent.php');
	}

	public function viewDeleteEvent()
	{
		require(ROOT . VIEWS . 'DeleteEvent.php');
    }
    
    public function viewCreateUser()
	{
		require(ROOT . VIEWS . 'createuser.php');
	}

    public function viewCreateTicket()
    {
        require(ROOT . VIEWS . 'createticket.php');
    }

    public function viewCreateSquareType()
    {
        require(ROOT . VIEWS . 'createsquaretype.php');
    }

    public function viewCreateEventPlace()
    {
        require(ROOT . VIEWS . 'createeventplace.php');
    }

}
?>