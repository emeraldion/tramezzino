<?php

namespace tramezzino;

function serialize($r, $b, $d, $a, $n = FALSE) {
  if ($r === null) {
    return '';
  }
  $l = array(&$r['l']);
  $c;
  if (count($r['c']) === 0) {
    return $l;
  }
  if (count($r['c']) === 1) {
    $c = array(serialize($r['c'][0], $b, $d, $a, true));
  }
  else {
    $c = array(implode($d, array_map(function($c) {
      global $b;
      global $d;
      global $a;

      return serialize($c, $b, $d, $a, true);
    }, $r['c'])));

    if ($n) {
      $c = array_merge(array($b), $c, array($a));
    }
  }
  return implode('', array_merge($l, $c));
}

?>