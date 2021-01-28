<?php
	declare(strict_types=1);
	namespace pbattiston\PhpFieldValidator\Rules;

	use pbattiston\PhpFieldValidator\Traits\RulesTrait as RulesTrait; 


	class Sanitize extends Rule implements RulesInterface {

		use RulesTrait;


		function __construct(string $content) {
			parent::__construct($content);
			$this->notEmpty();
		}

		public function validate():string {
			return filter_var($this->content, FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
			
		}

		public function error():void {

		}
		
		       	
		
	}