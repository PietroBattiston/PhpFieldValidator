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

		public $validateRequest;
		public $fields;
    	public $errors;
    	public $validatedContent;

		function __construct(array $validateRequest) {
			// it contains ['field-name'=>'rule|rule|rule']
    		$this->validateRequest = $validateRequest;
    		/* it contains 
    			['field-name'=> ['content'=>'content-to-validate','rules'=> 'rule|rule|rule'] ]*/
			$this->fields = [];
			// it contains ['field-name'=>'error']
    		$this->errors = [];
			// it contains ['field-name'=>'validated-content']
    		$this->validatedContent = [];
    	}




    	public function prepare():void{
    		foreach ($this->validateRequest as $field => $rule) {
    			// Store the body content and the rules inside an array with the field's name as index.
    			$this->fields[$field] = [
    				'content' => $this->getContent($field),
    				'rules' => $rule
    			];
    			
    			$rulesHandler = $this->toRulesHandler($this->fields);
    		}

    		$this->errors = $rulesHandler->errors;
    		$this->updateContent($rulesHandler->fields);
    	}

		public function validate() {

		}

		private function getContent(string $fieldName) {
			// Get the Body Content
      		return $_POST[$fieldName];
		}

		private function toRulesHandler(array $fields) {
			// Send the array with the field name, its content and the related rules to RulesHandler.
			$rulesHandler = new RulesHandler($fields);
			$rulesHandler->prepare();
			return $rulesHandler;
		}

		private function updateContent(array $validatedFields):void {
			foreach ($validatedFields as $key => $value) {
				$this->validatedContent[$key] = $value['content'];
			}
		}

		/*Custom Rules available in the next Version*/
		public function addCustomRules(array $rules):void {

		}

		




	}