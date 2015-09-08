<?php
namespace Afonso\Cube\Tests;

use Afonso\Cube\MoveStringParser;

class MoveStringParserTest extends BaseTestCase
{
	public function testParser()
	{
		$parser = new MoveStringParser;

		$parsedMoves = $parser->parseString('2fuRdd3l2U');
		$expectedMoves = ['f', 'f', 'u', 'R', 'd', 'd', 'l', 'l', 'l', 'U', 'U'];

		$this->assertEquals($expectedMoves, $parsedMoves);
	}

	/**
	 * @expectedException InvalidArgumentException
	 */
	public function testParserWithInvalidExpression()
	{
		$parser = new MoveStringParser;

		$parsedMoves = $parser->parseString('2f8');
	}
}