<?php 

	declare(strict_types=1);
	use PHPUnit\Framework\TestCase;
	use pbattiston\PhpFieldValidator\PhpFieldValidator;


	class ValidatorTest extends TestCase {



		protected function setUp(): void {
	 		$this->validator = new PhpFieldValidator([
	 			'field1' => 'max:2|required',
	 			'field2' => 'sanitize|email',
	 		]);

	 		$_POST['field1'] = "string1";
			$_POST['field2'] = "string2";
			
		}

		public function test_a_field_name_can_be_set(): void {

			$this->validator->prepare();
			
	 		$this->assertEquals('field1', array_key_first($this->validator->fields));
				
	 	}

	 	public function test_a_request_body_can_be_retrieved(): void {
			
			$this->validator->prepare();

 			$this->assertEquals('string1', array_values($this->validator->fields)[0]['content']);
		}
		public function test_rules_can_be_set(): void {
			
	 		$this->validator->prepare();
			
	 		$this->assertTrue(isset($this->validator->fields));
	 		$this->assertTrue(!empty($this->validator->fields));

	 	}

		public function test_validator_must_have_errors_if_validation_fails(): void {

			$this->validator->prepare();
			$this->assertTrue(!empty($this->validator->errors));


		}

		public function test_a_field_can_be_empty(): void {

			$_POST['empty'] = '';
			$validator = $this->validator = new PhpFieldValidator([
	 			'empty' => 'max:2|required',
	 		]);


			$this->validator->prepare();
			$this->assertEquals(NULL, $validator->validatedContent['empty']);
			$this->assertEquals(0, count($validator->errors));
		}

		/*Custom Rules available in the next Version*/
		// public function test_a_custom_rule_can_be_added(): void {
		// 	$customRule = ['customRule' => 'customClass'];
		// 	$this->validator->addCustomRules($customRule);
		// 	$this->assertEquals(0, count($this->validator->errors));


			
		// }

	


	}

