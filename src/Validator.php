<?php
	declare(strict_types=1);

	//we set the field name
	// we get the errors
	// we finalize the validation

	use Traits\StringTrait as StringTrait;

	class Validator {

		use StringTrait;

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
		    	$string = new StringValidator($this->content);
		    	$this->content  = $string->sanitize();
		    }

      		return $this;
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
				$this->error_manager->storeError($this->name, $message)
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