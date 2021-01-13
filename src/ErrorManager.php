<?php
	declare(strict_types=1);
	namespace App;
	
	class ErrorManager extends Validator {

    	public $error;
    	public $name;

    	function __construct() {
    		$this->error = [];
    	}

		public function storeError($name, $message) {
			array_push(
				$this->error, 
				$name . $message
			);
			
			return $this->error;
		}




	}