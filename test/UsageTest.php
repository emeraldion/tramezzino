<?php
/**
 * @format
 */

namespace Emeraldion\Tramezzino\Test;

error_reporting(E_ALL | E_STRICT);

require_once __DIR__ . '/fixtures.php';

use Emeraldion\Tramezzino\Usage;
use PHPUnit\Framework\TestCase;
use php_user_filter;

class StdErrFilter extends php_user_filter
{
    static $capture;

    static $data;

    function filter($in, $out, &$consumed, $closing)
    {
        while ($bucket = stream_bucket_make_writeable($in)) {
            self::$data .= $bucket->data;
        }
        return PSFS_PASS_ON;
    }
}

function start_capture()
{
    StdErrFilter::$capture = stream_filter_prepend(STDERR, 'capture', STREAM_FILTER_WRITE);
}

function stop_capture()
{
    stream_filter_remove(StdErrFilter::$capture);
}

stream_filter_register('capture', 'Emeraldion\Tramezzino\Test\StdErrFilter') or die('Failed to register filter');

class UsageTest extends \PHPUnit_Framework_TestCase
{
    function test_exists()
    {
        $this->assertTrue(is_callable(array('Emeraldion\Tramezzino\Usage', 'usage')));
    }

    function test_print()
    {
        start_capture();

        Usage::usage();
        $this->assertNotNull(StdErrFilter::$data);
        $this->assertEquals(0, strpos(StdErrFilter::$data, 'Usage'));

        stop_capture();
    }
}

?>
