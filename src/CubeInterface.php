<?php
namespace Afonso\Cube;

interface CubeInterface
{
	public function doMoves($moves);

	public function doMove($move);

	public function scramble();

	public function isSolved();

	public function getValidMoves();
}
