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
		echo sprintf("         [%s][%s][%s]\n", $this->cube->get()['U'][0][0], $this->cube->get()['U'][0][1], $this->cube->get()['U'][0][2]);
		echo sprintf("         [%s][%s][%s]\n", $this->cube->get()['U'][1][0], $this->cube->get()['U'][1][1], $this->cube->get()['U'][1][2]);
		echo sprintf("         [%s][%s][%s]\n", $this->cube->get()['U'][2][0], $this->cube->get()['U'][2][1], $this->cube->get()['U'][2][2]);

		echo sprintf("[%s][%s][%s]", $this->cube->get()['L'][0][0], $this->cube->get()['L'][0][1], $this->cube->get()['L'][0][2]);
		echo sprintf("[%s][%s][%s]", $this->cube->get()['F'][0][0], $this->cube->get()['F'][0][1], $this->cube->get()['F'][0][2]);
		echo sprintf("[%s][%s][%s]", $this->cube->get()['R'][0][0], $this->cube->get()['R'][0][1], $this->cube->get()['R'][0][2]);
		echo sprintf("[%s][%s][%s]\n", $this->cube->get()['B'][0][0], $this->cube->get()['B'][0][1], $this->cube->get()['B'][0][2]);

		echo sprintf("[%s][%s][%s]", $this->cube->get()['L'][1][0], $this->cube->get()['L'][1][1], $this->cube->get()['L'][1][2]);
		echo sprintf("[%s][%s][%s]", $this->cube->get()['F'][1][0], $this->cube->get()['F'][1][1], $this->cube->get()['F'][1][2]);
		echo sprintf("[%s][%s][%s]", $this->cube->get()['R'][1][0], $this->cube->get()['R'][1][1], $this->cube->get()['R'][1][2]);
		echo sprintf("[%s][%s][%s]\n", $this->cube->get()['B'][1][0], $this->cube->get()['B'][1][1], $this->cube->get()['B'][1][2]);

		echo sprintf("[%s][%s][%s]", $this->cube->get()['L'][2][0], $this->cube->get()['L'][2][1], $this->cube->get()['L'][2][2]);
		echo sprintf("[%s][%s][%s]", $this->cube->get()['F'][2][0], $this->cube->get()['F'][2][1], $this->cube->get()['F'][2][2]);
		echo sprintf("[%s][%s][%s]", $this->cube->get()['R'][2][0], $this->cube->get()['R'][2][1], $this->cube->get()['R'][2][2]);
		echo sprintf("[%s][%s][%s]\n", $this->cube->get()['B'][2][0], $this->cube->get()['B'][2][1], $this->cube->get()['B'][2][2]);

		echo sprintf("         [%s][%s][%s]\n", $this->cube->get()['D'][0][0], $this->cube->get()['D'][0][1], $this->cube->get()['D'][0][2]);
		echo sprintf("         [%s][%s][%s]\n", $this->cube->get()['D'][1][0], $this->cube->get()['D'][1][1], $this->cube->get()['D'][1][2]);
		echo sprintf("         [%s][%s][%s]\n", $this->cube->get()['D'][2][0], $this->cube->get()['D'][2][1], $this->cube->get()['D'][2][2]);
	}
}
