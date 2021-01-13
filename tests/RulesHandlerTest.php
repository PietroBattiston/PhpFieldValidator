<?php 
	declare(strict_types=1);
	use PHPUnit\Framework\TestCase;
	use PHPUnit\Framework\MockObject\MockObject;
	use App\RulesHandler;



		// Our script must:
		// Check if the field exists
		// Check input type (string, file, etc)
		// Verify telephone numbers format
		// Verify Postcodes format
		// Verify Date of birth
		// Verify Images
		// Accepts only given images extentions


				//OK
		// Sanitize strings OK
		// Verify email format
		// Set a field as required

	

	class RulesHandlerTest extends TestCase {

		private $fields;


		protected function setUp(): void {
			$this->fields = [
				'field1' => [
					'content' => '<alert>string1</alert>',
					'rules' => 'sanitize|sanitize|sanitize'
				],
				'field2'=> [
					'content' => 'email@email.com',
					'rules' => 'email|sanitize|sanitize'
				]

			];

		}

		

		public function test_the_rules_handler_must_accept_one_parameter(): void {
			$rulesHandler = new RulesHandler($this->fields);
			$this->assertEquals($this->fields, $rulesHandler->fields);

		}

		public function test_every_rule_must_call_its_own_method(): void {
			$rulesHandler = new RulesHandler($this->fields);
			$rulesHandler->prepare();
			$toSanitize = $this->fields['field1']['content'];
			$sanitized = $rulesHandler->fields['field1']['content'];

			$this->assertNotEquals($toSanitize, $sanitized);
		}


	}

