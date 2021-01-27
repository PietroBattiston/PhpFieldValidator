<?php
	declare(strict_types=1);
	namespace App\Traits;

	trait CountTrait {

		public function count():int {
			return (int) mb_strlen($this->content);
		}
		
	}