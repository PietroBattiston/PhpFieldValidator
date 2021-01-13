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
		private $Rulesnamespace;

    	function __construct(array $fields) {

    		$this->fields = $fields;
    		parent::__construct();

    		// We manually add the namespace bacause adding it dinamically above will cause an error inside callRelatedClass method. 
    		$this->Rulesnamespace = 'App\Rules\\';
    		
    	}




    	public function prepare() {
	    	foreach ($this->fields as $key => $value) {
	    		$content = $value['content'];
	    		// Rules are separated by |. We extract them
	    		$rules = explode('|', $value['rules']);
	    		$content = $this->callRelatedClass($content, $rules);
	    		$this->updateContent($key, $content);

	    	}
	    		
    	}

    	private function callRelatedClass(string $content, array $rules) {
    		foreach ($rules as $rule) {
    			$ruleToCall = $this->Rulesnamespace . $this->rules_list[$rule];
    			$validate = new $ruleToCall($content);
    			
    			return $validate->content;
    		}
    	}

    	private function updateContent(string $field_name, string $content) {
    		$this->fields[$field_name]['content'] = $content;
    	}


		public function getError($message) {
		
			$this->error[] = $this->error_manager->storeError($this->name, $message);
		}

		

		




	}