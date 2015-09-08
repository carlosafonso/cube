<?php
namespace Afonso\Cube;

/**
 * Represents a cube puzzle.
 */
interface CubeInterface
{
	/**
	 * Performs an arbitrary number of
	 * moves on the cube.
	 *
	 * @param	mixed	$moves
	 */
	public function move($moves);

	/**
	 * Randomizes the state of the cube.
	 */
	public function scramble();

	/**
	 * Returns whether the current state
	 * of the cube is a solved state.
	 *
	 * @return	boolean
	 */
	public function isSolved();

	/**
	 * Returns the list of valid moves
	 * accepted by this cube.
	 *
	 * @return	array
	 */
	public function getValidMoves();
}
