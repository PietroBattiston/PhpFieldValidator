<?php
	declare(strict_types=1);

	namespace pbattiston\PhpFieldValidator\Rules;
	
	interface RulesInterface {
		public function validate();
		public function error();
	}