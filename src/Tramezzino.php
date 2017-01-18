<?php

namespace Emeraldion\Tramezzino;

use Emeraldion\Tramezzino\Cover;
use Emeraldion\Tramezzino\Parser;
use Emeraldion\Tramezzino\Serializer;

class Tramezzino {
	static function encode($s, $b, $d, $a) {
		sort($s);
		return Serializer::serialize(array(
			'l' => '',
			'c' => Cover::cover($s)
		), $b, $d, $a);
	}

	static function decode($s, $b, $d, $a) {
		return Parser::parse($s, $b, $d, $a);
	}
}

?>
