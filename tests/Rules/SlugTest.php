<?php 
	declare(strict_types=1);
	use PHPUnit\Framework\TestCase;
	use App\Rules\Slug;
	
	

	class SlugTest extends TestCase {

		public $string;
		
		

		protected function setUp(): void {
			$this->sluggedString = 's-t-r-i-n-g';
			$this->notSluggedString = 's t r i n g';

			
		}

		public function test_a_slugged_string_must_be_returned_as_it_was():void {
			
			$slugValidator = new Slug($this->sluggedString);

			$this->assertEquals($this->sluggedString, $slugValidator->content);
		}

		public function test_a_Notslugged_string_must_be_returned_slugged():void {
			
			$slugValidator = new Slug($this->notSluggedString);

			$this->assertEquals($this->sluggedString, $slugValidator->content);
		}

		
	}