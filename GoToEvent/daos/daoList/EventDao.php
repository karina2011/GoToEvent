<?php 
namespace daos\daoList;

class ArtistDao  extends Singleton implements \interfaces\Crud
{
    private $list;
    public function __construct()
    {
        $this->list = array();
    }
    public function getSessionEvent()
    {

        if (!isset($_SESSION['Event'])) {
            $_SESSION['Event'] = array();
        }
        return $_SESSION['Event'];
    }
    public function setSessionEvent($value)
    {
        $_SESSION['Event'] = $value;
    }
    public function create($event)
    {
        $this->list=$this->getSessionEvent();
        array_push($this->list, $event);
        $this->setSessionEvent($this->list);
        print_r($this->list);
    }


    public function readAll(){
        $this->list = $this->getSessionEvent();
        return $this->list;
    }

    public function read ($id){

    }

    public function update ($id){

    }

    public function delete ($id){

    }
}




 ?>