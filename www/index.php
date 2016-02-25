<?php

	define ( 'DOCUMENT_ROOT', __DIR__.'/../' );

	header ( 'Content-Type: text/html; charset=utf-8' );

	ini_set ( 'display_errors', 1 );

	error_reporting( E_ERROR | E_WARNING | E_PARSE );

	session_start ();

	require ( __DIR__ . '/../vendor/autoload.php' );

	require ( __DIR__.'/../vendor/simplelight/framework/framework.php' );

	new Sili;


