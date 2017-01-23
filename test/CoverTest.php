<?php

	namespace Emeraldion\Tramezzino\Test;

	error_reporting(E_ALL | E_STRICT);

	require_once(__DIR__ . '/fixtures.php');

	use Emeraldion\Tramezzino\Cover;
	use PHPUnit\Framework\TestCase;

	class CoverTest extends \PHPUnit_Framework_TestCase
	{
		function test_exists()
		{
			$this->assertTrue(is_callable(array('Emeraldion\Tramezzino\Cover', 'cover')));
		}

		function test_empty_array()
		{
			$this->assertFalse(Cover::cover(array()));
		}

		function test_bad_input()
		{
			$this->assertFalse(Cover::cover(array('a'), 1));
			$this->assertFalse(Cover::cover(array('a', 'b'), 2));
			$this->assertFalse(Cover::cover(array('a', 'b', 'd'), 3));

			$this->assertFalse(Cover::cover(array('a'), 1, 0, 2));
			$this->assertFalse(Cover::cover(array('a', 'b'), 2, 0, 3));
			$this->assertFalse(Cover::cover(array('a', 'b', 'd'), 3, 0, 4));
		}

		function test_fixtures()
		{
			global $FIXTURES;

			$this->assertEquals($FIXTURES['A'],                Cover::cover(array('a')));
			$this->assertEquals($FIXTURES['A_B'],              Cover::cover(array('a', 'b')));
			$this->assertEquals($FIXTURES['A_AB'],             Cover::cover(array('a', 'ab')));
			$this->assertEquals($FIXTURES['ARIA_ANNA'],        Cover::cover(array('aria', 'arianna')));
			$this->assertEquals($FIXTURES['ALB_A_ER_GO_O_TO'], Cover::cover(array('alba', 'albergo', 'albero', 'alberto')));
		}
	}

?>
