<?php
/**
 * @format
 */

namespace Emeraldion\Tramezzino\Test;

error_reporting(E_ALL | E_STRICT);

require_once __DIR__ . '/fixtures.php';

use Emeraldion\Tramezzino\Parser;
use PHPUnit\Framework\TestCase;

class ParserTest extends \PHPUnit_Framework_TestCase
{
    function test_exists()
    {
        // $this->assertTrue(is_callable(array('Parser', 'parse')));
    }

    function test_incompatible_words()
    {
        $this->assertEquals(Parser::parse('cane|gatto', '(', '|', ')'), array('cane', 'gatto'));
        $this->assertEquals(Parser::parse('cane|gatto|unicorno', '(', '|', ')'), array('cane', 'gatto', 'unicorno'));
    }

    function test_common_prefixes()
    {
        $this->assertEquals(Parser::parse('al(ba|ga)', '(', '|', ')'), array('alba', 'alga'));
        $this->assertEquals(Parser::parse('alb(a|er(go|o|to))', '(', '|', ')'), array(
            'alba',
            'albergo',
            'albero',
            'alberto'
        ));
        $this->assertEquals(Parser::parse('alb(a|er(g(atore|o)|o|to))', '(', '|', ')'), array(
            'alba',
            'albergatore',
            'albergo',
            'albero',
            'alberto'
        ));
    }

    function test_panflute_strings_ascending()
    {
        $this->assertEquals(Parser::parse('certa(|mente)', '(', '|', ')'), array('certa', 'certamente'));
    }

    function test_fixtures()
    {
        global $FIXTURES;

        $this->assertEquals(
            Parser::parse($FIXTURES['STRINGS']['ISIN_1'], '(', '|', ')'),
            $FIXTURES['ARRAYS']['ISIN_1']
        );
    }
}

?>
