<?php
	declare(strict_types=1);

	namespace App\Rules;
	use App\Traits\RulesTrait as RulesTrait;

	
	class Length implements RulesInterface {

		use RulesTrait;
		
		public $content;
		public $lengthValue;
		public $error;
		
		function __construct(string $content, int $lengthValue) {
			$this->content = $content;
			$this->error = '';
			$this->lengthValue = $lengthValue;
			$this->notEmpty();
		}

		public function validate() {
			if (strlen($this->content) == $this->lengthValue ) {
				return (string) $this->content;
			}else{
				$this->error();
			}
		}

		public function error():void {
			$errorMsg = 'does not respect the specified length';
			$this->returnError($errorMsg);
		}

		
	} 
