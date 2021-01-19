<?php
	declare(strict_types=1);

	namespace App\Rules;
	use App\Traits\RulesTrait as RulesTrait;

	
	class Length extends Rule implements RulesInterface {

		use RulesTrait;
		
		private $lengthValue;
		
		function __construct(string $content, int $lengthValue) {
			parent::__construct($content);
			$this->lengthValue = $lengthValue;
			$this->notEmpty();
		}

		public function validate() {
			if (strlen($this->content) == $this->lengthValue ) {
				$this->returnContent();
			}else{
				$this->error();
			}
		}

		public function error():void {
			$errorMsg = 'does not respect the specified length';
			$this->returnError($errorMsg);
		}	

		private function max() {
			if (strlen($this->content <= $this->lengthValue ) ) {
				$this->returnContent();
			}else{
				$this->error();
			}
		}

		
	} 
