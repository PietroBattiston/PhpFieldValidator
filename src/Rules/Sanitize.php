<?php
	declare(strict_types=1);
	namespace App\Rules;

	use App\Traits\RulesTrait as RulesTrait; 


	class Sanitize implements RulesInterface {

		use RulesTrait;

		public $content;
		public $error;


		function __construct(string $content) {
			$this->constructor($content);
			$this->notEmpty();
		}

		public function validate():string {
			return filter_var($this->content, FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
			
		}

		public function error() {

		}
		
		       	
		
	}