<?php 
	declare(strict_types=1);
	use PHPUnit\Framework\TestCase;
	use App\Rules\NoSpace;
	
	

	class NoSpaceTest extends TestCase {

		public $string;
		
		

		protected function setUp(): void {
			$this->stringWithSpace = 's t r i n g';
			$this->stringWithoutSpace = 'string';

			
		}

		public function test_a_string_without_space_must_be_returned_as_it_was():void {
			
			$noSpaceValidator = new NoSpace($this->stringWithoutSpace);

			$this->assertEquals($this->stringWithoutSpace, $noSpaceValidator->content);

		}

		public function test_a_string_with_space_must_be_returned_without():void {
			
			$noSpaceValidator = new NoSpace($this->stringWithSpace);

			$this->assertEquals($this->stringWithoutSpace, $noSpaceValidator->content);

		}
		  
	}