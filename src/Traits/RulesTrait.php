<?php
	declare(strict_types=1);
	namespace App\Traits;

	trait RulesTrait {

		public function notEmpty():void {
			// If $content is not empty we call the validate method otherwise we set its value as NULL
			$this->content = (!empty($this->content)) ? $this->validate() : NULL;
		}

		public function returnError(string $errorMsg):void {
			$this->error = "$this->fieldName $errorMsg ($this->content)";
			var_dump($this->error);
		}
	}