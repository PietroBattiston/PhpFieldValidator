<?php 
	declare(strict_types=1);
	use PHPUnit\Framework\TestCase;

		// Our script must:
		// Check if the field exists
		// Check input type (string, file, etc)
		// Set a field as required
		// Sanitize strings OK
		// Verify email format
		// Verify telephone numbers format
		// Verify Postcodes format
		// Verify Date of birth
		// Verify Images
		// Accepts only given images extentions


	class UnitTest extends TestCase {

		public function test_a_field_name_can_be_set(): void {
			$validator = new Validator;
	       	$this->assertEquals('Surname', $validator->fieldName($_SERVER['POST'] = 'Surname')->name);
				
		}

		public function test_a_string_can_be_recognized(): void {
	        $string = "String";
	        $validator = new Validator;

	       	$this->assertIsBool($validator->isString($string));
	       	$this->assertEquals(true, $validator->isString($string));
    	}

    	public function test_a_string_can_be_sanitized(): void {
	        $string = "<alert>String</alert>";
	        $validator = new Validator;

	        $this->assertNotEquals($string, $validator->sanitize($string));
	        $this->assertEquals("String", $validator->sanitize($string));
    	}

   	}