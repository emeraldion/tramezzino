<?php
/**
 * @format
 */

namespace Emeraldion\Tramezzino\Test;

error_reporting(E_ALL | E_STRICT);

require_once __DIR__ . '/fixtures.php';

use Emeraldion\Tramezzino\Args;
use PHPUnit\Framework\TestCase;

define('DEFAULT_SEPARATOR', ',');
define('DEFAULT_PREAMBLE', '(');
define('DEFAULT_DELIMITER', '|');
define('DEFAULT_TERMINATOR', ')');

class ArgsTest extends \PHPUnit_Framework_TestCase
{
    function test_exists()
    {
        $this->assertTrue(is_callable(array('Emeraldion\Tramezzino\Args', 'parse')));
    }

    function test_one_arg()
    {
        global $argv;

        $argv = array('__CMD__', 'abc');

        $args = Args::parse();

        $this->assertEquals('abc', $args['string']);
        $this->assertEquals(DEFAULT_SEPARATOR, $args['separator']);
        $this->assertEquals(DEFAULT_PREAMBLE, $args['preamble']);
        $this->assertEquals(DEFAULT_DELIMITER, $args['delimiter']);
        $this->assertEquals(DEFAULT_TERMINATOR, $args['terminator']);
    }

    function test_two_args()
    {
        global $argv;

        $argv = array('__CMD__', 'abc', '^');

        $args = Args::parse();

        $this->assertEquals('abc', $args['string']);
        $this->assertEquals('^', $args['separator']);
        $this->assertEquals(DEFAULT_PREAMBLE, $args['preamble']);
        $this->assertEquals(DEFAULT_DELIMITER, $args['delimiter']);
        $this->assertEquals(DEFAULT_TERMINATOR, $args['terminator']);
    }

    function test_three_args()
    {
        global $argv;

        $argv = array('__CMD__', 'abc', '^', '%');

        $args = Args::parse();

        $this->assertEquals('abc', $args['string']);
        $this->assertEquals('^', $args['separator']);
        $this->assertEquals('%', $args['preamble']);
        $this->assertEquals(DEFAULT_DELIMITER, $args['delimiter']);
        $this->assertEquals(DEFAULT_TERMINATOR, $args['terminator']);
    }

    function test_four_args()
    {
        global $argv;

        $argv = array('__CMD__', 'abc', '^', '%', '&');

        $args = Args::parse();

        $this->assertEquals('abc', $args['string']);
        $this->assertEquals('^', $args['separator']);
        $this->assertEquals('%', $args['preamble']);
        $this->assertEquals('&', $args['delimiter']);
        $this->assertEquals(DEFAULT_TERMINATOR, $args['terminator']);
    }

    function test_five_args()
    {
        global $argv;

        $argv = array('__CMD__', 'abc', '^', '%', '&', '*');

        $args = Args::parse();

        $this->assertEquals('abc', $args['string']);
        $this->assertEquals('^', $args['separator']);
        $this->assertEquals('%', $args['preamble']);
        $this->assertEquals('&', $args['delimiter']);
        $this->assertEquals('*', $args['terminator']);
    }
}

?>
