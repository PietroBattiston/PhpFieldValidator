<?php
	declare(strict_types=1);
	namespace App\Rules;

	class Sanitize implements RulesInterface {

		public $content;

		function __construct(string $string) {
			$this->content = $string;
			$this->content = $this->validate();
			
		}

		public function validate():string {
			return filter_var($this->content, FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
			
		}

		public function error() {

		}
		
		       	
		
	}