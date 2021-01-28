<?php 
	declare(strict_types=1);
	use PHPUnit\Framework\TestCase;
	use pbattiston\PhpFieldValidator\Rules\Length;
	
	

	class LengthTest extends TestCase {

		private $string;
		private $specialChars;

		
		protected function setUp(): void {
			$this->string = uniqid();
			$this->specialChars = 'ö';

		}

		public function test_a_string_must_respect_the_specified_length():void {

			$lenghtValidator = new Length($this->string, strlen($this->string));

			$this->assertTrue(empty($lenghtValidator->error));

		}

		public function test_it_must_return_error_if_doesnt_respect_length():void {
			$lenghtValidator = new Length($this->string,0);

			$this->assertFalse(empty($lenghtValidator->error));

		}

		public function test_special_chars_length():void {
			$lenghtValidator = new Length($this->specialChars,1);
			
			$this->assertTrue(empty($lenghtValidator->error));

		}
	   
	}