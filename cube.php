<?php

require 'vendor/autoload.php';

$cli = new League\CLImate\CLImate;

$cube = new Afonso\Cube\Cube;
$cube->scramble();

$parser = new Afonso\Cube\MoveStringParser;

$validMoves = implode(',', $cube->getValidMoves());

$drawer = new Afonso\Cube\CubeDrawer($cube);

while (! $cube->isSolved()) {
	$drawer->draw();
	$moves = $cli->input("Move? [{$validMoves}]")->prompt();

	try {
		$cube->move($parser->parseString($moves));
	} catch (InvalidArgumentException $e) {
		$cli->error($e->getMessage());
	} catch (RuntimeException $e) {
		$cli->error($e->getMessage());
	}
}

$drawer->draw();
$cli->info('Success!');
