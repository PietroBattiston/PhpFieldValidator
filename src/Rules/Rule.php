<?php
	declare(strict_types=1);

	namespace App\Rules;
	use App\Traits\RulesTrait as RulesTrait;

	
	class Rule implements RulesInterface {

		use RulesTrait;
		
		public $content;
		public $error;
		
		function __construct($content) {
			$this->content = $content;
			$this->error = '';
		}

		public function validate() {
			

		}

		public function error():void {
			
		}	

		

		
	} 
