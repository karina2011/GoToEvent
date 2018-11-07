<?php
namespace models;

class Event
{

	private $title;
	private $id_event;
	private $category;
	private $img;

	function __construct($title='',$category='', $img='' ,$id_event='')
	{
		$this->title = $title;
		$this->id_event=$id_event;
		$this->category = $category;
		$this->img = $img;

	}

	public function getTitle()
	{
		return $this->title;
	}

	public function getCategoryId()
	{
		return $this->category->getId();
	}

	public function getCategoryDescription()
	{
		return $this->category->getDescription();
	}

	public function getCategory()
	{
		return $this->category;
	}

	public function getId()
	{
		return $this->id_event;
	}

	public function setTitle($title)
	{
		$this->title = $title;
	}

	public function setCategory($category)
	{
		$this->category = $category;
	}

	public function getImg()
	{
		return $this->img;
	}

}
?>
