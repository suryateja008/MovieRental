<?php

if(isset($_POST['repo'])){
	include_once("DB_CONNECT.php");
	
 $query =  sprintf("select name,sum(noofcopies),sum(totalcost) from orders where returned=1 group by name order by sum(noofcopies) DESC");
	
			
	try {    
     $STH =	$DBH->prepare($query);
	 $STH->execute(); 
	 }  
    catch(PDOException $e) {  
	     echo "error";
        echo $e->getMessage();} 
		
		$STH->setFetchMode(PDO::FETCH_ASSOC);

		
		
		
		echo '<table width="750" border="1" align="center" cellpadding="5" cellspacing="10">';
 
     
	   while($row = $STH->fetch()){
		printf("  <tr>
			<td>Name: %s </td>
			<td>Number Of Copies: %s</td>
			<td>Total Rental: %s</td>
		  </tr>",$row['name'],$row['sum(noofcopies)'],$row['sum(totalcost)']);
	   }
  
echo '</table>';
		   
}


if(isset($_POST['avail'])){
	include_once("DB_CONNECT.php");
	if($_POST['avail'] == "reporth")
 $query =  sprintf("select name,genres,totalcopies,copies from hollywood order by id DESC");
 else
$query =  sprintf("select name,genres,totalcopies,copies from bollywood order by id DESC");	
			
	try {    
     $STH =	$DBH->prepare($query);
	 $STH->execute(); 
	 }  
    catch(PDOException $e) {  
	     echo "error";
        echo $e->getMessage();} 
		
		$STH->setFetchMode(PDO::FETCH_ASSOC);

		
		
		
		echo '<table width="750" border="1" align="center" cellpadding="5" cellspacing="10"><br>
<br>
<br>
';
 
     
	   while($row = $STH->fetch()){
		printf("  <tr>
			<td>Name: %s </td>
			<td>Category: %s</td>
			<td>Type: Hollywood </td>
			<td>Avaliable Copies: %s </td>
			<td>Total Copies: %s </td>
		  </tr>",$row['name'],$row['genres'],$row['copies'],$row['totalcopies']);
	   }
  
echo '</table>';
		   
}
?>