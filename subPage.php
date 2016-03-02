<?php

if(isset($_GET['url']) && isset($_GET['id'])){
	
	    include_once('DB_CONNECT.php');

 if(isset($_GET['typ'])){
 
 if($_GET['typ'] == "Hollywood")
		    $chanm = 'hollywood';
			else
			$chanm = 'bollywood';
 

	 
	 $query=	sprintf("select * from $chanm where name='%s'",$_GET['url']);    
     $STH = $DBH->query($query);
        # check the row count 
		
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		 
		  $row = $STH->fetch();
		
		    $counter = $row['mostviewed'];
		  $counter++;
		 //update hollywood set mostviewed=2 where name="Sherlock Holmesman"
	$queryy=	sprintf("update %s set mostviewed=%s where name='%s'",$chanm,$counter,$_GET['url']); 
     $DBH->query($queryy);

 }
	
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $row['name']; ?></title>
</head>
<style type="text/css" >
#page{
	width:900px;
	border:1px solid #C5C5C5;
	height:700px;
	margin:50px auto 50px auto;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	-moz-box-shadow:1px 1px 5px 1px #DCDCDC;
	background-color: #F4F4F4;
	-webkit-box-shadow:1px 1px 5px 1px #DCDCDC;
	padding:10px;
	}

#page h1{
	text-align:center;
	color:#333;
	text-shadow:4px 4px 2px #C3C3C3;
	border-bottom:1px solid #ddd;}

#page .imm{
	-moz-border-radius:10px;
	-webkit-border-radius:10px;
	-moz-box-shadow:1px 1px 9px black;
	-webkit-box-shadow:1px 1px 9px black;
	margin-top:10px;
	float:left;}
	

#tablet{
	float:left;
	margin:12px 0px 0px 10px;
	word-wrap:break-word;
	color:#069;
	}
#tablet td{
	border-bottom:1px solid #999;
	word-wrap:break-word;}
	
.butt{
	height:30px;
	width:80px;
	color:white;
	border:1px solid #ccc;
	background-color:#99C755;
	font-family:Trebuchet MS, Arial, Helvetica, sans-serif;
	box-shadow: 0px 2px 20px 2px #333;		
		 }
.butt:hover{
	color:red;
	background-color:white;
	color:#99C755;
	box-shadow: 0px 2px 20px 2px #8A8A8A;
	 border:1px solid #333;
	}
</style>
<script type="text/javascript" src="Scripts/jquery-1.5.js"></script>
<script type="text/javascript">

function goback(){
window.location = '<?php echo HOST; ?>/Techspin/';
}
function addingtocart(one,two,three,cop,typeing)
{
	if(cop<1){
		alert("No stock");
		}else{
	$.post('?url=carting&id=0090',{choice:"carti",cname:two,cimg:one,ccost:three,cope:cop,types:typeing},function(){
		   alert("Added To Cart");
		});
		
		}
   	
}
function issue(name,type)
{
	
	$.post('?url=issue&id=9990',{mname:name,typing:type},function(){
		     alert("DOne");
		});
}
</script>
<body>
<div id="page">
  <h1><?php echo $row['name']; ?></h1>
<img class="imm" src="<?php echo $row['imagelocation']; ?>" alt="img" width="500" height="600" />
<table width="368"  cellpadding="10" cellspacing="3" id="tablet">
  <tr>
    <td width="114">Actors</td>
    <td width="203"><?php echo $row['actors']; ?></td>
  </tr>
  <tr>
    <td>Directors</td>
    <td><?php echo $row['directors']; ?></td>
  </tr>
  <tr>
    <td>Music Directors</td>
    <td><?php echo $row['musicdirector']; ?></td>
  </tr>
  <tr>
    <td>Copies</td>
    <td><?php
	   if($row['copies']<1)
	   echo "No stock";
	   else
	 echo $row['copies']; ?></td>
  </tr>
  <tr>
    <td>Rental (per day)</td>
    <td><?php echo $row['rentalcost']; ?></td>
  </tr>
  <tr>
    <td>Genres</td>
    <td><?php echo $row['genres']; ?></td>
  </tr>
  <tr>
    <td>Category</td>
    <td><?php echo $_GET['typ']; ?></td>
  </tr>
    <tr>
    <td><button class="butt" onclick= "goback()">Home</button></td>
    <td><button class="butt" onclick='addingtocart("<?php echo $row['imagelocation'];  ?>","<?php echo $row['name'];  ?>","<?php echo $row['rentalcost'];?>","<?php echo $row['copies'];  ?>","<?php echo $_GET['typ'];  ?>")'>Add To Cart</button></td>
    <td>
  </tr>
  <tr>
   <td><button class="butt" onclick= 'issue("<?php echo $row['name']; ?>","<?php echo $_GET['typ'];  ?>")'>ISSUE</button></td>
  
  </tr>
</table>
<div id="dsh">
</div>
</div>
</body>
</html>

