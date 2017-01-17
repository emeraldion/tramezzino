[![Build Status](https://travis-ci.org/claudiopro/tramezzino.svg?branch=master)](https://travis-ci.org/claudiopro/tramezzino)

# tramezzino

Converts a list of strings into a compact, readable representation with delimiters of choice

```
tramezzino 'alba,albero,albergo,alberto'
# => alb(a|er(go|o|to))

tramezzino 'aria:arianna' ':' '[' '+' ']'
# => aria[+nna]
```

# what?

In Italian, [tramezzino](https://it.wiktionary.org/wiki/tramezzino) means sandwich. The name hints at the strings being sliced and interleaved with bread, the delimiters. Tramezzino is the PHP port of the Node module [sambo](https://npm.im/sambo).

# why?

Useful when you need to pass long lists of URL params

# license

Copyright (c) 2017, Claudio Procida

[MIT](https://opensource.org/licenses/MIT)
