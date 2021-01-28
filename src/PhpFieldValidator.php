<?php
	declare(strict_types=1);

	//we set the field name
	// we get the content
	// we call any related Classes
	// we get the errors
	// we finalize
	namespace pbattiston\PhpFieldValidator;
	use pbattiston\PhpFieldValidator\Traits\StringTrait as StringTrait;

	class PhpFieldValidator {

		use StringTrait;

		public $fields;
    	public $content;
    	
    	public $error;
    	

    	public $validateRequest;

		function __construct(array $validateRequest) {
    		$this->validateRequest = $validateRequest;
    		$this->fields = [];
    		$this->errors = [];
    	}




    	public function prepare(){
    		foreach ($this->validateRequest as $field => $rule) {
    			// We store the body content and the rules inside an array with the field's name as index.
    			$this->fields[$field] = [
    				'content' => $this->getContent($field),
    				'rules' => $rule
    			];
    			
    			$rulesHandler = $this->toRulesHandler($this->fields);
    		}

    		$this->errors = $rulesHandler->errors;

    		return $rulesHandler;
    	}

		public function getError($message) {
			
			$this->errors[] = $this->error_manager->storeError($this->name, $message);
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
			$rulesHandler->prepare();
			return $rulesHandler;
		}


		public function addRules(array $rules):void {

		}

		




	}