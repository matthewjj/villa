<?php

namespace App\Loaders;

class Database {

	private $table;

	public function __construct($table) {
		$this->table = $table; 
	}

	// public function byID($id) {

	// 	return $this->table::where($id)->first();
	// }
}