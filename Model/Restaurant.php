<?php

namespace Model;

class Restaurant
{

	private $id;


	private $name;


	public function getId()
	{
		return $this->id;
	}

	public function setName($name)
	{
		$this->name = $name;

		return $this;
	}

	public function getName()
	{
		return $this->name;
	}
}
