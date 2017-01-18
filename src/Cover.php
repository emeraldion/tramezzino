<?php

namespace Emeraldion\Tramezzino;

class Cover {

	static function cover($s, $x0 = 0, $y = 0, $l = NULL) {
		// Safe defaults
		$l = $l === NULL ? count($s) : $l;

		// Check bad input
		if ($x0 >= $l) {
			// Error: past assigned slice
			return FALSE;
		}
		if (!isset($s[$x0])) {
			// Error: past array length
			return FALSE;
		}

		if ($y > strlen($s[$x0]) - 1) {
			if ($x0 === $l - 1) {
				// Termination of rightmost string
				return array(NULL);
			}
			// The string at $x0 was only as long as y0, so call on the next item
			return array_merge(array(NULL), self::cover($s, $x0 + 1, $y, $l));
		}

		// Initialize non-trivial return structure
		$u = array('l' => $s[$x0][$y], 'c' => array());
		$r = array(&$u);

		// Spread in width until we find either the end, or a different char
		$x = $x0;
		$m;
		do {
			$m = FALSE;
			if ($x < $l &&
					$s[$x0][$y] === $s[$x][$y]) {
				$m = TRUE;
				$x++;
			}
		} while ($m);

		// If we haven't covered the full length of the assigned slice, launch
		// on the pair (x + 1, y0) with the original length l.
		if ($x < $l) {
			$r = array_merge($r, self::cover($s, $x, $y, $l));
		}

		// Launch on the tail of the string at s[$x0] from the position y
		$u['c'] = array_merge($u['c'], self::cover($s, $x0, $y + 1, $x));

		return $r;
	}
}

?>
