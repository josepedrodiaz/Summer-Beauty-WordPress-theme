<?php

class Room{

	private $room_id;
	private $board;
	private $board_desc;
	private $value;

	public function getRoom_id()
	{
	    return $this->room_id;
	}
	
	public function setRoom_id($room_id)
	{
	    $this->room_id = $room_id;
	    return $this;
	}

	public function getBoard()
	{
	    return $this->board;
	}
	
	public function setBoard($board)
	{
	    $this->board = $board;
	    return $this;
	}

	public function getBoard_desc()
	{
	    return $this->board_desc;
	}
	
	public function setBoard_desc($board_desc)
	{
	    $this->board_desc = $board_desc;
	    return $this;
	}

	public function getValue()
	{
	    return $this->value;
	}
	
	public function setValue($value)
	{
	    $this->value = $value;
	    return $this;
	}
}


?>