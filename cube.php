<?php

require 'vendor/autoload.php';

$cli = new League\CLImate\CLImate;

$cube = new Afonso\Cube\Cube;
$cube->scramble();

$validMoves = implode(',', $cube->getValidMoves());

$drawer = new Afonso\Cube\CubeDrawer($cube);

while (! $cube->isSolved()) {
	$drawer->draw();
	$input = $cli->input("Move? [{$validMoves}]");
	$response = $input->prompt();

	try {
		$cube->doMove($response);
	} catch (RuntimeException $e) {
		$cli->error($e->getMessage());
	}
}

$drawer->draw();
$cli->info('Success!');
