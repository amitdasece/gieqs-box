<?php

            $openaccess = 1;
			//$requiredUserLevel = 4;
			require ('../../../assets/includes/config.inc.php');		
			
			require (BASE_URI.'/assets/scripts/headerScript.php');

            //$general = new general;
            //$programme = new programme;
            $blogLink = new blogLink;
            $blogContent = new blogContent;
            
            //error_reporting(E_ALL);
            $debug = TRUE;

            //$print_r()

            $data = json_decode(file_get_contents('php://input'), true);

            
            if ($debug){
            print_r($data);
            }

            $blogid = $data['blogid'];
            $databaseName = $data['databaseName'];
            
            $nextDisplay = $blogLink->getNextDisplayOrder($blogid);


            $blogContent->New_blogContent($blogid, null, null, 'GIEQs video id', $nextDisplay);
            echo $blogContent->prepareStatementPDO();



            ?>





<?php
        

            
           

            
             
//$general->endgeneral();
//$programme->endprogramme();
//$userRegistrations->enduserRegistrations();
?>