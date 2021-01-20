<?php
	declare(strict_types=1);

	namespace App\Rules;
	use App\Traits\RulesTrait as RulesTrait;

	
	class NoSpace extends Rule implements RulesInterface {

		use RulesTrait;
		
		function __construct(string $content) {
			parent::__construct($content);
			$this->notEmpty();
		}

		public function validate():string {
			// if the string does not contain white spaces we return it
			if ($this->noWhiteSpaces()){
				return (string) $this->content;
			}else {
			//otherwise we remove all the white spaces
				return $this->strReplace('');

			}
		}

		public function error():void {
			
		}

		
	} 
