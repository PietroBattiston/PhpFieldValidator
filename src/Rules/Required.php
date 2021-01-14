<?php
	declare(strict_types=1);

	namespace App\Rules;

	use App\Traits\RulesTrait as RulesTrait;


	class Required implements RulesInterface {

		use RulesTrait;

		public $content;
		public $error;
		
		function __construct(string $string) {
			$this->content = $string;
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
