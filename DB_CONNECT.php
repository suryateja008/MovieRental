<?php

	// Information about the connection dataBase
	include_once('config.php');
	
    
	
	//Testing of COnnection
    try {    
      # MySQL with PDO_MYSQL  
      $DBH = new PDO("mysql:host=".LHOST.";dbname=".DBNAME,USER,PASS);  
    }  
    catch(PDOException $e) {  
        echo $e->getMessage();  
    }  
	
	$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT );  
    $DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );  
    $DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  
	
?>