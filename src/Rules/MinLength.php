<?php
	declare(strict_types=1);

	namespace App\Rules;
	use App\Traits\RulesTrait as RulesTrait;

	
	class MinLength extends Length implements RulesInterface {

		use RulesTrait;
		
	
		function __construct(string $content, int $lengthValue) {
			$this->constructor($content);
			$this->lengthValue = $lengthValue;
			$this->notEmpty();
		}

		public function validate() {
			if (strlen($this->content) >= $this->lengthValue ) {
				$this->returnContent();
			}else{
				$this->error();
			}
		}

		public function error():void {
			$errorMsg = 'does not respect the specified length';
			$this->returnError($errorMsg);
		}

		
	} 
