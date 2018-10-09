<?php
namespace Package1;


require_once ('Event_square.php');



use Package1;
/**
 * @author Federico
 * @version 1.0
 * @created 06-oct.-2018 19:12:57
 */
class Type_square
{

	private $description;
	public $m_Event_square;

	function __construct($description='',$m_Event_square='')
	{
		$this->description = $description;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function setDescription()
	{
		$this->description = $description;
	}

}
?>