<?php
	declare(strict_types=1);
	namespace App;

	//we set the field name
	// we get the content
	// we call any related Classes
	// we get the errors
	// we finalize


	class RulesHandler extends Rules {

		public $fields;
		public $errors;
		private $Rulesnamespace;

    	function __construct(array $fields) {

    		$this->fields = $fields;
    		$this->errors = [];
    		parent::__construct();

    		// We manually add the namespace bacause adding it dinamically above will cause an error inside callRelatedClass method. 
    		$this->Rulesnamespace = 'App\Rules\\';
    		
    	}

    	public function prepare() {
	    	foreach ($this->fields as $key => $value) {
	    		$content = $value['content'];
	    		// Rules are separated by |. We separate them
	    		$rules = explode('|', $value['rules']);
	    		$validation = $this->callRelatedClass($key, $content, $rules);
	    		$this->checkErrors($key, $validation);
	    	}
	    		
    	}

    	private function callRelatedClass(string $fieldName, string $content, array $rules) {
    		foreach ($rules as $rule) {
    			$ruleToCall = $this->Rulesnamespace . $this->rules_list[$rule];
    			$validation = new $ruleToCall($content);
    			return $validation;
    		}
    	}

    	private function updateContent(string $fieldName, string $content) {
    		$this->fields[$fieldName]['content'] = $content;
    	}


		private function checkErrors($fieldName, $validation) {
			if ($validation->error) {
				$this->errors[$fieldName] = $validation->error;
			}else{
	    		$this->updateContent($fieldName, $validation->content);
			}
			
		}

		

		




	}