<?php

class Book {

	private $hotel_id;
	private $hotel_name_h;
	private $hotel_name_e;
	private $hotel_currency;
	private $date_range_from;
	private $date_range_to;
	private $adults;
	private $child;
	private $babies;
	private $room_type;

	
	public function getHotel_id()
	{
	    return $this->hotel_id;
	}
	
	public function setHotel_id($hotel_id)
	{
	    $this->hotel_id = $hotel_id;
	    return $this;
	}

	public function getHotel_name_h()
	{
	    return $this->hotel_name_h;
	}
	
	public function setHotel_name_h($hotel_name_h)
	{
	    $this->hotel_name_h = $hotel_name_h;
	    return $this;
	}

	public function getHotel_name_e()
	{
	    return $this->hotel_name_e;
	}
	
	public function setHotel_name_e($hotel_name_e)
	{
	    $this->hotel_name_e = $hotel_name_e;
	    return $this;
	}

	public function getHotel_currency()
	{
	    return $this->hotel_currency;
	}
	
	public function setHotel_currency($hotel_currency)
	{
	    $this->hotel_currency = $hotel_currency;
	    return $this;
	}

	public function getDate_range_from()
	{
	    return $this->date_range_from;
	}
	
	public function setDate_range_from($date_range_from)
	{
	    $this->date_range_from = $date_range_from;
	    return $this;
	}

	public function getDate_range_to()
	{
	    return $this->date_range_to;
	}
	
	public function setDate_range_to($date_range_to)
	{
	    $this->date_range_to = $date_range_to;
	    return $this;
	}

	public function getAdults()
	{
	    return $this->adults;
	}
	
	public function setAdults($adults)
	{
	    $this->adults = $adults;
	    return $this;
	}

	public function getChild()
	{
	    return $this->child;
	}
	
	public function setChild($child)
	{
	    $this->child = $child;
	    return $this;
	}

	public function getBabies()
	{
	    return $this->babies;
	}
	
	public function setBabies($babies)
	{
	    $this->babies = $babies;
	    return $this;
	}

	public function getRoom_type()
	{
	    return $this->room_type;
	}
	
	public function setRoom_type($room_type)
	{
	    $this->room_type = $room_type;
	    return $this;
	}
	

}

?>