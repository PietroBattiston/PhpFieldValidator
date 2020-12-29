<?php
	declare(strict_types=1);

	class CustomError extends Exception {

		public static function error1() {
			//$x = $this->h;
	        return new static('Error');
    	}




	}