
<?php
include_once("config.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style type="text/css">
#designer{
	margin:0px auto 0px auto;
	width:1000px;
	border:1px solid #ddd;
	padding:5px;
	}

#Insert{
	width:800px;margin:30px auto 10px auto;border:1px dashed #009966;height:600px;
	padding:5px;}
#designer #Insert table {
	text-align: center;
	font-weight: bold;
}
#Cder{
	margin:20px 0px 20px 0px;}
#designer #Modify table {
	text-align: center;
	font-weight: bold;
}
#designer #Delete table {
	text-align: center;
	font-weight: bold;
}
body,td,th {
	color: #28468B;
}
#Modify{
	width:800px;margin:30px auto 10px auto;border:1px dashed #009966;height:600px;
	padding:5px;
}
#Delete{
	width:800px;margin:30px auto 10px auto;border:1px dashed #009966;height:600px;
	padding:5px;
}
#visi{
	visibility:hidden;}
#name1{
	visibility:hidden;}
#name2{
	visibility:hidden;}
#dsl{
	visibility:hidden;}
	#visd{
	visibility:hidden;}
#delIma{
	visibility:hidden;}
.comment{
	font-size:10px;
	color:#CC0033;
	margin-left:10px;}
</style>
<script type="text/javascript" src="Scripts/jquery-1.5.js"></script>
<script type="text/javascript">
 
  $(document).ready(function(e) {
    
	$('#Insert').hide();
	$('#Modify').hide();
	$('#vis').hide();
	$('#viss').hide();
	$("#Delete").hide();
	$('#Issues').hide();
	$('#Cder').hide();
	$('#Cdar').hide();
	$('#Cdarb').hide();
	$('#Return').hide();
	
	$("#insert").click(function(){
		$('#Insert').show();
		$('#Modify').hide();
		$("#Delete").hide();
		$('#Issues').hide();
		$('#Cder').hide();
		$('#Cdar').hide();
		$('#Cdarb').hide();
		$('#Return').hide();
		});
		
	$("#modify").click(function(e) {
        $('#Insert').hide();
		$('#Modify').show();
		$("#Delete").hide();
		$('#Issues').hide();
		$('#Cder').hide();
		$('#Cdar').hide();
		$('#Cdarb').hide();
	   	$('#Return').hide();
		
    });
	$("#delete").click(function(e) {
        $('#Insert').hide();
		$('#Modify').hide();
		$("#Delete").show();
		$('#Issues').hide();
		$('#Cder').hide();
		$('#Cdar').hide();
		$('#Cdarb').hide();
		$('#Return').hide();
    });
	
	$("#issues").click(function(e) {
        $('#Insert').hide();
		$('#Modify').hide();
		$("#Delete").hide();
		$('#Issues').show();
		$('#Cder').hide();
		$('#Cdar').hide();
		$('#Cdarb').hide();
		$('#Return').hide();
		$.post('?url=issue&id=9990',{issueshow:"issueshow"},function(data){
			$('#Issues').html(data);
			});
		
    });
$('#cder').click(function() {
        $('#Insert').hide();
		$('#Modify').hide();
		$("#Delete").hide();
		$('#Issues').hide();
		$('#Cder').show();
		$('#Cdar').hide();
		$('#Cdarb').hide();
		$('#Return').hide();
		$.post('?url=report&id=01213',{repo:"report"},function(data){
			$('#Cder').html(data);
			});
});


$('#cdar').click(function() {
        $('#Insert').hide();
		$('#Modify').hide();
		$("#Delete").hide();
		$('#Issues').hide();
		$('#Cder').hide();
		$('#Cdar').show();
		$('#Cdarb').hide();
		$('#Return').hide();
		$.post('?url=report&id=01213',{avail:"reporth"},function(data){
			$('#Cdar').html(data);
			});
});

$('#cdarb').click(function() {
        $('#Insert').hide();
		$('#Modify').hide();
		$("#Delete").hide();
		$('#Issues').hide();
		$('#Cder').hide();
		$('#Cdar').hide();
		$('#Cdarb').show();
		$('#Return').hide();
		$.post('?url=report&id=01213',{avail:"reportb"},function(data){
			$('#Cdarb').html(data);
			});
});

$('#return').click(function() {
        $('#Insert').hide();
		$('#Modify').hide();
		$("#Delete").hide();
		$('#Issues').hide();
		$('#Cder').hide();
		$('#Cdar').hide();
		$('#Cdarb').hide();
		$('#Return').show();
		
});

	
  $('#su').click(function(e) {
       $.post("?url=insert&id=data",{searchh:$('input[name="searchh"]').val(),type:$("#type").val(),val:$('#visd').val()},function(data){
		        $('#Modify').html(data);
		   });
		   

	   
});

//*************

  $('#dsu').click(function(e) {
       $.post("?url=insert&id=data",{sear:$('input[name="sear"]').val(),typee:$("#typee").val(),val:$('#dsl').val()},function(data){
		        $('#Delete').html(data);
		   });
		   

	   
});
	
});



function delissue(name,type)
{
	alert(name+"------"+type);
	$.post('?url=issue&id=9990',{delissue:'delissue',namee:name,typee:type},function(data){
		$('#Issues').html(data);
		});	
}

function nsearching()
{
	 $.post('?url=return&id=8483',{rmain:"showmain",nnum:$('#snumber').val()},function(data){
			    $('#Return').html(data);
			});
}

