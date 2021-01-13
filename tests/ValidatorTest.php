<?php 
	// declare(strict_types=1);
	// use PHPUnit\Framework\TestCase;
	// use PHPUnit\Framework\MockObject\MockObject;
	// use App\Validator;


	// 	// Our script must:
	// 	// Check if the field exists
	// 	// Check input type (string, file, etc)
	// 	// Check the lenght
	// 	// Verify telephone numbers format
	// 	// Verify Postcodes format
	// 	// Verify Date of birth
	// 	// Verify Images
	// 	// Accepts only given images extentions


	// 			//OK
	// 	// Sanitize strings OK
	// 	// Verify email format
	// 	// Set a field as required

	

	// class ValidatorTest extends TestCase {

	// 	private $validator;

	// 	protected function setUp(): void {
	// 		$this->validator = new Validator([
	// 			'field1' => 'sanitize|required',
	// 			'field2' => 'sanitize|required'

	// 		]);

	// 		$_POST['field1'] = "string1";
	// 		$_POST['field2'] = "string2";
	// 	}
	   
	// 	public function test_a_field_name_can_be_set(): void {

	// 		$this->validator->prepare();
			
	// 		$this->assertEquals('field1', array_key_first($this->validator->fields));
				
	// 	}

	// 	public function test_a_request_body_can_be_retrieved(): void {
			
	// 		$this->validator->prepare();

	// 		$this->assertEquals('string1', array_values($this->validator->fields)[0]['content']);
	// 	}

	// 	public function test_rules_can_be_set(): void {
			
	// 		$this->validator->prepare();
			
	// 		$this->assertTrue(isset($this->validator->fields));
	// 		$this->assertTrue(!empty($this->validator->fields));

	// 	}

	// 	public function test_a_string_can_be_recognized(): void {

	//         $string = "String";
	      
	//        	$this->assertIsBool($this->validator->isString($string));
	//        	$this->assertEquals(true, $this->validator->isString($string));
 //    	}

 //    	public function test_a_string_can_be_sanitized(): void {
	       
	//         $_POST['name'] = "<alert>String</alert>";
	//         $this->validator->name = 'name';
	//         $this->validator->content = $_POST['name'];

	//         $this->assertNotEquals($this->validator->content, $this->validator->sanitize($this->validator->content)->content);
	//         $this->assertEquals("String", $this->validator->sanitize($this->validator->content)->content);
 //    	}

 //    	public function test_an_email_can_be_recognized(): void {
   			
 //   			$email = "email@email.com";
   			
 //   			$this->assertIsBool($this->validator->isEmail($email));
	//        	$this->assertEquals(true, $this->validator->isEmail($email));
 //   		}

   		// public function test_a_field_can_be_required(): void {
   			
   		// 	//$this->assertIsBool($this->validator->required()->required);
	    //    //	$this->assertEquals(true, $this->validator->required()->required);
   		// }

   		// public function test_a_field_cannot_be_empty_if_required(): void {
   			
   		// 	$this->validator->content = '';
   		// 	$this->validator->name = 'field';

   		// 	$this->validator->required()->validate();

   		// 	$this->assertIsBool($this->validator->required);
   		// 	$this->assertFalse(empty($this->validator->error));
   		// }


   //	}
