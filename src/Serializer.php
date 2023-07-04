<?php
/**
 * @format
 */

namespace Emeraldion\Tramezzino;

class Serializer
{
    static function serialize($r, $b, $d, $a, $n = false)
    {
        global $bb;
        global $dd;
        global $aa;

        $bb = $b;
        $dd = $d;
        $aa = $a;

        if ($r === null) {
            return '';
        }
        $l = array(&$r['l']);
        $c;
        if (count($r['c']) === 0) {
            return $l;
        }
        if (count($r['c']) === 1) {
            $c = array(self::serialize($r['c'][0], $b, $d, $a, true));
        } else {
            $c = array(
                implode(
                    $d,
                    array_map(function ($c) {
                        global $bb;
                        global $dd;
                        global $aa;

                        return Serializer::serialize($c, $bb, $dd, $aa, true);
                    }, $r['c'])
                )
            );

            if ($n) {
                $c = array_merge(array($b), $c, array($a));
            }
        }
        return implode('', array_merge($l, $c));
    }
}

?>
