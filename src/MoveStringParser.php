<?php
namespace Afonso\Cube;

use InvalidArgumentException;

class MoveStringParser
{
	public function parseString($string)
	{
		if (! preg_match('/^(?:\d?[a-z])+$/i', $string, $m)) {
			throw new InvalidArgumentException("{$string} is not a valid move expression");
		}

		preg_match_all('/\d?[a-z]/i', $string, $matches);
		$moves = [];
		foreach ($matches[0] as $match) {
			if (strlen($match) > 1) {
				$times = (int) substr($match, 0, 1);
				$move = substr($match, 1);
			} else {
				$times = 1;
				$move = $match;
			}

			for ($i = 0; $i < $times; $i++) {
				$moves[] = $move;
			}
		}

		return $moves;
	}
}