function cdreturned(name,num,typ)
{
	//alert(name+"----"+num+"----"+typ);
	$.post('?url=return&id=8483',{cdretdon:"done",namo:name,noo:num,typei:typ},function(data){
		$('#Return').html(data);
			});
}

function changedat(name,num){
	alert($('#ret').val()+"----"+name+"------"+num);
	$.post('?url=return&id=8483',{changedate:"done",nam:name,no:num,retdate:$('#ret').val()},function(data){
		    $('#Return').html(data);
			});
	}


</script>
<title>Welcome To Administrator</title>
</head>

<body>
  
<div id="designer">
<h1 style="text-align:center">Welcome Admin</h1>
<button id="insert">Insert New Cd</button>
<button id="modify">Modify data of existing cd </button>
<button id="delete">Delete a CD</button>
<button id="issues">Issues</button>
<button id="cder">CD Earning Report</button>
<button id="cdar">CD Available Report[Hollywood]</button>
<button id="cdarb">CD Available Report[Bollywood]</button>
<button id="return">CD Return</button>
<a href="<?php echo HOST; ?>/Techspin/">Home</a>

 
     <div id="Insert">
      <h2 style="text-align:center">Insert</h2>
       <form action="?url=insert&id=data" method="post" enctype="multipart/form-data">
         <table width="750" border="1" align="center" cellpadding="5" cellspacing="10">
  <tr>
    <td>Name:<span class="comment">&nbsp;Multiple Name Saperated With ,[space] (eg: Jack, Lee, ..)</span></td>
    <td><input type="text" name="name" /></td>
  </tr>
  <tr>
    <td>Actors:<span class="comment">&nbsp;Multiple Name Saperated With ,[space] (eg: Jack, Lee,..)</span></td>
    <td><input type="text" name="actors" /></td>
  </tr>
  <tr>
    <td>Directors:<span class="comment">&nbsp;Multiple Name Saperated With ,[space] (eg: Jack, Lee, ..)</span></td>
    <td><input type="text" name="directors" /></td>
  </tr>
  <tr>
    <td>Number Of Copies:</td>
    <td><input type="text" name="copies" /></td>
  </tr>
  <tr>
    <td>Music Directors:<span class="comment">&nbsp;Multiple Name Saperated With ,[space] (eg: Jack, Lee, ..)</span></td>
    <td><input type="text" name="music" /></td>  
  </tr>
  <tr>
    <td>Rental Cost</td>
    <td><input type="text" name="rental" /></td>
  </tr>
  <tr>
    <td>Genres</td>
    <td>
       <select name="genres">
    <option>Comedy</option>
    <option>Drama</option>
    <option>Action</option>
    <option>Art</option>
        </select>
    </td>
  </tr>
  <tr>
    <td>Image Of Cd :<span class="comment">&nbsp;Make sure there is no space in name</span></td>
    <td><input type="file" name="image" /></td>
  </tr>
  <tr>
    <td>Type</td>
    <td><select name="type">
    <option>Hollywood</option>
    <option>Bollywood</option>
        </select>
    </td>
  </tr>
   <tr>
    <td>Submit</td>
    <td><input type="submit" value="Submit" /><input name="val" value="inserting" id="vis"  /></td>
  </tr>
  
</table>
 </form>
  </div>
  
     <div id="Modify">
     <h2 style="text-align:center">Modify</h2>
        <form action="#" method="post">
         <table width="750" border="1" align="center" cellpadding="5" cellspacing="10">
 
  
  <tr>
    <td>Search Movie Name</td>
    <td><input type="text" name="searchh"/></td>
  </tr>
  <tr>
    <td>Type</td>
    <td><select id="type">
    <option>Hollywood</option>
    <option>Bollywood</option>
        </select>
    </td>
  </tr>
   <tr>
    <td>Submit</td>
    <td><input type="button" value="Submit" id="su" /><input name="val" value="modify" id="visd"  /></td>
  </tr>
  
</table>
 </form>
     
     </div>
     
     <div id="Delete">
     <h2 style="text-align:center">Delete</h2>
        <form action="#" method="post">
         <table width="750" border="1" align="center" cellpadding="5" cellspacing="10">
 
  
  <tr>
    <td>Search Movie Name</td>
    <td><input type="text" name="sear"/></td>
  </tr>
  <tr>
    <td>Type</td>
    <td><select id="typee">
    <option>Hollywood</option>
    <option>Bollywood</option>
        </select>
    </td>
  </tr>
   <tr>
    <td>Submit</td>
    <td><input type="button" value="Submit" id="dsu" /><input name="val" value="delete" id="dsl"  /></td>
  </tr>
  
</table>
 </form>
     
     </div>
     
     
      <div id="Issues">

     
     </div>
     
      <div id="Cder">

     
     </div>
     
     <div id="Cdar">

     
     </div>
       <div id="Cdarb">

     
     </div>
      <div id="Return">
              
              <table width="750" border="1" align="center" cellpadding="5" cellspacing="10">
 
  
  <tr>
    <td>Search User With number</td>
    <td><input type="text" id="snumber"/></td>
  </tr>
  <tr>
   <tr>
    <td>Submit</td>
    <td><button onclick="nsearching()">Search</button></td>
  </tr>
  
</table>
     
     </div>
     
</div>
</body>
</html>

