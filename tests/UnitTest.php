<?php 
	declare(strict_types=1);
	use PHPUnit\Framework\TestCase;
	use PHPUnit\Framework\MockObject\MockObject;


		// Our script must:
		// Check if the field exists
		// Check input type (string, file, etc)
		// Set a field as required
		// Verify telephone numbers format
		// Verify Postcodes format
		// Verify Date of birth
		// Verify Images
		// Accepts only given images extentions


				//OK
		// Sanitize strings OK
		// Verify email format

	

	class UnitTest extends TestCase {

	   
		public function test_a_field_name_can_be_set(): void {
			$validator = new Validator;
			$_POST['name'] = "string";

	       	$this->assertEquals('name', $validator->fieldName('name')->name);
				
		}

		public function test_a_string_can_be_recognized(): void {
	        $string = "String";
	        $validator = new Validator;

	       	$this->assertIsBool($validator->isString($string));
	       	$this->assertEquals(true, $validator->isString($string));
    	}

    	public function test_a_string_can_be_sanitized(): void {
	        $validator = new Validator;
	        $_POST['name'] = "<alert>String</alert>";
	        $validator->name = 'name';
	        $validator->content = $_POST['name'];

	        $this->assertNotEquals($validator->content, $validator->sanitize($validator->content)->content);
	        $this->assertEquals("String", $validator->sanitize($validator->content)->content);
    	}

    	public function test_an_email_can_be_recognized(): void {
   			$validator = new Validator;
   			$email = "email@email.com";
   			
   			$this->assertIsBool($validator->isEmail($email));
	       	$this->assertEquals(true, $validator->isEmail($email));
   		}

   		public function test_a_field_can_be_required(): void {
   			$validator = new Validator;
   			
   			$this->assertIsBool($validator->required());
	       	$this->assertEquals(true, $validator->required());
   		}

   		
   	}

