<?php
	declare(strict_types=1);
	namespace App\Traits;

	trait CountTrait {

		public function count():int {
			return (int) strlen($this->content);
		}
		
	}