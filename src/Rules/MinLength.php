<?php
	declare(strict_types=1);

	namespace pbattiston\PhpFieldValidator\Rules;
	use pbattiston\PhpFieldValidator\Traits\RulesTrait as RulesTrait;

	
	class MinLength extends Length implements RulesInterface {

		use RulesTrait;
	
		function __construct(string $content, int $lengthValue) {
			$this->lengthValue = $lengthValue;
			parent::__construct($content, $lengthValue);
			$this->notEmpty();
		}

		public function validate() {
			if ($this->count() >= $this->lengthValue ) {
				return (string) $this->content;
			}else{
				$this->error();
			}
		}

		public function error():void {
			$errorMsg = "does not respect the specified Min Length: $this->lengthValue";
			$this->returnError($errorMsg);
		}

		
	} 
