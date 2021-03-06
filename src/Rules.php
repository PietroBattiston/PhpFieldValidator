<?php
	declare(strict_types=1);
	namespace pbattiston\PhpFieldValidator;

	/**
	 * 
	 */
	class Rules {
		
		public $rules_list;
		public $rulesNamespace;

		function __construct() {

			$this->rules_list = [
				'sanitize' => 'Sanitize',
				'email' => 'Email',
				'required' => 'Required',
				'numeric' => 'Numeric',
				'length' => 'Length',
				'max' => 'MaxLength',
				'min' => 'MinLength',
				'type' => 'Type',
				'slug' => 'Slug',
				'nospace' => 'NoSpace',
			];

			$this->rulesNamespace = 'pbattiston\PhpFieldValidator\Rules\\';
			
		}


	}

