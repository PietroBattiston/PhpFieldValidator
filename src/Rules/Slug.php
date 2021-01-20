<?php
	declare(strict_types=1);

	namespace App\Rules;
	use App\Traits\RulesTrait as RulesTrait;

	
	class Slug extends Rule implements RulesInterface {

		use RulesTrait;
		
		function __construct(string $content) {
			parent::__construct($content);
			$this->notEmpty();
		}

		public function validate():string {
			// if the string does not contain white spaces we return it
			if ($this->noWhiteSpaces()) {
				return (string) $this->content;
			}else {
			//otherwise we replace all the white spaces with -
				return $this->strReplace('-');
			}
		}

		public function error():void {
			
		}

		
	} 
