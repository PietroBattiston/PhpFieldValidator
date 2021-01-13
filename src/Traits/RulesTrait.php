<?php
	declare(strict_types=1);
	namespace App\Traits;

	trait RulesTrait {

		public function notEmpty() {
			// If the content is not empty we call the validate method otherwise we set the content value as NULL
			$this->content = (!empty($this->content)) ? $this->validate() : NULL;
		}
	}