<?php 
	declare(strict_types=1);
	use PHPUnit\Framework\TestCase;
	use pbattiston\PhpFieldValidator\Rules\Required;
	
	

	class RequiredTest extends TestCase {

		public $fieldName;

		protected function setUp(): void {
			$this->fieldName = 'name';
			
		}

		public function test_a_required_field_cannot_be_Empty():void {
			
			$empty = '';
			$requiredValidator = new Required($empty);

			$this->assertFalse(empty($requiredValidator->error));
		}

		public function test_a_filled_required_field_should_not_return_error():void {
			
			$notEmpty = 'abc';
			$requiredValidator = new Required($notEmpty);

			$this->assertTrue(empty($requiredValidator->error));
		}
	   
	}