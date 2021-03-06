<?php 
	declare(strict_types=1);
	use PHPUnit\Framework\TestCase;
	use pbattiston\PhpFieldValidator\Rules\Numeric;
	
	

	class NumericTest extends TestCase {

		public $fieldName;
		
		protected function setUp(): void {
			$this->fieldName = 'name';
		}

		public function test_a_numeric_value_can_be_recognized():void {
			$numericString = '1234';
			$numericValidator = new Numeric($numericString);

			$this->assertTrue(empty($numericValidator->error));
		}

		public function test_a_not_numeric_value_must_return_an_error():void {
			$notNumeric = 'abc';
			$numericValidator = new Numeric($notNumeric);

			$this->assertFalse(empty($numericValidator->error));
		}

		public function test_an_empty_value_must_return_null():void {
			$empty = '';
			$numericValidator = new Numeric($empty);

			$this->assertEquals($numericValidator->content, NULL);
		}


		

	   
	}