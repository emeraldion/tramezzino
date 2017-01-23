<?php

namespace Emeraldion\Tramezzino;

use Emeraldion\Tramezzino\Cover;
use Emeraldion\Tramezzino\Parser;
use Emeraldion\Tramezzino\Serializer;

class Tramezzino {
	static function encode($list, $preamble = '(', $delimiter = '|', $terminator = ')') {
		if (!is_array($list)) {
			return NULL;
		}
		sort($list);
		$cover = Cover::cover($list);
		if (!is_array($cover)) {
			return NULL;
		}
		return Serializer::serialize(array(
			'l' => '',
			'c' => $cover
		), $preamble, $delimiter, $terminator);
	}

	static function decode($str, $preamble = '(', $delimiter = '|', $terminator = ')') {
		return Parser::parse($str, $preamble, $delimiter, $terminator);
	}
}

?>
