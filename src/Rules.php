<?php
	declare(strict_types=1);
	namespace App;
	use App\Rules\Sanitize;
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
				'length' => 'Length'

			];

			$this->rulesNamespace = 'App\Rules\\';
		}
	}