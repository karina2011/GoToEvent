<?php 
namespace daos\daoList;

class EventDao  extends Singleton implements \interfaces\Crud
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
        $flag = 1;
        $this->list=$this->getSessionEvent();
        foreach ($this->list as $key => $value) {  //solo agrega un nuevo evento si este no existe
            if($value->getTitle()==$event->getTitle())
            {
                $flag=0;
            }
        }
        if ($flag)
        {
            array_push($this->list, $event);
            $this->setSessionEvent($this->list);
            // print_r($this->list);
        }
    }


    public function readAll()
    {
        $this->list = $this->getSessionEvent();
        return $this->list;
    }

    public function read ($id)
    {

    }

    public function update ($id)
    {

    }

    public function delete ($id)
    {
        $this->list = $this->getSessionEvent();
        $flag = false;
        foreach ($this->list as $key => $value) {
            if($value->getTitle() == $id){
                unset($this->list[$key]);
                $flag = true;
            }
        }
        if($flag){
            $this->setSessionEvent($this->list);
            echo "Evento eliminado" . '<br><br>';
        } else {
            echo "El evento que deseas eliminar no exsiste" . '<br><br>';
        }
    }
}




 ?>