<?php
	declare(strict_types=1);
	namespace pbattiston\PhpFieldValidator\Traits;

	trait RulesTrait {

		public function notEmpty():void {
			// If $content is not empty we call the validate method otherwise we set its value as NULL
			$this->content = (!empty($this->content)) ? $this->validate() : NULL;
		}

		public function returnError(string $errorMsg):void {
			$this->error = $errorMsg;
		}

		public function noWhiteSpaces():bool {
			// The line below fix a bug related to strpos; having a whitespace at the beginning of the string will cause the fail of the strpos check.
			//we remove whitespaces at the beginning/end of the string with trim
			$this->content = trim($this->content);
			if (strpos($this->content, ' ') == FALSE) {
				return TRUE;
			}
			return FALSE;
		}

		public function strReplace($replacement):string {
			return str_replace(' ', $replacement, $this->content);
		}

		

		
	}