<?php

	namespace Emeraldion\Tramezzino\Test;

	error_reporting(E_ALL | E_STRICT);

	require_once(__DIR__ . '/fixtures.php');

	use Emeraldion\Tramezzino\Tramezzino as Tramezzino;
	use PHPUnit\Framework\TestCase;

	class TramezzinoTest extends \PHPUnit_Framework_TestCase
	{
		function test_encode_exists()
		{
			$this->assertTrue(is_callable(array('Emeraldion\Tramezzino\Tramezzino', 'encode')));
		}

		function test_encode_empty()
		{
			$this->assertEquals('', Tramezzino::encode(array()));
		}

		function test_encode_bad_data()
		{
			$this->assertNull(Tramezzino::encode(NULL));
			$this->assertNull(Tramezzino::encode(1));
			$this->assertNull(Tramezzino::encode(TRUE));
		}

		function test_encode_mutation()
		{
			global $FIXTURES;

			// It doesn't mutate the input array
			$reversed1 = $reversed2 = $FIXTURES['ARRAYS']['ALBERO_FIORE'];
			rsort($reversed1);
			rsort($reversed2);
			Tramezzino::encode($reversed2, '(', '|', ')');
			$this->assertEquals($reversed1, $reversed2);

			$reversed1 = $reversed2 = $FIXTURES['ARRAYS']['ALB_A_ER_GO_O_TO'];
			rsort($reversed1);
			rsort($reversed2);
			Tramezzino::encode($reversed2, '(', '|', ')');
			$this->assertEquals($reversed1, $reversed2);
		}

		function test_encode_single_element()
		{
			// It should return the string unaltered if the array has a single element
			$this->assertEquals(Tramezzino::encode(array('albero'), '(', '|', ')'), 'albero');
		}

		function test_encode_no_common_radix()
		{
			global $FIXTURES;

			// Strings without a common radix
			$this->assertEquals(Tramezzino::encode(array('a', 'b', 'c'), '(', '|', ')'), 'a|b|c');
			$this->assertEquals(Tramezzino::encode($FIXTURES['ARRAYS']['ALBERO_FIORE'], '(', '|', ')'), 'albero|fiore');
		}

		function test_encode_common_radix()
		{
			global $FIXTURES;

			// Strings with a common radix
			$this->assertEquals(Tramezzino::encode($FIXTURES['ARRAYS']['ALB_A_ER_GO_O_TO'], '(', '|', ')'), 'alb(a|er(go|o|to))');
			$this->assertEquals(Tramezzino::encode($FIXTURES['ARRAYS']['PESCA_TORE_H_ERIA_IERA'], '(', '|', ')'), 'pesc(a(|tore)|h(eria|iera))');
			$this->assertEquals(Tramezzino::encode($FIXTURES['ARRAYS']['MARE_INA_IO_IA'], '(', '|', ')'), 'mar(e|i(a|na(|io)|o))');
		}

		function test_encode_mixed_strings()
		{
			global $FIXTURES;

			$merged = array_merge($FIXTURES['ARRAYS']['ALB_A_ER_GO_O_TO'], $FIXTURES['ARRAYS']['PESCA_TORE_H_ERIA_IERA']);
			// Mixed strings
			$this->assertEquals(Tramezzino::encode($merged, '(', '|', ')'), 'alb(a|er(go|o|to))|pesc(a(|tore)|h(eria|iera))');
		}

		function test_encode_scrambled_input()
		{
			global $FIXTURES;

			$scrambled = $FIXTURES['ARRAYS']['ALBERO_FIORE'];
			rsort($scrambled);
			// Order of input doesn't matter
			$this->assertEquals(Tramezzino::encode($FIXTURES['ARRAYS']['ALBERO_FIORE'], '(', '|', ')'),
					  Tramezzino::encode($scrambled, '(', '|', ')'));

			$scrambled = $FIXTURES['ARRAYS']['ALB_A_ER_GO_O_TO'];
			rsort($scrambled);
			$this->assertEquals(Tramezzino::encode($FIXTURES['ARRAYS']['ALB_A_ER_GO_O_TO'], '(', '|', ')'),
					  Tramezzino::encode($scrambled, '(', '|', ')'));
		}

		function test_encode_isin()
		{
			global $FIXTURES;

			// A real life example
			$this->assertEquals(Tramezzino::encode($FIXTURES['ARRAYS']['ISIN_1'], '(', '|', ')'), $FIXTURES['STRINGS']['ISIN_1']);
		}

		function test_decode_exists()
		{
			$this->assertTrue(is_callable(array('Emeraldion\Tramezzino\Tramezzino', 'decode')));
		}
	}

?>