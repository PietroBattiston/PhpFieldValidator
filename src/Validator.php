<?php
	declare(strict_types=1);

	class Validator {

		public $name;
    	public $content;
    	public $required;
    	public $error;
    	private $error_manager;

    	public function __construct() {
    		$this->required = FALSE;
    		$this->error = [];
    		$this->error_manager = new ErrorManager;
    	}

    	
		public function fieldName($name) {
			$this->name = $name;
			$this->getContent();
			return $this;
		}


		public function sanitize() {
      		// We check if the Content is not empty and if is a string
		    if ($this->content && $this->isString($this->content)) {
		          $this->content = filter_var($this->content, FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
		       	
		       	return $this;
		    }

      		return $this;
		}


		public function isEmail(string $email) {
			// We check if the given input is a valid email
			return (boolean) filter_var($email, FILTER_VALIDATE_EMAIL);
		}

		public function isString(string $string) {
			// We check if the input is a string. It returns a bool
			return is_string($string);
		}

		public function required() {
			$this->required = TRUE;
			if (!$this->content) {
				$this->getError(' is required');
			}
			
			return $this;
		}

		public function getError($message) {
			
			array_push(
				$this->error, 
				$this->error_manager
				->storeError($this->name, $message)
			);
		}

		public function validate() {

			// try {
			// 	if ($this->required == TRUE && $this->content) {
			// 			throw CustomError::error1();
			// 	}	
			// } catch (CustomError $e) {
			// 	var_dump($e->getMessage());
			// }
			
		}

		private function getContent() {
			// We get the Body Content
      		$this->content = $_POST[$this->name];
		}

		




	}