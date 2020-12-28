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

		private $validator;

		protected function setUp(): void {
			$this->validator = new Validator;
		}
	   
		public function test_a_field_name_can_be_set(): void {

			$_POST['name'] = "string";

	       	$this->assertEquals('name', $this->validator->fieldName('name')->name);
				
		}

		public function test_a_string_can_be_recognized(): void {

	        $string = "String";
	      
	       	$this->assertIsBool($this->validator->isString($string));
	       	$this->assertEquals(true, $this->validator->isString($string));
    	}

    	public function test_a_string_can_be_sanitized(): void {
	       
	        $_POST['name'] = "<alert>String</alert>";
	        $this->validator->name = 'name';
	        $this->validator->content = $_POST['name'];

	        $this->assertNotEquals($this->validator->content, $this->validator->sanitize($this->validator->content)->content);
	        $this->assertEquals("String", $this->validator->sanitize($this->validator->content)->content);
    	}

    	public function test_an_email_can_be_recognized(): void {
   			
   			$email = "email@email.com";
   			
   			$this->assertIsBool($this->validator->isEmail($email));
	       	$this->assertEquals(true, $this->validator->isEmail($email));
   		}

   		public function test_a_field_can_be_required(): void {
   			
   			$this->assertIsBool($this->validator->required());
	       	$this->assertEquals(true, $this->validator->required());
   		}


   	}

