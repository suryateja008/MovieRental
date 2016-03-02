<?php

if(isset($_POST['rmain'])){
	
	include_once('DB_CONNECT.php');
	
	       $query =  sprintf("select * from orders where phonenum='%s' and returned = 0",$_POST['nnum']);	
			
	try {    
     $STH =	$DBH->prepare($query);
	 $STH->execute(); 
	 }  
    catch(PDOException $e) {  
	     echo "No Number Found";
        echo $e->getMessage();} 
		
		$STH->setFetchMode(PDO::FETCH_ASSOC);

		
		if($STH->rowCount() > 0){
		
		echo '<table width="900" border="1" align="center" cellpadding="5" cellspacing="10"><br>
<br>
<br>
';
 
     
	   while($row = $STH->fetch()){
		   $na ='"'.$row['name'].'"';
		   $ty = '"'.$row['type'].'"';
		printf("<tr>
			<td>Name:<br> %s </td>
			<td>Number Of Copies:<br> %s</td>
			<td>Issued Date:<br> %s </td>
			<td>Return Date:<br><input type='text' value='%s' id='ret' /> </td>
			<td>Total Cost:<br> %s </td>
			<td><button onclick='changedat(%s,%s)'>Change Return Date</button><br><button onclick='cdreturned(%s,%s,%s)'>CD Returned</button></td>
		  </tr>",$row['name'],$row['noofcopies'],$row['deliverdate'],$row['returndate'],$row['totalcost'],$na,$_POST['nnum'],$na,$_POST['nnum'],$ty);
	   }
  
echo '</table><br>';
		   
	}
else
echo "No Number Found";
}


if(isset($_POST['cdretdon'])){
	
	include_once('DB_CONNECT.php');
	
	// set to returned
	       $query =  sprintf("update orders set returned = 1 where name='%s' and phonenum='%s'",$_POST['namo'],$_POST['noo']);	
			
	try {    
     $STH =	$DBH->prepare($query);
	 $STH->execute(); 
	 echo "Amount Paid,CD Returned and Data Updated";
	 }  
    catch(PDOException $e) {  
	     echo "No Number Found";
        echo $e->getMessage();} 
	

	// set it back to updated
	$query =  sprintf("select copies from %s where name='%s'",$_POST['typei'],$_POST['namo']);	
			//echo $query;
	try {    
     $STH =	$DBH->prepare($query);
	 $STH->execute(); 
	 }  
    catch(PDOException $e) {  
        echo $e->getMessage();
		} 
		
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		
$row1 = $STH->fetch();
$inc = $row1['copies'];
$inc += 1;

$query =  sprintf("update %s set copies = %s where name = '%s'",$_POST['typei'],$inc,$_POST['namo']);

try {    
     $STH =	$DBH->prepare($query);
	 $STH->execute(); 
	 }  
    catch(PDOException $e) {  
        echo $e->getMessage();
		} 
		
}

if(isset($_POST['changedate'])){
	include_once('DB_CONNECT.php');
	
	$retdate = $_POST['retdate'];
	$name = $_POST['nam'];
	$num = $_POST['no'];
	
	$query =  sprintf("select * from orders where name='%s' and phonenum='%s' and returned = 0",$name,$num);	
			
	try {    
     $STH =	$DBH->prepare($query);
	 $STH->execute(); 
	 }  
    catch(PDOException $e) {  
        echo $e->getMessage();} 
		
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		
		$row2 = $STH->fetch();
		
		$issdate = $row2['deliverdate'];
	    $perday = $row2['perdaycost'];
		
	          //Recalculate The date for total cost	
		    $startDatee = $issdate;
			$brokstartdate = explode("-",$startDatee);
			$endDatee = $retdate;
			$brokdate = explode("-",$endDatee);
			$today = strtotime($startDatee);
			$myBirthDate = strtotime($endDatee);
			$days =  round(abs($today-$myBirthDate)/60/60/24);
			if($brokdate[0] % 4 == 0 && $brokstartdate[1] <=2 && $brokdate[1]>2)
			$days++;
			if($brokdate[0] % 4 == 0 && $brokstartdate[1] <=2 && $brokdate[1]==2 && $brokdate[2] == 29)
			$days++;
			
		$newtotalcost = $days*$perday;
		
		$query =  sprintf("update orders set
		   returndate='%s',
		   totalcost = %s
		   where name='%s' and phonenum = %s and returned=0
		",$retdate,$newtotalcost,$name,$num);	
			
	try {    
     $STH =	$DBH->prepare($query);
	 $STH->execute(); 
	 }  
    catch(PDOException $e) {  
        echo $e->getMessage();} 
		
		printf("Your Total Day Rented is %d<br>Total Cost is %d",$days,$newtotalcost);
		
	}

?>