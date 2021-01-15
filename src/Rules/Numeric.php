<?php
	declare(strict_types=1);

	namespace App\Rules;

	use App\Traits\RulesTrait as RulesTrait;


	class Numeric implements RulesInterface {

		use RulesTrait;

		public $content;
		public $error;
		
		function __construct(string $content) {
			$this->content = $content;
			$this->error = '';
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
