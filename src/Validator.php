<?php
	declare(strict_types=1);

	//we set the field name
	// we get the content
	// we call any related Classes
	// we get the errors
	// we finalize
	namespace App;
	use App\Traits\StringTrait as StringTrait;

	class Validator {

		use StringTrait;

		public $fields;
    	public $content;
    	public $required;
    	public $error;
    	private $error_manager;

    	public $validateRequest;

		function __construct(array $validateRequest) {
    		$this->validateRequest = $validateRequest;
    		$this->fields = [];


    		$this->required = FALSE;
    		$this->error = [];
    		$this->error_manager = new ErrorManager;
    	}




    	public function prepare(): void {
    		foreach ($this->validateRequest as $field => $rule) {
    			// We store the body content and the rules inside an array with the field's name as index.
    			$this->fields[$field] = [
    				'content' => $this->getContent($field),
    				'rules' => $rule
    			];
    			
    			$this->toRulesHandler($this->fields);

    		}
    	}


		public function sanitize() {
      		// We check if the Content is not empty and if is a string
		    if ($this->content && $this->isString($this->content)) {
		    	$string = new Sanitize($this->content);
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

		private function getContent(string $fieldName) {
			// We get the Body Content
      		return $_POST[$fieldName];
		}

		private function toRulesHandler(array $fields) {
			// We send the array with the field name, its content and the related rules to RulesHandler.
			$rulesHandler = new RulesHandler($fields);
		}

		




	}