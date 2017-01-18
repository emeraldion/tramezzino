<?php

namespace Emeraldion\Tramezzino;

class Args {

	static function parse() {
		global $argv;

		$i = 1;
		$str = $argv[$i++];
		$s = $argv[$i++];
		$p = $argv[$i++];
		$d = $argv[$i++];
		$t = $argv[$i++];

		$s = isset($s) ? $s : ',';
		$p = isset($p) ? $p : '(';
		$d = isset($d) ? $d : '|';
		$t = isset($t) ? $t : ')';

		return array(
			'string' => $str,
			'separator' => $s,
			'preamble' => $p,
			'delimiter' => $d,
			'terminator' => $t
		);
	}
}

?>
