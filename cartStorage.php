<?php
include_once("config.php");
if(isset($_POST['choice'])){
	$_SESSION['cartcount']++;
	$_SESSION['cartnum']++;
	
	
	if($_POST['types'] == "Hollywood")
		    $types = 'hollywood';
			else
			$types = 'bollywood';
			
   $_SESSION['cart'][$_SESSION['cartcount']]=array('name'=>$_POST['cname'],'img'=>$_POST['cimg'],"cost"=>$_POST['ccost'],"copies"=>$_POST['cope'],"type"=>$types);
   
  echo $_SESSION['cartcount'];
  print_r($_SESSION['cart'][$_SESSION['cartcount']]);
  
  }
  
 if(isset($_POST['del'])){
	 $n = 1;
	for($j=1;$j<=$_SESSION['cartcount'];$j++){
		     if($j == $_POST['id'])
			 {
				 $_SESSION['cart'][$j]=NULL;
			 }
			 else
			 {
				 $_SESSION['cart'][$n] = $_SESSION['cart'][$j];
				 $n++;
			 }
		}
		$_SESSION['cartcount']--;
	$_SESSION['cartnum']--;
	
	 }
	 
	 
	if(isset($_POST['payments']))
	{
		 
			$startDatee = $_POST['toddate'];
			$brokstartdate = explode("-",$startDatee);
			$endDatee = $_POST['retdate'];
			$brokdate = explode("-",$endDatee);
			$today = strtotime($startDatee);
			$myBirthDate = strtotime($endDatee);
			$days =  round(abs($today-$myBirthDate)/60/60/24);
			if($brokdate[0] % 4 == 0 && $brokstartdate[1] <=2 && $brokdate[1]>2)
			$days++;
			if($brokdate[0] % 4 == 0 && $brokstartdate[1] <=2 && $brokdate[1]==2 && $brokdate[2] == 29)
			$days++;
			
     $totalcosting =0;
	 include_once('DB_CONNECT.php');
	 
	 for($m=1;$m<=$_SESSION['cartnum'];$m++)
		   {      
		   			
	$query =  sprintf("insert into orders set
	
	    name='%s',
		noofcopies='%s',
		deliverdate='%s',
		returndate='%s',
		phonenum='%s',
		totalcost='%s',
		perdaycost=%s,
		type='%s'
	",$_SESSION["cart"][$m]["name"],1,$_POST['toddate'],$_POST['retdate'],$_POST['phonenumber'],($_SESSION["cart"][$m]["cost"]*$days
	
	),$_SESSION["cart"][$m]["cost"],$_SESSION["cart"][$m]["type"]);
	
	$totalcosting += $_SESSION["cart"][$m]["cost"]*$days;
	
			
	try {    
     $STH =	$DBH->prepare($query);
	 $STH->execute(); 
	 }  
    catch(PDOException $e) {  
	     echo "error";
        echo $e->getMessage();} 
		   
		   
			   
			   }
			   
			   
	 for($m=1;$m<=$_SESSION['cartnum'];$m++)
		   { 
		   
		     
			    $query =  sprintf("update %s set
				
				copies=%s where name = '%s'
				
				
				",$_SESSION["cart"][$m]["type"],($_SESSION["cart"][$m]["copies"]-1),$_SESSION["cart"][$m]["name"]);
	
			
	try {    
     $STH =	$DBH->prepare($query);
	 $STH->execute(); 
	 }  
    catch(PDOException $e) {  
	     echo "error";
        echo $e->getMessage();} 
		   
		   
		   
		   
		   }
			   
			   
			 printf("Total Day Rented %d days <br />",$days);
			echo "Your Number For Reference ".$_POST['phonenumber']."<br />";
			echo "Collect at your near Store<br />";
			echo "Total Cost =  $totalcosting<br />";
			printf('<a href="%s/Techspin/">DONE</a>',HOST);
			session_destroy();
	}
	 
	
?>