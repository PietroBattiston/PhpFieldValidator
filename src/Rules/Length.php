<?php
	declare(strict_types=1);

	namespace pbattiston\PhpFieldValidator\Rules;
	use pbattiston\PhpFieldValidator\Traits\RulesTrait as RulesTrait;
	use pbattiston\PhpFieldValidator\Traits\CountTrait as CountTrait;

	
	class Length extends Rule implements RulesInterface {

		use RulesTrait;
		use CountTrait;

		private $lengthValue;
		
		function __construct(string $content, int $lengthValue) {
			parent::__construct($content);
			$this->lengthValue = $lengthValue;
			$this->notEmpty();
		}

		public function validate() {
			if ($this->count() == $this->lengthValue ) {
				return (string) $this->content;
			}else{
				$this->error();
			}
		}

		public function error():void {
			$errorMsg = 'does not respect the specified length';
			$this->returnError($errorMsg);
		}	

		private function max() {
			if (mb_strlen($this->content <= $this->lengthValue ) ) {
				return (string) $this->content;
			}else{
				$this->error();
			}
		}

		
	} 
