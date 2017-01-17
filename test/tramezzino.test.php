<?php

	error_reporting(E_ALL | E_STRICT);

	require_once(__DIR__ . '/../src/tramezzino.php');
	require_once(__DIR__ . '/fixtures.php');

	class TramezzinoTest extends PHPUnit_Framework_TestCase
	{
		function test_single_element()
		{
			// It should return the string unaltered if the array has a single element
			$this->assertEquals(\tramezzino\tramezzino(array('albero'), '(', '|', ')'), 'albero');
		}

		function test_no_common_radix()
		{
			global $FIXTURES;

			// Strings without a common radix
			$this->assertEquals(\tramezzino\tramezzino(array('a', 'b', 'c'), '(', '|', ')'), 'a|b|c');
			$this->assertEquals(\tramezzino\tramezzino($FIXTURES['ARRAYS']['ALBERO_FIORE'], '(', '|', ')'), 'albero|fiore');
		}

		function test_common_radix()
		{
			global $FIXTURES;

			// Strings with a common radix
			$this->assertEquals(\tramezzino\tramezzino($FIXTURES['ARRAYS']['ALB_A_ER_GO_O_TO'], '(', '|', ')'), 'alb(a|er(go|o|to))');
			$this->assertEquals(\tramezzino\tramezzino($FIXTURES['ARRAYS']['PESCA_TORE_H_ERIA_IERA'], '(', '|', ')'), 'pesc(a(|tore)|h(eria|iera))');
			$this->assertEquals(\tramezzino\tramezzino($FIXTURES['ARRAYS']['MARE_INA_IO_IA'], '(', '|', ')'), 'mar(e|i(a|na(|io)|o))');
		}

		function test_mixed_strings()
		{
			global $FIXTURES;

			$merged = array_merge($FIXTURES['ARRAYS']['ALB_A_ER_GO_O_TO'], $FIXTURES['ARRAYS']['PESCA_TORE_H_ERIA_IERA']);
			// Mixed strings
			$this->assertEquals(\tramezzino\tramezzino($merged, '(', '|', ')'), 'alb(a|er(go|o|to))|pesc(a(|tore)|h(eria|iera))');
		}

		function test_scrambled_input()
		{
			global $FIXTURES;

			$scrambled = $FIXTURES['ARRAYS']['ALBERO_FIORE'];
			rsort($scrambled);
			// Order of input doesn't matter
			$this->assertEquals(\tramezzino\tramezzino($FIXTURES['ARRAYS']['ALBERO_FIORE'], '(', '|', ')'),
					  \tramezzino\tramezzino($scrambled, '(', '|', ')'));

			$scrambled = $FIXTURES['ARRAYS']['ALB_A_ER_GO_O_TO'];
			rsort($scrambled);
			$this->assertEquals(\tramezzino\tramezzino($FIXTURES['ARRAYS']['ALB_A_ER_GO_O_TO'], '(', '|', ')'),
					  \tramezzino\tramezzino($scrambled, '(', '|', ')'));
		}

		function test_isin()
		{
			global $FIXTURES;

			// A real life example
			$this->assertEquals(\tramezzino\tramezzino($FIXTURES['ARRAYS']['ISIN_1'], '(', '|', ')'), $FIXTURES['STRINGS']['ISIN_1']);
		}
	}

?>