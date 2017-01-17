<?php

namespace tramezzino;

function parser($str, $b, $d, $p) {
  $s = array();
  $i = 0;
  $j = 0;
  $k = 0;

  while ($i < strlen($str)) {
    if (strpos(substr($str, $i), $b) === 0) { // (
      $t = isset($s[$j + $k]) ? $s[$j + $k] : '';
      array_splice($s, $j + $k + 1, 0, $t);
      $i += strlen($b);
    }
    else if (strpos(substr($str, $i), $d) === 0) { // |
      $k++;
      $t = isset($s[$j + $k]) ? $s[$j + $k] : '';
      array_splice($s, $j + $k + 1, 0, $t);
      $i += strlen($d);
    }
    else if (strpos(substr($str, $i), $p) === 0) { // )
      array_splice($s, $j + $k + 1, 1);
      $j += $k;
      $k = 0;
      $i += strlen($p);
    }
    else {
      // echo "i:$i, j:$j, k:$k, str[i]:{$str[$i]}, s[j+k]:{$s[$j+$k]}\n";
      $t = isset($s[$j + $k]) ? $s[$j + $k] : '';
      $s[$j + $k] = $t . $str[$i];
      $i++;
    }
  }
  return $s;
}

?>