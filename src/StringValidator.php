<?php
	class StringValidator {

		public $content;

		public function __construct($string) {
			$this->content = $string;
		}

		public function sanitize() {
			return filter_var($this->content, FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
		}
		
		       	
		
	}