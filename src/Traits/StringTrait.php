<?php
	declare(strict_types=1);
	namespace pbattiston\PhpFieldValidator\Traits;

	trait StringTrait {

		public function isString(string $string): bool {
			return is_string($string);
		}

		public function isEmail(string $email): bool {
			return (boolean) filter_var($email, FILTER_VALIDATE_EMAIL);
		}
	}