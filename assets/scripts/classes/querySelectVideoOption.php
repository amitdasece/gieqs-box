
<?php
error_reporting(E_ALL);
//;
$openaccess = 1;
//echo 'hello';
//$requiredUserLevel = 4;
require ('../../../assets/includes/config.inc.php');		
//echo 'hello2';
require (BASE_URI.'/assets/scripts/headerScript.php');

//echo 'hello34';

//$general = new general;
//$queries = new queries;

//spl_autoload_unregister ('class_loader');

	  
	  

$videosAccess = new videosAccess;
//echo 'hello4';




function ne($v) {
    return $v != '';
}

//required GET variables  update, identifierKey, identifier, table

// update 0 INSERT INTO

// update 1 UPDATE

// update 2 DELETE


//check count of get variables

$data = $videosAccess->sanitiseGET($_GET);
	
foreach ($data as $key=>$value){
    
    $GLOBALS[$key] = $value;
    
}

//print_r($data);

                
	$response =  $videosAccess->select2_video_match($search);

	echo $response;
    
    


	//$queries->endqueries();

      