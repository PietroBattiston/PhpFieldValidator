<?php
	declare(strict_types=1);

	//we set the field name
	// we get the content
	// we call any related Classes
	// we get the errors
	// we finalize

	use Traits\StringTrait as StringTrait;

	class Validator {

		use StringTrait;

		public $fields;
		public $rules;
    	public $content;
    	public $required;
    	public $error;
    	private $error_manager;

    	public $validateRequest;

    	public function __construct(array $validateRequest) {
    		$this->validateRequest = $validateRequest;
    		$this->fields = [];
    		$this->rules = [];


    		$this->required = FALSE;
    		$this->error = [];
    		$this->error_manager = new ErrorManager;
    	}




    	public function prepare() {
    		foreach ($this->validateRequest as $field => $rule) {
    			$this->fields[$field] = $this->getContent($field);
    			$this->rules[] = explode("|", $rule);
    		}
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
			
			$this->error[] = $this->error_manager->storeError($this->name, $message);
		}

		public function validate() {

		}

		private function getContent($fieldName) {
			// We get the Body Content
      		return $_POST[$fieldName];
		}

		




	}