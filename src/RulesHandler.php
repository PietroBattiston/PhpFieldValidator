<?php
	declare(strict_types=1);
	namespace pbattiston\PhpFieldValidator;
	use pbattiston\PhpFieldValidator\Rules;
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

    	public function prepare():void {
	    	foreach ($this->fields as $key => $value) {
	    		$content = $value['content'];
	    		// Rules are separated by |. We extract them
	    		$rules = explode('|', $value['rules']);
	    		$validation = $this->validate($key, $content, $rules);
	    	}
	    		
    	}

    	private function validate(string $fieldName, string $content, array $rules):void {
	    	foreach ($rules as $rule) {
	    		if ($content !== NULL) {
		    		$ruleWithParameter = $this->checkRuleWithParameter($rule);
		    		if ($ruleWithParameter) {
		    			$ruleToCall = $this->rulesNamespace . $this->rules_list[$ruleWithParameter[0]];
		    			$parameter = $this->checkNumericParameter($ruleWithParameter[1]);
		    			$validation = $this->callRelatedClass ($ruleToCall, $content, $parameter);
		    		}else{
		    			$ruleToCall = $this->rulesNamespace . $this->rules_list[$rule];
		    			$validation = $this->callRelatedClass($ruleToCall, $content);
		    		}
		    		$content = $validation->content;
		    		$this->checkErrors($fieldName, $validation);
	    		}
	    	}


    	}

    	private function callRelatedClass(string $ruleToCall, string $content, $parameter = '') {
    		if ($parameter) {
    			$validation = new $ruleToCall($content, $parameter);
    		}else{
    			$validation = new $ruleToCall($content);
    		}
    		return $validation;
    	}


    	private function updateContent(string $fieldName, $content=''):void {
    		$this->fields[$fieldName]['content'] = $content;
    	}


		private function checkErrors($fieldName, $validation):void {
			if ($validation->error) {
				$this->errors[$fieldName] = $validation->error;
			}else{
	    		$this->updateContent($fieldName, $validation->content);
			}
			
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