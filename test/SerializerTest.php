<?php

	namespace Emeraldion\Tramezzino\Test;

	error_reporting(E_ALL | E_STRICT);

	require_once(__DIR__ . '/fixtures.php');

	use Emeraldion\Tramezzino\Serializer;
	use PHPUnit\Framework\TestCase;

	class SerializerTest extends \PHPUnit_Framework_TestCase
	{
		function test_exists()
		{
			$this->assertTrue(is_callable(array('Emeraldion\Tramezzino\Serializer', 'serialize')));
		}

		function test_trees()
		{
			global $FIXTURES;

			$this->assertEquals('a', Serializer::serialize($FIXTURES['TREES']['A'], '(', '|', ')'));
			$this->assertEquals('a', Serializer::serialize($FIXTURES['TREES']['A'], '*', '&', '^'));
			$this->assertEquals('a', Serializer::serialize($FIXTURES['TREES']['A'], '-', '_', '`'));

			$this->assertEquals('a|b', Serializer::serialize($FIXTURES['TREES']['A_B'], '(', '|', ')'));
			$this->assertEquals('a&b', Serializer::serialize($FIXTURES['TREES']['A_B'], '*', '&', '^'));
			$this->assertEquals('a_b', Serializer::serialize($FIXTURES['TREES']['A_B'], '-', '_', '`'));

			$this->assertEquals('a(|b)', Serializer::serialize($FIXTURES['TREES']['A_AB'], '(', '|', ')'));
			$this->assertEquals('a*&b^', Serializer::serialize($FIXTURES['TREES']['A_AB'], '*', '&', '^'));
			$this->assertEquals('a-_b`', Serializer::serialize($FIXTURES['TREES']['A_AB'], '-', '_', '`'));

			$this->assertEquals('aria(|nna)', Serializer::serialize($FIXTURES['TREES']['ARIA_ANNA'], '(', '|', ')'));
			$this->assertEquals('aria*&nna^', Serializer::serialize($FIXTURES['TREES']['ARIA_ANNA'], '*', '&', '^'));
			$this->assertEquals('aria[+nna]', Serializer::serialize($FIXTURES['TREES']['ARIA_ANNA'], '[', '+', ']'));

			$this->assertEquals('alb(a|er(go|o|to))', Serializer::serialize($FIXTURES['TREES']['ALB_A_ER_GO_O_TO'], '(', '|', ')'));
			$this->assertEquals('alb*a&er*go&o&to^^', Serializer::serialize($FIXTURES['TREES']['ALB_A_ER_GO_O_TO'], '*', '&', '^'));
			$this->assertEquals('alb~a*er~go*o*to==', Serializer::serialize($FIXTURES['TREES']['ALB_A_ER_GO_O_TO'], '~', '*', '='));
			$this->assertEquals('alb[a+er[go+o+to]]', Serializer::serialize($FIXTURES['TREES']['ALB_A_ER_GO_O_TO'], '[', '+', ']'));

			$this->assertEquals('viale(|tto)', Serializer::serialize($FIXTURES['TREES']['VIALE_ETTO'], '(', '|', ')'));
			$this->assertEquals('viale[+tto]', Serializer::serialize($FIXTURES['TREES']['VIALE_ETTO'], '[', '+', ']'));
			$this->assertEquals('viale~*tto=', Serializer::serialize($FIXTURES['TREES']['VIALE_ETTO'], '~', '*', '='));
		}

		function test_trees_empty_children()
		{
			global $FIXTURES;

			// $this->assertEquals('a|b(|c)', Serializer::serialize($FIXTURES['TREES']['EMPTY_CHILDREN'], '(', '|', ')'));
			// $this->assertEquals('a+b[+c]', Serializer::serialize($FIXTURES['TREES']['EMPTY_CHILDREN'], '[', '+', ']'));
			// $this->assertEquals('a*b~*c=', Serializer::serialize($FIXTURES['TREES']['EMPTY_CHILDREN'], '~', '*', '='));
		}
	}

?>