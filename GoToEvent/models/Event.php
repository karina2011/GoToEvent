<?php
namespace Package1;


require_once ('Calendar.php');



use Package1;
/**
 * @author Federico
 * @version 1.0
 * @created 06-oct.-2018 19:11:50
 */
class Event
{

	private $title;
	public $m_Calendar;

	function __construct($title='',$m_Calendar='')
	{
		$this->title = $title;
		$this->m_Calendar = $m_Calendar;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function setTitle($title)
	{
		$this->title = $title;
	}

}
?>