<?php
namespace models;


require_once ('event.php');


class Category
{

	private $description;
	private $id_category;

	function __construct($description='',$id_category='')
	{
		$this->description = $description;
		$this->id_category = $id_category
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function getId()
	{
		return $this->id_category;
	}

	public function setDescription($description)
	{
		$this->description = $description;
	}

	public function setId($id)
	{
		$this->id_category = $id;
	}

}
?>