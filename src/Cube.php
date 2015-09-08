<?php
namespace Afonso\Cube;

class Cube implements CubeInterface
{
	private $cube;

	public function __construct()
	{
		$this->cube = $this->initialize();
	}

	public function get()
	{
		return $this->cube;
	}

	public function move($moves)
	{
		if (! is_array($moves)) {
			$moves = [$moves];
		}

		foreach ($moves as $move) {
			$this->doMove($move);
		}
	}

	protected function doMove($move)
	{
		$moves = [
			'u' => 'up',
			'd' => 'down',
			'f' => 'front',
			'b' => 'back',
			'r' => 'right',
			'l' => 'left',
			'U' => 'rUp',
			'D' => 'rDown',
			'F' => 'rFront',
			'B' => 'rBack',
			'R' => 'rRight',
			'L' => 'rLeft',
		];
		if (! array_key_exists($move, $moves)) {
			throw new \RuntimeException("Invalid move: $move");
		}
		$this->{$moves[$move]}();
	}

	public function getValidMoves()
	{
		return ['u', 'd', 'f', 'b', 'r', 'l', 'U', 'D', 'F', 'B', 'R', 'L'];
	}

	protected function up()
	{
		$before = $this->cube;
		$this->cube['L'][0] = $before['F'][0];
		$this->cube['F'][0] = $before['R'][0];
		$this->cube['R'][0] = $before['B'][0];
		$this->cube['B'][0] = $before['L'][0];
	}

	protected function down()
	{
		$before = $this->cube;
		$this->cube['L'][2] = $before['B'][2];
		$this->cube['F'][2] = $before['L'][2];
		$this->cube['R'][2] = $before['F'][2];
		$this->cube['B'][2] = $before['R'][2];
	}

	protected function front()
	{
		$before = $this->cube;
		$this->cube['U'][2][0] = $before['L'][0][2];
		$this->cube['U'][2][1] = $before['L'][1][2];
		$this->cube['U'][2][2] = $before['L'][2][2];

		$this->cube['R'][0][0] = $before['U'][2][0];
		$this->cube['R'][1][0] = $before['U'][2][1];
		$this->cube['R'][2][0] = $before['U'][2][2];

		$this->cube['D'][0][0] = $before['R'][0][0];
		$this->cube['D'][0][1] = $before['R'][1][0];
		$this->cube['D'][0][2] = $before['R'][2][0];

		$this->cube['L'][0][2] = $before['D'][0][0];
		$this->cube['L'][1][2] = $before['D'][0][1];
		$this->cube['L'][2][2] = $before['D'][0][2];
	}

	protected function back()
	{
		$before = $this->cube;
		$this->cube['U'][0][0] = $before['R'][0][2];
		$this->cube['U'][0][1] = $before['R'][1][2];
		$this->cube['U'][0][2] = $before['R'][2][2];

		$this->cube['L'][0][0] = $before['U'][0][0];
		$this->cube['L'][1][0] = $before['U'][0][1];
		$this->cube['L'][2][0] = $before['U'][0][2];

		$this->cube['D'][2][0] = $before['L'][0][0];
		$this->cube['D'][2][1] = $before['L'][1][0];
		$this->cube['D'][2][2] = $before['L'][2][0];

		$this->cube['R'][0][2] = $before['D'][2][0];
		$this->cube['R'][1][2] = $before['D'][2][1];
		$this->cube['R'][2][2] = $before['D'][2][2];
	}

	protected function left()
	{
		$before = $this->cube;
		$this->cube['U'][0][0] = $before['B'][0][2];
		$this->cube['U'][1][0] = $before['B'][1][2];
		$this->cube['U'][2][0] = $before['B'][2][2];

		$this->cube['F'][0][0] = $before['U'][0][0];
		$this->cube['F'][1][0] = $before['U'][1][0];
		$this->cube['F'][2][0] = $before['U'][2][0];

		$this->cube['D'][0][0] = $before['F'][0][0];
		$this->cube['D'][1][0] = $before['F'][1][0];
		$this->cube['D'][2][0] = $before['F'][2][0];

		$this->cube['B'][0][2] = $before['D'][0][0];
		$this->cube['B'][1][2] = $before['D'][0][1];
		$this->cube['B'][2][2] = $before['D'][0][2];
	}

	protected function right()
	{
		$before = $this->cube;
		$this->cube['U'][0][2] = $before['F'][0][2];
		$this->cube['U'][1][2] = $before['F'][1][2];
		$this->cube['U'][2][2] = $before['F'][2][2];

		$this->cube['F'][0][2] = $before['D'][0][2];
		$this->cube['F'][1][2] = $before['D'][1][2];
		$this->cube['F'][2][2] = $before['D'][2][2];

		$this->cube['D'][0][2] = $before['B'][0][0];
		$this->cube['D'][1][2] = $before['B'][1][0];
		$this->cube['D'][2][2] = $before['B'][2][0];

		$this->cube['B'][0][0] = $before['U'][0][2];
		$this->cube['B'][1][0] = $before['U'][1][2];
		$this->cube['B'][2][0] = $before['U'][2][2];
	}

	protected function rUp()
	{
		$this->up();
		$this->up();
		$this->up();
	}

	protected function rDown()
	{
		$this->down();
		$this->down();
		$this->down();
	}

	protected function rFront()
	{
		$this->front();
		$this->front();
		$this->front();
	}

	protected function rBack()
	{
		$this->back();
		$this->back();
		$this->back();
	}

	protected function rLeft()
	{
		$this->left();
		$this->left();
		$this->left();
	}

	protected function rRight()
	{
		$this->right();
		$this->right();
		$this->right();
	}

	public function scramble()
	{
		$moves = ['up', 'down', 'front', 'back', 'left', 'right'];
		$steps = rand(20, 30);
		for ($i = 0; $i < $steps; $i++) {
			$move = $moves[rand(0, count($moves) - 1)];
			$this->{$move}();
		}
	}

	public function isSolved()
	{
		return $this->cube === $this->initialize();
	}

	private function initialize()
	{
		return [
			'U' => [
				['W', 'W', 'W'],
				['W', 'W', 'W'],
				['W', 'W', 'W'],
			],
			'D' => [
				['Y', 'Y', 'Y'],
				['Y', 'Y', 'Y'],
				['Y', 'Y', 'Y'],
			],
			'L' => [
				['R', 'R', 'R'],
				['R', 'R', 'R'],
				['R', 'R', 'R'],
			],
			'F' => [
				['B', 'B', 'B'],
				['B', 'B', 'B'],
				['B', 'B', 'B'],
			],
			'R' => [
				['O', 'O', 'O'],
				['O', 'O', 'O'],
				['O', 'O', 'O'],
			],
			'B' => [
				['G', 'G', 'G'],
				['G', 'G', 'G'],
				['G', 'G', 'G'],
			],
		];
	}
}
