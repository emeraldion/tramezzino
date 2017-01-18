<?php

namespace Emeraldion\Tramezzino;

class Usage {

	static function usage() {
	    print<<<EOT
Usage:
	tramezzino.php <string> [<separator> [<child preamble> [<child separator> [<child terminator>]]]]

Examples:
	tramezzino.php 'alba,albero,albino'
	# => alb(a|ero|ino)

	tramezzino.php 'alba:albero:albino' ':' '[' ',' ']'
	# => alb[a,ero,ino]

EOT;

	}
}

?>
