<?php
	declare(strict_types=1);

	namespace pbattiston\PhpFieldValidator\Rules;

	use pbattiston\PhpFieldValidator\Traits\RulesTrait as RulesTrait;


	class Required extends Rule implements RulesInterface {

		use RulesTrait;
		
		function __construct(string $content) {
			parent::__construct($content);
			$this->validate();
		}

		public function validate():void {
			if (empty($this->content)) {
				$this->error();
			}
		}

		public function error():void {
			$errorMsg = 'is required but is empty';
			$this->returnError($errorMsg);
		}

		
	} 
