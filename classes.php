<?php
include_once('config.php');

 //***********************************************************
class admin{
	
	private $name;
	private $actors;
	private $directors;
	private $noofcopies;
	private $musicdirector;
	private $rental;
	private $genres;
	private $image;
	
	
	public function Insert($name,$actors,$directors,$noofcopies,$musicdirector,$rental,$genres,$image,$type)
	{
		include_once('DB_CONNECT.php');
		   
		   if($name != '' && $actors != '' && $directors!= '' && $noofcopies!= '' && $musicdirector!= '' && $rental!= '' && $genres!= '' && $image['name']!= '' && $type){
		     
		 if($type == "Hollywood")
		    $imagee = 'hollywoodImages';
			else
			$imagee = 'bollywoodImages';
			
		//Image Uploading
		
		if(isset($image["name"])){
	 if($image["name"] != ''){
     $file_name = $image["name"];
	 if(move_uploaded_file($image["tmp_name"],"$imagee/$file_name"))
	    echo "";}}
		
			
	$query =  sprintf("insert into $type set

              name='%s',
			  actors='%s',
			  directors='%s',
			  copies='%s',
			  musicdirector='%s',
			  rentalcost='%s',
			  genres='%s',
			  totalcopies=%s,
			  imagelocation='%s'",$name,$actors,$directors,$noofcopies,$musicdirector,$rental,$genres,$noofcopies,"$imagee/$file_name");
	
			
	try {    
     $STH =	$DBH->prepare($query);
	 $STH->execute(); 
	 echo "Inserted successfully<br />";
	 echo '<img src="'."$imagee/$file_name".'" width="100" height="100"><br />';
	 echo '<a href="?url='.ADMIN_URL.'&id='.ADMIN_ID.'">Add MOre</a>';
	 }  
    catch(PDOException $e) {  
	     echo "error";
        echo $e->getMessage();} 
}

else
echo "some data is missing";
}
	
//********************************************************
public function Modify($name,$type,$copies,$rent){
		include_once('DB_CONNECT.php');
		if(preg_match('%bollywood%',$type))
		$type = 'bollywood';
		else
		$type = "hollywood";
		
		
		$query =  sprintf("select totalcopies,copies from %s where name ='%s'",$type,$name);
		
	
		try {    
     $STH =	$DBH->prepare($query);
	 $STH->execute(); }  
    catch(PDOException $e) { 
        echo $e->getMessage();}
		
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$row = $STH->fetch();
		$newcopies = $copies - $row['totalcopies'];
		if($newcopies < 0)
		$newcopies = $row["copies"] + $newcopies ;
		else
		$newcopies += $row["copies"];
	
		
		$query =  sprintf("update $type set

             totalcopies=%s,
			  copies='%s',
			  rentalcost='%s' where name = '%s'",$copies,$newcopies,$rent,$name);
	
			
	try {    
     $STH =	$DBH->prepare($query);
	 $STH->execute(); 
	 echo "Updated successfully<br />";
	 echo '<a href="?url='.ADMIN_URL.'&id='.ADMIN_ID.'">Update Or Add More CD</a>';
	 }  
    catch(PDOException $e) {  
	     echo "error";
        echo $e->getMessage();}
      
			

}

//*****************************************************
	public function Delete($movieName,$type){
		
		include_once('DB_CONNECT.php');
	
  
            //setting the fetch mode  
              
      $query=	sprintf("select id,name,imagelocation from %s where name like '%s'",$type,"%$movieName%");    
     $STH = $DBH->query($query);
        # check the row count 
		
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		 
        if ($STH->fetchColumn() > 0) {  
		        $STH = $DBH->query($query);
				$row = $STH->fetch();
                     echo '
					 
					      <form action="?url=insert&id=data" method="post" enctype="multipart/form-data">
							 <table width="750" border="1" align="center" cellpadding="5" cellspacing="10">
					  <tr>
						<td>Name:</td>
						<td><input type="text" name="delName" value="'.$row['name'].'" /></td>
					  </tr>
					  <tr>
					  <tr>
						<td>Type:</td>
						<td><input type="text" name="typeName" value="'.$type.'" /></td>
					  </tr>
					  <tr>
						<td>Image</td>
						<td><img src="'.$row['imagelocation'].'" width="100" height="100" /><input type="text" name="delImage"    id="delIma"value="'.$row['imagelocation'].'" /></td>
					  </tr>
					  <tr>
						<td>Delete</td>
						<td><input type="submit" value="Delete" /><input name="val" value="del" id="visi" /></td>
					  </tr>
					</table>
					 </form>
					 
					 
					 ';
				 }  
        else {  
            echo "No rows matched the query.<br />";
			echo '<a href="?url='.ADMIN_URL.'&id='.ADMIN_ID.'">Search Again</a>';}
		
		}
		
//*****************************************************
	public function Check($movieName,$type){
		
		    include_once('DB_CONNECT.php');
	
  
            //setting the fetch mode  
              
      $query=	sprintf("select totalcopies,copies,rentalcost,name,imagelocation from %s where name like '%s'",$type,"%$movieName%");    
     $STH = $DBH->query($query);
        # check the row count 
		
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		 
        if ($STH->rowCount() > 0) {  
		        $STH = $DBH->query($query);
				$row = $STH->fetch();
                     echo '
					 
					   <form action="?url=insert&id=data" method="post" enctype="multipart/form-data">
							 <table width="750" border="1" align="center" cellpadding="5" cellspacing="10">
							 <tr>
						<td>Name:</td>
						<td><input type="text" name="no" value="'.$row['name'].'" disabled="disabled" /></td>
					  </tr>
					  <tr>
						<td>Avaliable Of Copies:(include total copies along with older copies)</td>
						<td><input type="text" name="copies" value="'.$row['copies'].'" /></td>
					  </tr>
					  <tr>
						<td>Total Number Of Copies:</td>
						<td><input type="text" name="copies" value="'.$row['totalcopies'].'" disabled="disabled" /></td>
					  </tr>
					  <tr>
					  <tr>
						<td>Rental Cost</td>
						<td><input type="text" name="rental" value="'.$row['rentalcost'].'" /></td>
					  </tr>
					  <tr>
						<td>Submit</td>
						<td><input type="submit" value="Submit" /><input name="val" value="update" id="visi" /></td>
					  </tr>
					  <input type="text" name="name1" value="'.$row['name'].'" id="name1" />
					  <input type="text" name="name2" value="'.$row['imagelocation'].'" id="name2" />
					</table>
					 </form>
					 
					 
					 ';
				 }  
        else {  
            echo "No rows matched the query.<br />";
			echo '<a href="?url='.ADMIN_URL.'&id='.ADMIN_ID.'">Search Again</a>';}  
		}
		

	
	
	}
	
	
$d = new admin();

if($_POST['val'] == "inserting"){
$d->Insert(mysql_real_escape_string($_POST['name']),mysql_real_escape_string($_POST['actors']),mysql_real_escape_string($_POST['directors']),mysql_real_escape_string($_POST['copies']),mysql_real_escape_string($_POST['music']),mysql_real_escape_string($_POST['rental']),mysql_real_escape_string($_POST['genres']),$_FILES['image'],mysql_real_escape_string($_POST['type']));
}


if($_POST['val'] == "modify")
{
	$d->Check($_POST['searchh'],$_POST['type']);
}

if($_POST['val'] == "update"){
	$d->Modify($_POST['name1'],$_POST['name2'],$_POST['copies'],$_POST['rental']);
	}
	
if($_POST['val'] == "delete"){
	$d->Delete($_POST['sear'],$_POST['typee']);
	}
	
if($_POST['val'] == 'del'){
	include_once('DB_CONNECT.php');
	
	if($_POST['typeName'] == "Hollywood")
		    $typeName = 'hollywood';
			else
			$typeName = 'bollywood';
	
	 $query =  sprintf('delete from %s

             where name="%s"
			  ',$typeName,$_POST['delName']);
	
	try {    
     $STH =	$DBH->prepare($query);
	 $STH->execute(); 
	 unlink($_POST['delImage']);
	 echo "Deleted successfully<br />";
	 echo '<a href="?url='.ADMIN_URL.'&id='.ADMIN_ID.'">Want To Delete More?</a>';
	 }  
    catch(PDOException $e) {  
	     echo "Unsuccessfull Delete Operation";
        echo $e->getMessage();}
	
	}
	


?>