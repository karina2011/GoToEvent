<?php
namespace models;


require_once ('event.php');


class Category
{

	private $description;
	private $id_event;
	private $id_category;

	function __construct($description='',$id_event='',$id_category='')
	{
		$this->description = $description;
		$this->id_event = $id_event;
		$this->id_category = $id_category
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function setDescription($description)
	{
		$this->description = $description;
	}

}
?>