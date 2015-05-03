<?php
echo '<pre>';
// Bootstrap ProcessWire
include('./index.php');

// Assign API variables to make things a little easier

up();

function up() {
	$t = wire('templates')->get('overview-same-size');
	$t2 = clone($t);
	$t2->name = 'overview-list';
	$t2->save();
}

function down() {
}



