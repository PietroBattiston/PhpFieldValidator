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
			if (strpos($this->content, ' ') == FALSE) {
				return (string) $this->content;
			}else {
			//otherwise we replace all the white spaces with -
				return (string) str_replace(' ', '-', $this->content);
			}
		}

		public function error():void {
			
		}

		
	} 
