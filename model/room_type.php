<?php

	class RoomType{

		private $room_id;
		private $room_name_h;
		private $room_name_e;
		private $allocation;
		private $maxavail;
		private $rooms;
		
		public function getRoom_id()
		{
		    return $this->room_id;
		}
		
		public function setRoom_id($room_id)
		{
		    $this->room_id = $room_id;
		    return $this;
		}

		public function getRoom_name_h()
		{
		    return $this->room_name_h;
		}
		
		public function setRoom_name_h($room_name_h)
		{
		    $this->room_name_h = $room_name_h;
		    return $this;
		}


		public function getRoom_name_e()
		{
		    return $this->room_name_e;
		}
		
		public function setRoom_name_e($room_name_e)
		{
		    $this->room_name_e = $room_name_e;
		    return $this;
		}

		public function getAllocation()
		{
		    return $this->allocation;
		}
		
		public function setAllocation($allocation)
		{
		    $this->allocation = $allocation;
		    return $this;
		}

		public function getMaxavail()
		{
		    return $this->maxavail;
		}
		
		public function setMaxavail($maxavail)
		{
		    $this->maxavail = $maxavail;
		    return $this;
		}

		public function getRooms()
		{
		    return $this->rooms;
		}
		
		public function setRooms($rooms)
		{
		    $this->rooms = $rooms;
		    return $this;
		}
		

	}
?>