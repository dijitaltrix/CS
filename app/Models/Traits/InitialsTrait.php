<?php

namespace App\Models\Traits;


trait InitialsTrait {
	
	/**
	 * Returns the capitalised initials of this Customers name
	 *
	 * @return string
	 */
	public function getInitialsAttribute() : string
	{
		$out = "";
		foreach (explode(' ', $this->name) as $str) {
			$out.= substr($str, 0, 1);
		}
		
		return (string) strtoupper($out);

	}
	
}