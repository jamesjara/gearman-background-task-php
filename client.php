<?php

	/*
		Create client www.jamesjara.com
		Usefull to run parallel tasks 
		"extension=gearman.so" in both php.ini files.
	*/
	
	//GearmanClient object is instantiated. 
	$client	= new GearmanClient();

	$client->addServer('127.0.0.1'); 
	$client->setCreatedCallback(	"createCallback"); 
	$client->setDataCallback(		"dataCallback"); 
	$client->setStatusCallback(		"completeCallback"); 
	$client->setCompleteCallback(	"completeCallback"); 
	$client->setFailCallback(		"failCallback");
 
	//Add data 
	$result = $client->doBackground("executeTask", json_encode(array( 
		'cmd' => 'ping 127.0.0.1'		
	)));

	echo "DONE\n";
	
	function Client_error() {
		if (! $client->runTasks())
			return $client->error() ;
	} 
	function createCallback( $task ){
		echo "CREATED: " . $task->jobHandle() . "\n";
	} 
	function dataCallback( $task ){
		echo "STATUS: " . $task->jobHandle() . " - " . $task->taskNumerator() . 
         "/" . $task->taskDenominator() . "\n";
	} 
	function dataCallback( $task ){
		echo "STATUS: " . $task->jobHandle() . " - " . $task->taskNumerator() . 
         "/" . $task->taskDenominator() . "\n";
	}  
	function completeCallback( $task )	{
		echo "COMPLETE: " . $task->jobHandle() . ", " . $task->data() . "\n";
	} 
	function failCallback($task){
		echo "FAILED: " . $task->jobHandle() . "\n";
	}

	function dataCallback($task){
		echo "DATA: " . $task->data() . "\n";
	}
	
 