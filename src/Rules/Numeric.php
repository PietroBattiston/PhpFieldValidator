<?php
	declare(strict_types=1);

	namespace App\Rules;

	use App\Traits\RulesTrait as RulesTrait;


	class Numeric extends Rule implements RulesInterface {

		use RulesTrait;

	
		function __construct(string $content) {
			parent::__construct($content);
			$this->notEmpty();
		}

		public function validate() {
			if (is_numeric($this->content)) {
				return (string) $this->content;
			}else{
				$this->error();
			}
		}

		public function error():void {
			$errorMsg = 'is not a number';
			$this->returnError($errorMsg);
		}

		
	} 
