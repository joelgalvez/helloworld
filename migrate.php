<?php
echo '<pre>';
// Bootstrap ProcessWire
include('./index.php');

// Assign API variables to make things a little easier

up();

function up() {
	if(wire('fields')->leadtext instanceof Field) {
		wire('fields')->leadtext->name='overviewtext';
		wire('fields')->overviewtext->save();
	}
}

function down() {
	if(wire('fields')->overviewtext instanceof Field) {
		wire('fields')->overviewtext->name='leadtext';
		wire('fields')->leadtext->save();
	}
}



