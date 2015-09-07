<?php
namespace Afonso\Cube;

class CubeDrawer
{
	private $cube;

	public function __construct(CubeInterface $cube)
	{
		$this->cube = $cube;
	}

	public function draw()
	{
		echo sprintf("         [%s][%s][%s]\n", $this->colored($this->cube->get()['U'][0][0]), $this->colored($this->cube->get()['U'][0][1]), $this->colored($this->cube->get()['U'][0][2]));
		echo sprintf("         [%s][%s][%s]\n", $this->colored($this->cube->get()['U'][1][0]), $this->colored($this->cube->get()['U'][1][1]), $this->colored($this->cube->get()['U'][1][2]));
		echo sprintf("         [%s][%s][%s]\n", $this->colored($this->cube->get()['U'][2][0]), $this->colored($this->cube->get()['U'][2][1]), $this->colored($this->cube->get()['U'][2][2]));

		echo sprintf("[%s][%s][%s]", $this->colored($this->cube->get()['L'][0][0]), $this->colored($this->cube->get()['L'][0][1]), $this->colored($this->cube->get()['L'][0][2]));
		echo sprintf("[%s][%s][%s]", $this->colored($this->cube->get()['F'][0][0]), $this->colored($this->cube->get()['F'][0][1]), $this->colored($this->cube->get()['F'][0][2]));
		echo sprintf("[%s][%s][%s]", $this->colored($this->cube->get()['R'][0][0]), $this->colored($this->cube->get()['R'][0][1]), $this->colored($this->cube->get()['R'][0][2]));
		echo sprintf("[%s][%s][%s]\n", $this->colored($this->cube->get()['B'][0][0]), $this->colored($this->cube->get()['B'][0][1]), $this->colored($this->cube->get()['B'][0][2]));

		echo sprintf("[%s][%s][%s]", $this->colored($this->cube->get()['L'][1][0]), $this->colored($this->cube->get()['L'][1][1]), $this->colored($this->cube->get()['L'][1][2]));
		echo sprintf("[%s][%s][%s]", $this->colored($this->cube->get()['F'][1][0]), $this->colored($this->cube->get()['F'][1][1]), $this->colored($this->cube->get()['F'][1][2]));
		echo sprintf("[%s][%s][%s]", $this->colored($this->cube->get()['R'][1][0]), $this->colored($this->cube->get()['R'][1][1]), $this->colored($this->cube->get()['R'][1][2]));
		echo sprintf("[%s][%s][%s]\n", $this->colored($this->cube->get()['B'][1][0]), $this->colored($this->cube->get()['B'][1][1]), $this->colored($this->cube->get()['B'][1][2]));

		echo sprintf("[%s][%s][%s]", $this->colored($this->cube->get()['L'][2][0]), $this->colored($this->cube->get()['L'][2][1]), $this->colored($this->cube->get()['L'][2][2]));
		echo sprintf("[%s][%s][%s]", $this->colored($this->cube->get()['F'][2][0]), $this->colored($this->cube->get()['F'][2][1]), $this->colored($this->cube->get()['F'][2][2]));
		echo sprintf("[%s][%s][%s]", $this->colored($this->cube->get()['R'][2][0]), $this->colored($this->cube->get()['R'][2][1]), $this->colored($this->cube->get()['R'][2][2]));
		echo sprintf("[%s][%s][%s]\n", $this->colored($this->cube->get()['B'][2][0]), $this->colored($this->cube->get()['B'][2][1]), $this->colored($this->cube->get()['B'][2][2]));

		echo sprintf("         [%s][%s][%s]\n", $this->colored($this->cube->get()['D'][0][0]), $this->colored($this->cube->get()['D'][0][1]), $this->colored($this->cube->get()['D'][0][2]));
		echo sprintf("         [%s][%s][%s]\n", $this->colored($this->cube->get()['D'][1][0]), $this->colored($this->cube->get()['D'][1][1]), $this->colored($this->cube->get()['D'][1][2]));
		echo sprintf("         [%s][%s][%s]\n", $this->colored($this->cube->get()['D'][2][0]), $this->colored($this->cube->get()['D'][2][1]), $this->colored($this->cube->get()['D'][2][2]));
	}

	private function colored($tile)
	{
		switch ($tile) {
			case 'B':
				return "\e[104m \e[0m";
			case 'G':
				return "\e[102m \e[0m";
			case 'O':
				return "\e[105m \e[0m";
			case 'R':
				return "\e[101m \e[0m";
			case 'W':
				return "\e[47m \e[0m";
			case 'Y':
				return "\e[103m \e[0m";
			default:
				return $tile;
		}
	}
}
