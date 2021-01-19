<?php
	declare(strict_types=1);

	namespace App\Rules;
	use App\Traits\RulesTrait as RulesTrait;

	
	class Type extends Rule implements RulesInterface {

		use RulesTrait;

		private $type;
		
		function __construct($content, string $type) {
			parent::__construct($content);
			$this->type = $type;
			$this->notEmpty();
		}

		public function validate() {
			if (gettype($this->content) == $this->type) {
				return $this->content;
			}else {
				$this->error();
			}
		}

		public function error():void {
			$errorMsg = "is not of the type $this->type";
			$this->returnError($errorMsg);
		}

		
	} 
