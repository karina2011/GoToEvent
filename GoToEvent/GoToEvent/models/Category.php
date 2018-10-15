<?php
namespace models;


require_once ('event.php');

/**
 * @author Federico
 * @version 1.0
 * @created 06-oct.-2018 19:11:32
 */
class Category
{

	private $description;
	public $m_Event;

	function __construct($description='',$m_Event='')
	{
		$this->description = $description;
		$this->m_Event = $m_Event;
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