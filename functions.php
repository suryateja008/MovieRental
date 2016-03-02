<?php

// This will load a Page Bar
function topPageBar()
{
	echo '
	 
   <div id="topPageBar">
   <a href="index.php"><span id="topPageBarDesign">Online Movie Rental</span></a>
  <span id="cartItemInfo">1 Items In Cart</span>
  <span id="cartItems"><img src="Images/shop.png" /></span>
  </div>
	';
}

topPageBar();


?>