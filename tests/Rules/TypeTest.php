<?php 
	declare(strict_types=1);
	use PHPUnit\Framework\TestCase;
	use App\Rules\Type;
	
	

	class TypeTest extends TestCase {

		public $string;
		public $array;
		public $object;
		public $boolean;
		public $types;
		

		protected function setUp(): void {
			$this->string = 'string';
			$this->array = ['array'];
			$this->object =  new stdClass();
			$this->boolean = TRUE;

			$this->types = [$this->string, $this->array, $this->object, $this->boolean];
		}

		public function test_if_the_type_is_correct_must_not_return_error():void {
			
			foreach ($this->types as $type) {
				$typeValidator = new Type($type, gettype($type));
			}
			
			$this->assertTrue(empty($typeValidator->error));

		}

		public function test_if_the_type_is_incorrect_must_return_error():void {

			$stringType = gettype($this->string);
			$typeValidator = new Type($this->array, $stringType);

			$this->assertFalse(empty($typeValidator->error));

		}

		

	   
	}