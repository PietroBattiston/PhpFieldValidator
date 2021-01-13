<?php
	declare(strict_types=1);
	namespace App;
	use App\Rules\Sanitize;
	/**
	 * 
	 */
	class Rules {
		
		public $rules_list;

		function __construct() {
			$this->rules_list = [
				'sanitize' => 'Sanitize',
				'email' => 'Email',
				'required' => ''

			];
		}
	}