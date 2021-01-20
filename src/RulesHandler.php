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

    	function __construct(array $fields) {
    		$this->fields = $fields;
    		$this->errors = [];
    		parent::__construct();		
    	}

    	public function prepare() {
	    	foreach ($this->fields as $key => $value) {
	    		$content = $value['content'];
	    		// Rules are separated by |. We extract them
	    		$rules = explode('|', $value['rules']);
	    		$validation = $this->callRelatedClass($key, $content, $rules);
	    		//var_dump($validation['field-name']['content']);
	    		//$this->checkErrors($key, $validation->error);
	    	}
	    		
    	}

    	private function callRelatedClass(string $fieldName, string $content, array $rules) {
    		
    		$test = [];
    		foreach ($rules as $rule) {

    			$ruleWithParameter = $this->checkRuleWithParameter($rule);
    			if ($ruleWithParameter) {
    				$ruleToCall = $this->rulesNamespace . $this->rules_list[$ruleWithParameter[0]];
    				$parameter = $this->checkNumericParameter($ruleWithParameter[1]);
    				$validation = new $ruleToCall($content, $parameter);
    			}else{
    				$ruleToCall = $this->rulesNamespace . $this->rules_list[$rule];
    				$validation = new $ruleToCall($content);
    			}
    			$content = $validation->content;
    			var_dump($validation);
    			$this->checkErrors($fieldName, $validation);
    			
    		}

    	}

    	private function updateContent(string $fieldName, string $content):void {
    		$this->fields[$fieldName]['content'] = $content;
    	}


		private function checkErrors($fieldName, $validation):void {
			if ($validation->error) {
				$this->errors[$fieldName] = $validation->error;
			}else{
	    		$this->updateContent($fieldName, $validation->content);
			}

			//var_dump($this->fields[$fieldName]['content']);
			
		}

		private function checkRuleWithParameter(string $rule) {
			$rule = explode(':', $rule);
			if (count($rule) > 1) {
				return (array) $rule;
			}
		}

		private function checkNumericParameter(string $parameter) {
			if (is_numeric($parameter)) {
				return (int) intval($parameter);
			}else{
				return (string) $parameter;
			}
			
		}

		

		




	}