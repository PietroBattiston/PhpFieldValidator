<?php
	declare(strict_types=1);

	namespace App\Rules;

	
	class Rule {
			
		public $content;
		public $error;
		
		function __construct($content) {
			$this->content = $content;
			$this->error = '';
		}
	
	} 
