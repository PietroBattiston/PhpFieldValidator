<?php
	declare(strict_types=1);

	namespace App\Rules;
	use App\Traits\RulesTrait as RulesTrait;

	
	class Email implements RulesInterface {

		use RulesTrait;
		
		public $content;
		public $error;
		
		function __construct(string $content) {
			$this->constructor($content);
			$this->notEmpty();
		}

		public function validate() {
			if ($this->isValidEmail($this->sanitize($this->content))) {
				return (string) $this->content;

			}else {
				$this->error();
			}
		}

		public function error():void {
			$errorMsg = 'is not a valid email';
			$this->returnError($errorMsg);
		}

		private function sanitize(string $content):string {
			$this->content = filter_var($content, FILTER_SANITIZE_EMAIL);
			return (string) $this->content;
		} 

		private function isValidEmail(string $content):bool {
			return (boolean) filter_var($content, FILTER_VALIDATE_EMAIL);
		}
	} 
