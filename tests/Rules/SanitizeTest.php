<?php 
	declare(strict_types=1);
	use PHPUnit\Framework\TestCase;
	use App\Rules\Sanitize;
	
	

	class SanitizeTest extends TestCase {

		public $fieldName ;

		protected function setUp(): void {
			$this->fieldName = 'name';
		}

		public function test_a_string_can_be_sanitized():void {
			$stringToSanitize = '<alert>string</alert>';

			$sanitize = new Sanitize($this->fieldName, $stringToSanitize);

			$this->assertNotEquals($stringToSanitize, $sanitize->content);
		}

		
		public function test_a_string_can_be_empty():void {
			$emptyString = '';
			$sanitize = new Sanitize($this->fieldName, $emptyString);
			

			$this->assertEmpty($sanitize->content);
		}


	   
	}