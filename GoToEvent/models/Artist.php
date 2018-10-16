<?php 



namespace models;

class Artist
{
	
	private $dni;
	private $last_name;
	private $name;
	private $id_artist;

	function __construct($dni='',$name='',$last_name='',$id_artist='')
	{
		$this->dni = $dni;
		$this->name = $name;
		$this->last_name = $last_name;
		$this->id_artist = $id_artist;
	}

	public function getDni()
	{
		return $this->dni;
	}

	public function getLastName()
	{
		return $this->last_name;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getIdArtist()
	{
		return $this->id_artist;
	}

	public function setDni($dni)
	{
		$this->dni = $dnidni;
	}

	public function setLastName($last_name)
	{
		$this->last_name = $last_name;
	}

	public function setName()
	{
		$this->name = $name;
	}

	public function setIdArtist($id_artist)
	{
		$this->id_artist = $id_artist;
	}

}
?>