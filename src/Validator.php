<?php
	declare(strict_types=1);

	class Validator {
		public function isString(string $string) {
			return is_string($string);
		}

		public function sanitize(string $string) {
			if ($string) {
				$sanitized = filter_var($string, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
				return $sanitized;
			}

			return $this;
		}
	}