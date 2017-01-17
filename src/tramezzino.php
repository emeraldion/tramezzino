<?php

	namespace tramezzino;

	require_once(__DIR__ . '/../src/cover.php');
	require_once(__DIR__ . '/../src/serialize.php');

	function tramezzino($s, $b, $d, $a) {
  		sort($s);
  		return \tramezzino\serialize(array(
    		'l' => '',
    		'c' => \tramezzino\cover($s)
  		), $b, $d, $a);
	}

?>