[![Build Status](https://travis-ci.org/emeraldion/tramezzino.svg?branch=master)](https://travis-ci.org/emeraldion/tramezzino)
[![Coverage Status](https://coveralls.io/repos/github/emeraldion/tramezzino/badge.svg?branch=master)](https://coveralls.io/github/emeraldion/tramezzino?branch=master)
[![Latest Unstable Version](https://poser.pugx.org/emeraldion/tramezzino/v/unstable)](https://packagist.org/packages/emeraldion/tramezzino)
[![composer.lock](https://poser.pugx.org/emeraldion/tramezzino/composerlock)](https://packagist.org/packages/emeraldion/tramezzino)
[![Total Downloads](https://poser.pugx.org/emeraldion/tramezzino/downloads)](https://packagist.org/packages/emeraldion/tramezzino)
[![Monthly Downloads](https://poser.pugx.org/emeraldion/tramezzino/d/monthly)](https://packagist.org/packages/emeraldion/tramezzino)

# tramezzino

Converts a list of strings into a compact, readable representation with delimiters of choice

```
tramezzino.php 'alba,albero,albergo,alberto'
# => alb(a|er(go|o|to))

tramezzino.php 'aria:arianna' ':' '[' '+' ']'
# => aria[+nna]
```

## What?

In Italian, [tramezzino](https://it.wiktionary.org/wiki/tramezzino) means sandwich. The name hints at the strings being sliced and interleaved with bread, the delimiters. Tramezzino is the PHP port of the Node module [sarnie](https://npm.im/sarnie).

## Why?

Useful when you need to pass long lists of URL params

## Composer

Add it to your PHP project using [Composer](https://getcomposer.org):

```sh
composer require emeraldion/tramezzino
```

Then have it your way:

```php
<?php
use Emeraldion\Tramezzino\Tramezzino;

$encoded = Tramezzino::encode(
	array('alba', 'albero', 'albergo', 'alberto'),
	'(',
	'|',
	')'
);
// $encoded == 'alb(a|er(go|o|to))'
?>
```

## License

[MIT](https://opensource.org/licenses/MIT)

Copyright (c) 2017, Claudio Procida
