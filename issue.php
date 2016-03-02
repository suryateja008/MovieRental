<?php

function iss(){
	
	include_once('DB_CONNECT.php');
	 
	  $query =  sprintf("select * from issues");
	
			
	try {    
     $STH =	$DBH->prepare($query);
	 $STH->execute(); 
	 }  
    catch(PDOException $e) {  
	     echo "error";
        echo $e->getMessage();} 
		
		
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		 
        if ($STH->fetchColumn() > 0) {  
		        $STH = $DBH->query($query);
				
				echo '
	         <h2 style="text-align:center">Issues</h2>
         <table width="750" border="1" align="center" cellpadding="5" cellspacing="10">';
 
				while($row = $STH->fetch()){
					$name = '"';
					$name .= $row['name'];
					$name .='"';
					$type = '"';
					$type .= $row['type'];
					$type .= '"';
				printf("
				
  
									  <tr>
										<td>%s</td>
										<td>%s</td>
										<td><button onclick='delissue(%s,%s)'>X</button></td>
									  </tr>",$row['name'],$row['type'],$name,$type);
									  
									  
									

				}
				
				echo '</table>';
			
		}else{
					echo "No issues";
					}	
		
	}

//************************************************************************************************************

if(isset($_POST['mname']))
 {
	 include_once('DB_CONNECT.php');
	 
	  $query =  sprintf("insert into issues set
	  
	     name='%s',
		 type='%s'
	  ",$_POST['mname'],$_POST['typing']);
	
			
	try {    
     $STH =	$DBH->prepare($query);
	 $STH->execute(); 
	 echo "ISSUE HAS BEEN NOTIFIED";
	 }  
    catch(PDOException $e) {  
	     echo "error";
        echo $e->getMessage();} 
		   
		   
		   
		   
}

if(isset($_POST['issueshow']))
{
	
	
		
		iss();
		
	
}

if(isset($_POST['delissue']))
 {
	 include_once('DB_CONNECT.php');
	 
	  $query =  sprintf("delete from issues where name='%s' and type = '%s'",$_POST['namee'],$_POST['typee']);
	
			
	try {    
     $STH =	$DBH->prepare($query);
	 $STH->execute(); 
	 }  
    catch(PDOException $e) {  
	     echo "error";
        echo $e->getMessage();} 
		
		
		
		$query =  sprintf("select * from issues");
	
			
	try {    
     $STH =	$DBH->prepare($query);
	 $STH->execute(); 
	 }  
    catch(PDOException $e) {  
	     echo "error";
        echo $e->getMessage();} 
		
		
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		 
        if ($STH->fetchColumn() > 0) {  
		        $STH = $DBH->query($query);
				
				echo '
	         <h2 style="text-align:center">Issues</h2>
         <table width="750" border="1" align="center" cellpadding="5" cellspacing="10">';
 
				while($row = $STH->fetch()){
					$name = '"';
					$name .= $row['name'];
					$name .='"';
					$type = '"';
					$type .= $row['type'];
					$type .= '"';
				printf("
				
  
									  <tr>
										<td>%s</td>
										<td>%s</td>
										<td><button onclick='delissue(%s,%s)'>X</button></td>
									  </tr>",$row['name'],$row['type'],$name,$type);
									  
									  
									

				}
				echo '</table>';
			
		}
		
	
	 
  }
 

?>