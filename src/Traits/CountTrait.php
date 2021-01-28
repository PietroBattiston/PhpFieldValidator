<?php
	declare(strict_types=1);
	namespace pbattiston\PhpFieldValidator\Traits;

	trait CountTrait {

		public function count():int {
			return (int) mb_strlen($this->content);
		}
		
	}