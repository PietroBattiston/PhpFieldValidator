<?php
	declare(strict_types=1);

	namespace App\Rules;
	
	interface RulesInterface {
		public function validate();
		public function error();
	}