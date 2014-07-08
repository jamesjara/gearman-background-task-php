<?php

	/*
		Create client www.jamesjara.com
		Usefull to run parallel background tasks 
		"extension=gearman.so" in both php.ini files.
	*/
	
	//GearmanClient object is instantiated. 
	$worker	= new GearmanWorker();
	$worker->addServer('127.0.0.1'); 
	$worker->addFunction("executeTask", "executeCMD");
	
	//loop
	while ($worker->work());

	function executeCMD($job){
		$workload = json_decode($job->workload());
		$execResult = false;
		exec( $workload['cmd'] , $execResult ); 
		return $execResult;
	}