<?php

	error_reporting(E_ALL | E_STRICT);

	require_once(__DIR__ . '/../src/parser.php');
	require_once(__DIR__ . '/../src/tramezzino.php');
	require_once(__DIR__ . '/fixtures.php');

	class IdempotenceTest extends PHPUnit_Framework_TestCase
	{
		function test_single_element()
		{
			// It should return the string unaltered if the array has a single element
			$this->assertEquals(\tramezzino\parser(\tramezzino\tramezzino(array('albero'), '(', '|', ')'), '(', '|', ')'), array('albero'));
		}

		function test_no_common_radix()
		{
			global $FIXTURES;

			// Strings without a common radix
			$this->assertEquals(\tramezzino\parser(\tramezzino\tramezzino(array('a', 'b', 'c'), '(', '|', ')'), '(', '|', ')'), array('a', 'b', 'c'));
			$this->assertEquals(\tramezzino\parser(\tramezzino\tramezzino($FIXTURES['ARRAYS']['ALBERO_FIORE'], '(', '|', ')'), '(', '|', ')'),
			  $FIXTURES['ARRAYS']['ALBERO_FIORE']);
		}

		function test_common_radix()
		{
			global $FIXTURES;

			$sorted = $FIXTURES['ARRAYS']['ALB_A_ER_GO_O_TO'];
			sort($sorted);
			// Strings with a common radix
			$this->assertEquals(\tramezzino\parser(\tramezzino\tramezzino($FIXTURES['ARRAYS']['ALB_A_ER_GO_O_TO'], '(', '|', ')'), '(', '|', ')'),
			  $sorted);

			$sorted = $FIXTURES['ARRAYS']['PESCA_TORE_H_ERIA_IERA'];
			sort($sorted);
			$this->assertEquals(\tramezzino\parser(\tramezzino\tramezzino($FIXTURES['ARRAYS']['PESCA_TORE_H_ERIA_IERA'], '(', '|', ')'), '(', '|', ')'),
			  $sorted);

			$sorted = $FIXTURES['ARRAYS']['MARE_INA_IO_IA'];
			sort($sorted);
			$this->assertEquals(\tramezzino\parser(\tramezzino\tramezzino($FIXTURES['ARRAYS']['MARE_INA_IO_IA'], '(', '|', ')'), '(', '|', ')'),
			  $sorted);
		}

		function test_mixed_strings()
		{
			global $FIXTURES;

			$sorted = array_merge($FIXTURES['ARRAYS']['ALB_A_ER_GO_O_TO'], $FIXTURES['ARRAYS']['PESCA_TORE_H_ERIA_IERA']);
			sort($sorted);

			// Mixed strings
			$this->assertEquals(\tramezzino\parser(\tramezzino\tramezzino(array_merge($FIXTURES['ARRAYS']['ALB_A_ER_GO_O_TO'],
			  $FIXTURES['ARRAYS']['PESCA_TORE_H_ERIA_IERA']), '(', '|', ')'), '(', '|', ')'),
			    $sorted);
		}

		function test_scramble_input()
		{
			global $FIXTURES;

			$scrambled = $FIXTURES['ARRAYS']['ALBERO_FIORE'];
			rsort($scrambled);
			// Order of input doesn't matter
			$this->assertEquals(\tramezzino\parser(\tramezzino\tramezzino($FIXTURES['ARRAYS']['ALBERO_FIORE'], '(', '|', ')'), '(', '|', ')'),
			          \tramezzino\parser(\tramezzino\tramezzino($scrambled, '(', '|', ')'), '(', '|', ')'));

			$scrambled = $FIXTURES['ARRAYS']['ALB_A_ER_GO_O_TO'];
			rsort($scrambled);
			$this->assertEquals(\tramezzino\parser(\tramezzino\tramezzino($FIXTURES['ARRAYS']['ALB_A_ER_GO_O_TO'], '(', '|', ')'), '(', '|', ')'),
			          \tramezzino\parser(\tramezzino\tramezzino($scrambled, '(', '|', ')'), '(', '|', ')'));
		}

		function test_isin()
		{
			global $FIXTURES;

			// A real life example
			$this->assertEquals(\tramezzino\parser(\tramezzino\tramezzino($FIXTURES['ARRAYS']['ISIN_1'], '(', '|', ')'), '(', '|', ')'),
			  $FIXTURES['ARRAYS']['ISIN_1']);
		}
	}

?>