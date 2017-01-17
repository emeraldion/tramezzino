<?php

namespace tramezzino;

function usage() {
    print<<<EOT
Usage:
tramezzino <string> [<separator> [<child preamble> [<child separator> [<child terminator>]]]]

Examples:
tramezzino 'alba,albero,albino'
# => alb(a|ero|ino)
tramezzino 'alba:albero:albino' ':' '[' ',' ']'
# => alb[a,ero,ino]
EOT;

}

?>