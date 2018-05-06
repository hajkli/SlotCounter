<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{



public $positions = [
	0 => ['id' => 1, 'occupied' => 0],
	1 => ['id' => 2, 'occupied' => 1],
	2 => ['id' => 3, 'occupied' => 1],
	3 => ['id' => 4, 'occupied' => 0],
	4 => ['id' => 5, 'occupied' => 0],
	5 => ['id' => 6, 'occupied' => 0],
	6 => ['id' => 7, 'occupied' => 0],
	7 => ['id' => 8, 'occupied' => 0],
];


	public function getPositions()
	{
		return $this->positions;
	}

	/**
	 * @param mixed $name
	 */
	public function setPositions($name)
	{
		// later
	}






}
