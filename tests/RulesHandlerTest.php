<?php 
	declare(strict_types=1);
	use PHPUnit\Framework\TestCase;
	use PHPUnit\Framework\MockObject\MockObject;
	use pbattiston\PhpFieldValidator\RulesHandler;

	

	class RulesHandlerTest extends TestCase {


		protected function setUp(): void {
			$this->field = [
				'field-name' => [
					'content' => '<alert>string1</alert>',
					'rules' => 'sanitize|email|required'
				]
			];

			$this->validField = [
				'field-name'=> [
					'content' => 'hello@mail.com',
					'rules' => 'email|required'
				]
			];

			$this->invalidField = [
				'field-name'=> [
					'content' => 'not-an-email',
					'rules' => 'email|sanitize'
				]
			];

			$this->ruleWithParameters = [
				'field-name'=> [
					'content' => '<alert> a b c </alert>',
					'rules' => 'sanitize|slug|max:1'

				]
			];

			$this->multipleFields = [
				'field-name'=> [
					'content' => 'abc',
					'rules' => 'type:boolean'

				],
				'field-name2'=> [
					'content' => 'abc',
					'rules' => 'max:1'

				]
			];

			$this->specialChars = [
				'field-name'=> [
					'content' => 'Schrödinger',
					'rules' => 'sanitize'

				]
			];

		}

		public function test_the_rules_handler_must_accept_one_parameter(): void {
			$rulesHandler = new RulesHandler($this->field);
			$this->assertEquals($this->field, $rulesHandler->fields);

		}

		public function test_every_rule_must_call_its_own_method(): void {
			$rulesHandler = new RulesHandler($this->field);
			$rulesHandler->prepare();
			$toSanitize = $this->field['field-name']['content'];
			$sanitized = $rulesHandler->fields['field-name']['content'];

			$this->assertNotEquals($toSanitize, $sanitized);
		}

		public function test_after_calling_rules_must_update_content_of_valid_field(): void {
			$rulesHandler = new RulesHandler($this->ruleWithParameters);
			$rulesHandler->prepare();
			$validField = $this->ruleWithParameters['field-name']['content'];
			$this->assertNotEquals($validField, $rulesHandler->fields['field-name']['content']);
		}

		public function test_must_have_errors_if_field_is_invalid(): void {
			$rulesHandler = new RulesHandler($this->invalidField);
			$rulesHandler->prepare();
			$invalidField = $this->invalidField['field-name']['content'];

			$this->assertFalse(empty($rulesHandler->errors));
		}

		public function test_must_NOT_have_errors_if_field_is_valid(): void {
			$rulesHandler = new RulesHandler($this->validField);
			$rulesHandler->prepare();
			$validField = $this->validField['field-name']['content'];

			$this->assertTrue(empty($rulesHandler->errors));
		}

		public function test_an_error_must_contain_FieldName_and_ErrorMsg(): void {
			$rulesHandler = new RulesHandler($this->invalidField);
			$rulesHandler->prepare();

			$this->assertEquals(key($this->invalidField), key($rulesHandler->errors));
			$this->assertFalse(empty($rulesHandler->errors[key($this->invalidField)]));
		}

		public function test_rules_can_have_parameters(): void {
			$rulesHandler = new RulesHandler($this->ruleWithParameters);
			$rulesHandler->prepare();
			$this->assertEquals(count($rulesHandler->errors), 1);

		}


		public function test_must_returns_multiple_errors_if_multiple_invalid_fields(): void {
			$rulesHandler = new RulesHandler($this->multipleFields);
			$rulesHandler->prepare();
			

			$this->assertEquals(count($rulesHandler->errors), 2);

		}

		// public function test_a_custom_rule_can_be_used(): void {

		// 	$fieldWithCustomRule = [
		// 		'field-name'=> [
		// 			'content' => 'abc',
		// 			'rules' => 'dioporco'

		// 		]
		// 	];

		// 	$customRule = ['slug' => 'Slug'];
		// 	$rulesHandler = new RulesHandler($fieldWithCustomRule, $customRule);
		// 	$rulesHandler->prepare();
			
		// 	var_dump($rulesHandler);
		// 	$this->assertEquals(count($rulesHandler->errors), 2);

		// }


		





	}

