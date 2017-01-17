<?php

	error_reporting(E_ALL | E_STRICT);

	require_once(__DIR__ . '/../src/cover.php');
	require_once(__DIR__ . '/fixtures.php');

	class CoverTest extends PHPUnit_Framework_TestCase
	{
		function test_cover()
		{
			$this->assertTrue(is_callable('\tramezzino\cover'));
		}

		function test_bad_input()
		{
			$this->assertFalse(\tramezzino\cover(array('a'), 1));
			$this->assertFalse(\tramezzino\cover(array('a', 'b'), 2));
			$this->assertFalse(\tramezzino\cover(array('a', 'b', 'd'), 3));

			$this->assertFalse(\tramezzino\cover(array('a'), 1, 0, 2));
			$this->assertFalse(\tramezzino\cover(array('a', 'b'), 2, 0, 3));
			$this->assertFalse(\tramezzino\cover(array('a', 'b', 'd'), 3, 0, 4));
		}

		function test_fixtures()
		{
			global $FIXTURES;

			$this->assertEquals($FIXTURES['A'],                \tramezzino\cover(array('a')));
			$this->assertEquals($FIXTURES['A_B'],              \tramezzino\cover(array('a', 'b')));
			$this->assertEquals($FIXTURES['A_AB'],             \tramezzino\cover(array('a', 'ab')));
			$this->assertEquals($FIXTURES['ARIA_ANNA'],        \tramezzino\cover(array('aria', 'arianna')));
			$this->assertEquals($FIXTURES['ALB_A_ER_GO_O_TO'], \tramezzino\cover(array('alba', 'albergo', 'albero', 'alberto')));
		}
	}

?>
