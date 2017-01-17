<?php

	error_reporting(E_ALL | E_STRICT);

	require_once(__DIR__ . '/../src/serialize.php');
	require_once(__DIR__ . '/fixtures.php');

	class SerializeTest extends PHPUnit_Framework_TestCase
	{
		function test_parser()
		{
			$this->assertTrue(is_callable('\tramezzino\serialize'));
		}

		function test_trees()
		{
			global $FIXTURES;

			$this->assertEquals('a', \tramezzino\serialize($FIXTURES['TREES']['A'], '(', '|', ')'));
			$this->assertEquals('a', \tramezzino\serialize($FIXTURES['TREES']['A'], '*', '&', '^'));
			$this->assertEquals('a', \tramezzino\serialize($FIXTURES['TREES']['A'], '-', '_', '`'));
			
			$this->assertEquals('a|b', \tramezzino\serialize($FIXTURES['TREES']['A_B'], '(', '|', ')'));
			$this->assertEquals('a&b', \tramezzino\serialize($FIXTURES['TREES']['A_B'], '*', '&', '^'));
			$this->assertEquals('a_b', \tramezzino\serialize($FIXTURES['TREES']['A_B'], '-', '_', '`'));
			
			$this->assertEquals('a(|b)', \tramezzino\serialize($FIXTURES['TREES']['A_AB'], '(', '|', ')'));
			$this->assertEquals('a*&b^', \tramezzino\serialize($FIXTURES['TREES']['A_AB'], '*', '&', '^'));
			$this->assertEquals('a-_b`', \tramezzino\serialize($FIXTURES['TREES']['A_AB'], '-', '_', '`'));
			
			$this->assertEquals('aria(|nna)', \tramezzino\serialize($FIXTURES['TREES']['ARIA_ANNA'], '(', '|', ')'));
			$this->assertEquals('aria*&nna^', \tramezzino\serialize($FIXTURES['TREES']['ARIA_ANNA'], '*', '&', '^'));
			$this->assertEquals('aria[+nna]', \tramezzino\serialize($FIXTURES['TREES']['ARIA_ANNA'], '[', '+', ']'));
			
			$this->assertEquals('alb(a|er(go|o|to))', \tramezzino\serialize($FIXTURES['TREES']['ALB_A_ER_GO_O_TO'], '(', '|', ')'));
			$this->assertEquals('alb*a&er*go&o&to^^', \tramezzino\serialize($FIXTURES['TREES']['ALB_A_ER_GO_O_TO'], '*', '&', '^'));
			$this->assertEquals('alb~a*er~go*o*to==', \tramezzino\serialize($FIXTURES['TREES']['ALB_A_ER_GO_O_TO'], '~', '*', '='));
			$this->assertEquals('alb[a+er[go+o+to]]', \tramezzino\serialize($FIXTURES['TREES']['ALB_A_ER_GO_O_TO'], '[', '+', ']'));
			
			$this->assertEquals('viale(|tto)', \tramezzino\serialize($FIXTURES['TREES']['VIALE_ETTO'], '(', '|', ')'));
			$this->assertEquals('viale[+tto]', \tramezzino\serialize($FIXTURES['TREES']['VIALE_ETTO'], '[', '+', ']'));
			$this->assertEquals('viale~*tto=', \tramezzino\serialize($FIXTURES['TREES']['VIALE_ETTO'], '~', '*', '='));
		}

		function test_trees_empty_children()
		{
			global $FIXTURES;

			// $this->assertEquals('a|b(|c)', \tramezzino\serialize($FIXTURES['TREES']['EMPTY_CHILDREN'], '(', '|', ')'));
			// $this->assertEquals('a+b[+c]', \tramezzino\serialize($FIXTURES['TREES']['EMPTY_CHILDREN'], '[', '+', ']'));
			// $this->assertEquals('a*b~*c=', \tramezzino\serialize($FIXTURES['TREES']['EMPTY_CHILDREN'], '~', '*', '='));
		}
	}

?>