<?php
	declare(strict_types=1);
	namespace App\Traits;

	trait StringTrait {

		public function isString(string $string): bool {
			// We check if the input is a string. It returns a bool
			return is_string($string);
		}

		public function isEmail(string $email): bool {
			// We check if the input is a valid email
			return (boolean) filter_var($email, FILTER_VALIDATE_EMAIL);
		}
	}