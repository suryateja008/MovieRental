<?php

include_once('DB_CONNECT.php');

 if(isset($_POST['al'])){
 
 if($_POST['al'] == "Hollywood")
		    $chanm = 'hollywood';
			else
			$chanm = 'bollywood';
 

	 
	 $query=	sprintf("select * from $chanm order by id DESC limit 0,6");    
     $STH = $DBH->query($query);
        # check the row count 
		
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		 
        if ($STH->fetchColumn() > 0) {  
		        $STH = $DBH->query($query);
				
	 
   while($row = $STH->fetch()){
	   $md = "'";
	   $md .= $row['name'];
	   $md .= "','subP'";
echo '

<div class="items_display" onclick="jump('.$md.')">
                  <h2>'.$row['name'].'</h2>
				  <div>
                 <div class="imgg" style="background:url('.$row['imagelocation'].')"/>
                  </div>
                  
                  <div class="actors_name"><span style="color:#0066CC">Genres :</span>&nbsp;&nbsp;'.$row['genres'].'</div>
				  <div class="actors_name"><span style="color:#0066CC">Stock :</span>&nbsp;&nbsp;'.$row['copies'].'</div>
                   <div class="actors_name"><span style="color:#0066CC">Actor :</span>&nbsp;&nbsp;'.$row['actors'].'</div>
                   <div class=" actors_name"><span style="color:#0066CC">Director :</span>&nbsp;&nbsp;'.$row['directors'].'</div>
                   <div class="actors_name"><span style="color:#0066CC">Music Director :</span>&nbsp;&nbsp;'.$row['musicdirector'].'</div>
                    </div>
              </div>
';


}
  
   
}
 }

  
    if(isset($_POST['sear']) && isset($_POST['searkey'])){
	   
                              if($_POST['seartype'] == "Hollywood")
		    $chanm = 'hollywood';
			else
			$chanm = 'bollywood';
			
		 $key = $_POST['searkey'];	
		 
			if($_POST['sear'] == 'All')
			$query =	sprintf("select * from $chanm where name like '%s' order by id DESC limit 0,6","%$key%");
			else{
			$genres = $_POST['sear'];
			$query =	sprintf("select * from $chanm where genres='%s' and name like '%s' limit 0,6",$genres,"%$key%");
			}
 
      
	   
	
	
	// echo $query;    
        $STH = $DBH->query($query);
        # check the row count 
		
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		 
        if ($STH->fetchColumn() > 0) {  
		        $STH = $DBH->query($query);
				
	 
   while($row = $STH->fetch()){
	   $md = "'";
	   $md .= $row['name'];
	   $md .= "','subP'";
echo '

<div class="items_display" onclick="jump('.$md.')">
                  <h2>'.$row['name'].'</h2>
				  <div>
                 <div class="imgg" style="background:url('.$row['imagelocation'].')"/>
                  </div>
                  
                  <div class="actors_name"><span style="color:#0066CC">Genres :</span>&nbsp;&nbsp;'.$row['genres'].'</div>
				  <div class="actors_name"><span style="color:#0066CC">Stock :</span>&nbsp;&nbsp;'.$row['copies'].'</div>
                   <div class="actors_name"><span style="color:#0066CC">Actor :</span>&nbsp;&nbsp;'.$row['actors'].'</div>
                   <div class=" actors_name"><span style="color:#0066CC">Director :</span>&nbsp;&nbsp;'.$row['directors'].'</div>
                   <div class="actors_name"><span style="color:#0066CC">Music Director :</span>&nbsp;&nbsp;'.$row['musicdirector'].'</div>
                    </div>
              </div>
';


}
	   
	   }else
	   echo "No result found";
   
   
 }
 
 
 //********************
 


 

//***************** paging***************************************************************************



if(isset($_POST['pg']) && isset($_POST['ln'])){
 
 if($_POST['pg'] == "Hollywood")
		    $chanm = 'hollywood';
			else
			$chanm = 'bollywood';
 

	 
	 $query=	sprintf("select * from $chanm"); 
 
     $STH = $DBH->query($query);
        # check the row count 
		
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		 
        if ($STH->fetchColumn() > 0) {  
		        $STH = $DBH->query($query);
				
	 
             $pageing = $STH->rowCount();
   
      for($i=1;$i<=ceil($pageing/6);$i++)
	  echo "<option>$i</option>";
}
 }

  
        
	//**************** page show
	
	
	if(isset($_POST['pp']) && $_POST['paging']){
 
 if($_POST['pp'] == "Hollywood")
		    $chanm = 'hollywood';
			else
			$chanm = 'bollywood';
 
$page = $_POST['paging'];
$page = (($page*6)-6);
	 
	 $query=	sprintf("select * from $chanm order by id DESC limit $page,6"); 
	  
     $STH = $DBH->query($query);
        # check the row count 
		
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		 
        if ($STH->fetchColumn() > 0) {  
		        $STH = $DBH->query($query);
				
	 
   while($row = $STH->fetch()){
	   $md = "'";
	   $md .= $row['name'];
	   $md .= "','subP'";
echo '

<div class="items_display" onclick="jump('.$md.')">
                  <h2>'.$row['name'].'</h2>
				  <div>
                 <div class="imgg" style="background:url('.$row['imagelocation'].')"/>
                  </div>
                  
                  <div class="actors_name"><span style="color:#0066CC">Genres :</span>&nbsp;&nbsp;'.$row['genres'].'</div>
				  <div class="actors_name"><span style="color:#0066CC">Stock :</span>&nbsp;&nbsp;'.$row['copies'].'</div>
                   <div class="actors_name"><span style="color:#0066CC">Actor :</span>&nbsp;&nbsp;'.$row['actors'].'</div>
                   <div class=" actors_name"><span style="color:#0066CC">Director :</span>&nbsp;&nbsp;'.$row['directors'].'</div>
                   <div class="actors_name"><span style="color:#0066CC">Music Director :</span>&nbsp;&nbsp;'.$row['musicdirector'].'</div>
                    </div>
              </div>
';


}
  
   
}
 }	
 
 //************************************ Search Paging
 
 
 if(isset($_POST['searchpaging'])){
	   
                              if($_POST['seartype'] == "Hollywood")
		    $chanm = 'hollywood';
			else
			$chanm = 'bollywood';
			
			
		 $key = $_POST['searkeyyy'];	
		 
			if($_POST['sear'] == 'All')
			$query =	sprintf("select * from $chanm where name like '%s' order by id DESC","%$key%");
			else{
			$genres = $_POST['sear'];
			$query =	sprintf("select * from $chanm where genres='%s' and name like '%s'",$genres,"%$key%");
			}
 
      
	   
	
	
	 $STH = $DBH->query($query);
        # check the row count 
		  
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		 
        
		    
	 
	 if ($STH->fetchColumn() > 0) {  
		        $STH = $DBH->query($query);
				
	 
             $pageingg = $STH->rowCount();
   
   for($i=1;$i<=ceil($pageingg/6);$i++)
	  echo "<option>$i</option>";
	 
}
	 

	 
    
   
 }
 
 
?>