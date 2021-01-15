<?php
	declare(strict_types=1);

	namespace App\Rules;

	use App\Traits\RulesTrait as RulesTrait;


	class Required implements RulesInterface {

		use RulesTrait;

		public $fieldName;
		public $content;
		public $error;
		
		function __construct(string $fieldName, string $content) {
			$this->fieldName = $fieldName;
			$this->content = $content;
			$this->error = '';
			$this->validate();
		}

		public function validate():void {
			if (empty($this->content)) {
				$this->error();
			}
		}

		public function error():void {
			$this->error = 'the field is required';
		}

		
	} 
