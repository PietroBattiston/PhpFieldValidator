<?php 
	declare(strict_types=1);
	use PHPUnit\Framework\TestCase;

		// Our package must:
		// Check if the field exists
		// Check input type (string, file, etc)
		// Set a field as required
		// Sanitize strings
		// Verify email format
		// Verify telephone numbers format
		// Verify Postcodes format


		// Verify Date of birth
		// Verify Images
		// Accepts only given images extentions


	class UnitTest extends TestCase {

		public function test_an_input_type_can_be_recognized(): void {
	        $string = "String";
	        $validator = new Validator;

	       	$this->assertIsBool($validator->isString($string));


    	}

   	}