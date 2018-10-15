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
        $this->list=$this->getSessionArtist();
        array_push($this->list, $artist);
        $this->setSessionArtist($this->list);
        echo "<pre>";
        var_dump($this->list);
        echo "</pre>";
    }


    public function readAll(){
        $this->list = $this->getSessionArtist();
        return $this->list;
    }

    public function read ($id){

    }

    public function update ($id){

    }

    public function delete ($id){

    }
}
