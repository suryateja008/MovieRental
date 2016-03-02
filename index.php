
<?php
session_start();

if(!isset($_SESSION['cartcount']))
$_SESSION['cartcount'] =0;

if(!isset($_SESSION['cartnum']))
$_SESSION['cartnum'] =0;

//session_destroy();
     include_once('config.php');
  if(isset($_GET['url']) && isset($_GET['id']) ){
	  if($_GET['url'] === ADMIN_URL && $_GET['id'] === ADMIN_ID){
  include_once("admin.php");
  exit();
	  }
	  
	  if($_GET['url'] === "insert" && $_GET['id'] === "data"){
  include_once("classes.php");
  exit();
	  }
	  
	   if($_GET['url'] === "main" && $_GET['id'] === "page"){
  include_once("mainPage.php");
  exit();
	  }
	  
	  
	    if($_GET['url'] === "return"){
  include_once("return.php");
  exit();
	  }
	  
	 if($_GET['id'] == 'subP'){
  include_once("subPage.php");
  exit();
	  }
	 
	if($_GET['url']=="report")
	{
		include_once("reports.php");
		exit();
		}
	  
	   if($_GET['url'] == 'carting'){
  include_once("cartStorage.php");
  exit();
	  }
	  
	   if($_GET['url'] == 'issue'){
  include_once("issue.php");
  exit();
	  }
	  
	
  }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Online Movie's Rental</title>
<link type="text/css" rel="stylesheet" href="Styles/style.css" />
<script type="text/javascript" src="Scripts/jquery-1.5.js"></script>
<script type="text/javascript">

function carthide(){
	$('#cartsshow').hide();
	$('#payment').hide();
	}
	
function cartshow(){
	$('#cartsshow').show();
	}
	
function payshow(){
	//alert(1);
	$('#payment').toggle();
	}

 function chanmov(){
	 
		$.post('?url=main&id=page',{al:$('#chanm').val()},function(data){
			      $('#mainContentPage').html(data);
			});
			
			navbar();
			
		
		}

function searching(){

	$.post('?url=main&id=page',{sear:$('#categorySelectData').val(),searkey:$('#searchkeyword').val(),seartype:$('#chanm').val()},function(data){
			      $('#mainContentPage').html(data);
				  
				});
				
								  	$.post('?url=main&id=page',{sear:$('#categorySelectData').val(),seartype:$('#chanm').val(),searkeyyy:$('#searchkeyword').val(),searchpaging:"df"},function(data){
			      $('#paging').html(data);  
	});
				 
				
	}

function jump(name,jum)
{
	window.location = '?url='+name+'&id='+jum+'&typ='+$('#chanm').val();
}	


	
function navbar()
{
	$.post('?url=main&id=page',{pg:$('#chanm').val(),ln:"pagin"},function(data){
			      $('#paging').html(data);
			});
}

function pag()
{
	$.post('?url=main&id=page',{pp:$('#chanm').val(),paging:$('#paging').val()},function(data){
			      $('#mainContentPage').html(data);
			});
			
}


function deletecartitem(iditem){
    $.post('?url=carting&id=009',{del:'item',id:iditem},function(data){
		window.location = '<?php echo HOST; ?>/Techspin/';
		})
	}

function paymentsubmit(){
	var dat = new Date();
	var mon = dat.getMonth()+1;
	var todaydate = dat.getFullYear()+"-"+ mon +"-"+ dat.getDate();
	
	if($('#payretdate').val() == "" || $('#phonenum').val()==""){
	alert("Some data missing");}else
	{
	$.post('?url=carting&id=009',{payments:"payment",retdate:$('#payretdate').val(),phonenumber:$('#phonenum').val(),toddate:todaydate},function(info){
		$('#payment').html(info);
		});
	
	}
}


</script>
</head>

<body onload="chanmov(),navbar(),carthide()">
<div id="cartsshow">
  <div id="showingcartitems">
    <h1>Your Cart</h1>
      <?php
	     
		 $total = 0;
 
echo'<table width="600" border="0" id="carttable" cellspacing="10" cellpadding="5">';
		  for($j=1;$j<=$_SESSION['cartnum'];$j++)
		    {  $total = $total+$_SESSION["cart"][$j]["cost"];
				printf('
		 
  <tr>
    <td> %s</td>
    <td><img src="%s" alt="img" width=50 height=50></td>
    <td>Price: %s</td>
	<td><button class="delitemcart" onclick= "deletecartitem(%s)">X</button></td>
  </tr>
',$_SESSION["cart"][$j]["name"],$_SESSION["cart"][$j]["img"],$_SESSION["cart"][$j]["cost"],$j); 
			}
			 //$_SESSION['cart'][$_SESSION['cartcount']]['name'];
			 printf('<tr>
    <td> </td>
    <td></td>
    <td>TOTAL COST (Perday) : %s</td>
	<td></td>
  </tr>',$total);
			
	   echo '</table>';
	  ?>
      <button class="butt" onclick= "carthide()">Continue Shopping</button>&nbsp;&nbsp;&nbsp;
    <button class="butt"  onclick="payshow()">Pay</button>
    
  </div>
  <div id="payment">
 
        <?php
		
		if($_SESSION['cartnum'] >0)
		{
			echo ' <table width="600" border="0" id="paytable" cellspacing="10" cellpadding="10">
         <tr>
        <td>Return Date: [year-month-day] (eg:2012-12-13)</td>
        <td><input type="date" id="payretdate"></td>
      </tr>
      <tr>
        <td>Phone-Number</td>
        <td><input type="text" id="phonenum"></td>
      </tr>
       <tr>
        <td>Submit :</td>
        <td><input type="submit" value="Submit" onclick="paymentsubmit()"></td>
      </tr>
          
          </table>';
		}
		
		?>
  </div>
</div>
<!-- This is the Top bar of the page-->
  <div id="topPageBar">
      <a href="<?php echo HOST; ?>/Techspin"><span id="topPageBarDesign">Online Movie Rental</span></a>
      <input type="text" name="search" id="searchkeyword"  />
      <span id="categorySelection">
          <select id="categorySelectData">
          <option>All</option>
          <option>Comedy</option>
          <option>Drama</option>
          <option>Action</option>
          <option>Art</option>
          </select>
      </span>&nbsp;&nbsp;
      <span class="searchButt" onclick="searching()" >Search</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <span>
          <select id="chanm">
          <option>Hollywood</option>
          <option>Bollywood</option>
          </select>
      </span>&nbsp;&nbsp;&nbsp;
      <span class="searchButt" onclick="chanmov()">Change</span>
      <span id="cartItemInfo"><?php echo $_SESSION['cartnum']; ?>  Items In Cart </span>
      <span id="cartItems" onclick="cartshow()"><img src="Images/shop.png" /></span>
  </div>
 

   <!--Content Navigation Page-->
      <div id="contentNavigation">
      
            <div id="innerContentNavigation">
            <span id='pagefont'>Page :</span> 
            <select id="paging" onchange="pag()">
       
          </select>
            </div>
      
      </div>
  
  <!--COntennt Div-->
           <div id="mainContentPage">
           
              
               
              
              
           </div>
           
       <!--Fotter-->
       
         <div id="footer">
               Copyrights 2011 - 2012
</div>
              
</body>
</html>






