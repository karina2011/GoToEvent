<?php
namespace daos\daoList;

class ArtistDao  extends Singleton implements \interfaces\Crud
{
    private $list;
    public function __construct()
    {
        $this->list = array();
    }
    public function getSessionArtist()
    {

        if (!isset($_SESSION['ArtistList'])) {
            $_SESSION['ArtistList'] = array();
        }
        return $_SESSION['ArtistList'];
    }
    public function setSessionArtist($value)
    {
        $_SESSION['ArtistList'] = $value;
    }
    public function create($artist)
    {
        $flag = $this->checkDni($artist->getDni());
        if($flag){
            $this->list=$this->getSessionArtist();
            array_push($this->list, $artist);
            $this->setSessionArtist($this->list);
        }


        /*echo "<pre>";
        var_dump($this->list);
        echo "</pre>";*/

        return $flag;
    }


    public function readAll()
    {
        $this->list = $this->getSessionArtist();
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
        $flag = false;
        $this->list = $this->getSessionArtist();
        foreach ($this->list as $key => $value) {
            if($value->getDni() == $id){
                unset($this->list[$key]);
                $flag = true;
            }
        }
        if($flag){
            echo 'Artista eliminado' . '<br><br>';
            $this->setSessionArtist($this->list);
        } else {
            echo 'No exsiste el artista ' . '<br><br>';
        }
    }

    public function checkDni($dni){
        $flag = true;
        $this->list = $this->getSessionArtist();

        foreach ($this->list as $key => $value) {
            if($value->getDni() == $dni){
                $flag = false;
                return $flag;
            }
        }

        return $flag;
    }
}
