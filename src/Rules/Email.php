<?php
	declare(strict_types=1);

	namespace App\Rules;
	use App\Traits\RulesTrait as RulesTrait; 

	/**
	 * field name =>|[
	 ] content,
	  error
	 */
	class Email implements RulesInterface {

		use RulesTrait;

		public $content;
		public $error;
		
		function __construct(string $string) {
			$this->content = $string;
			$this->error = '';
			$this->notEmpty();
			//$this->content = $this->validate();

		}

		public function validate() {
			if ($this->isValidEmail($this->sanitize($this->content))) {
				return (string) $this->content;
			}else {
				$this->error();
			}
		}

		public function error() {
			$this->error = 'not a valid email';
		}

		private function sanitize(string $content):string {
			$this->content = filter_var($content, FILTER_SANITIZE_EMAIL);
			return (string) $this->content;
		} 

		private function isValidEmail(string $content):bool {
			return (boolean) filter_var($content, FILTER_VALIDATE_EMAIL);
		}
	} 
