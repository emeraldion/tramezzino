<?php

	error_reporting(E_ALL | E_STRICT);

	require_once(__DIR__ . '/../src/parser.php');
	require_once(__DIR__ . '/fixtures.php');

	class ParserTest extends PHPUnit_Framework_TestCase
	{
		function test_parser()
		{
			$this->assertTrue(is_callable('\tramezzino\parser'));
		}

		function test_incompatible_words()
		{
			$this->assertEquals(\tramezzino\parser('cane|gatto', '(', '|', ')'), ['cane', 'gatto']);
			$this->assertEquals(\tramezzino\parser('cane|gatto|unicorno', '(', '|', ')'), ['cane', 'gatto', 'unicorno']);
		}

		function test_common_prefixes()
		{
			$this->assertEquals(\tramezzino\parser('al(ba|ga)', '(', '|', ')'), ['alba', 'alga']);
			$this->assertEquals(\tramezzino\parser('alb(a|er(go|o|to))', '(', '|', ')'), ['alba', 'albergo', 'albero', 'alberto']);
			$this->assertEquals(\tramezzino\parser('alb(a|er(g(atore|o)|o|to))', '(', '|', ')'), ['alba', 'albergatore', 'albergo', 'albero', 'alberto']);
		}

		function test_panflute_strings_ascending()
		{
			$this->assertEquals(\tramezzino\parser('certa(|mente)', '(', '|', ')'), ['certa', 'certamente']);
		}

		function test_fixtures()
		{
			global $FIXTURES;
			
			$this->assertEquals(\tramezzino\parser($FIXTURES['STRINGS']['ISIN_1'], '(', '|', ')'), $FIXTURES['ARRAYS']['ISIN_1']);
		}
	}

?>
