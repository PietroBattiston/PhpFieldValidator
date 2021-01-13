<?php 
	declare(strict_types=1);
	use PHPUnit\Framework\TestCase;
	use App\Rules\Email;
	
	

	class EmailTest extends TestCase {

		
		protected function setUp(): void {
			
		}

		public function test_an_email_can_be_validated():void {
			$validEmail = 'email@email.com';
			$emailRule = new Email($validEmail);

			$this->assertEquals($validEmail, $emailRule->content);
			$this->assertTrue(empty($emailRule->error));

		}

		public function test_an_email_can_be_sanitized():void {
			$emailToSanitize = 'email@<email>.com';
			$emailRule = new Email($emailToSanitize);
			$sanitizedEmail = filter_var($emailToSanitize, FILTER_SANITIZE_EMAIL);

			$this->assertFalse(empty($emailRule->content));
			$this->assertEquals($sanitizedEmail, $emailRule->content);
			$this->assertTrue(empty($emailRule->error));

		}

		public function test_an_empty_email_must_return_a_NULL_content():void {
			$emptyEmail = '';
			$emailRule = new Email($emptyEmail);

			$this->assertNull($emailRule->content);
		}

		public function test_an_invalid_email_must_return_an_error():void {
			$invalidEmail = 'string';
			$emailRule = new Email($invalidEmail);

			$this->assertFalse(empty($emailRule->error));
			$this->assertNull($emailRule->content);
		}


		

	   
	}