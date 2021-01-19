<?php 
	declare(strict_types=1);
	use PHPUnit\Framework\TestCase;
	use App\Rules\MinLength;
	
	

	class MinLengthTest extends TestCase {

		public $string;
		
		protected function setUp(): void {
			// It generates a random string of the given length (8)
			$this->string = substr(str_shuffle(MD5(microtime())), 0, 8);
		}

		public function test_a_string_must_respect_the_specified_Min_length():void {

			$lenghtValidator = new MinLength($this->string, 5);
			
			$this->assertTrue(empty($lenghtValidator->error));

		}

		public function test_must_return_error_if_string_is_not_the_Min_Length():void {

			$lenghtValidator = new MinLength($this->string, strlen($this->string) + 1);

			$this->assertFalse(empty($lenghtValidator->error));

		}

	   
	}