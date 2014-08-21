<?php

function controllerLoader($className) {
	include_once "lib/Controllers/" . $className . "Controller.php";
}

function modelLoader($className) {
	include_once "lib/Models/" . $className . ".php";
}

function libLoader($className) {
	include_once "lib/" . $className . ".php";
}
