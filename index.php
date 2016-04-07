<?php
	
	$time_start = microtime(true);

	define ( 'DOCUMENT_ROOT', __DIR__.'/' );

	header ( 'Content-Type: text/html; charset=utf-8' );

	ini_set ( 'display_errors', 1 );

	error_reporting( E_ERROR | E_WARNING | E_PARSE );

	session_start ();

	require ( __DIR__ . '/vendor/autoload.php' );

	require ( __DIR__.'/vendor/simplelight/framework/framework.php' );

	new Sili;

	if(1){

		print "<!--\r\n";

		$time_end = microtime(true);

		$exec_time = $time_end-$time_start;
	  
	  	if(function_exists('memory_get_peak_usage')){

	  		print "memory peak usage: ".memory_get_peak_usage()." bytes\r\n";  

			print "page generation time: ".$exec_time." seconds\r\n";

			print "-->";

	  	}
			
	}


