<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>PHONE.CA - Hot Deals</title>

<link rel="stylesheet" type="text/css" href="CustomerService.css" />



<link rel="stylesheet" type="text/css" href="Cart.css" />



</head>

<body>

<!-- Main Website Holder -->

<div id="holder">

<!-- Top Side of the Website -->



	<div class="Top-Side">

		<? include("Includes/header.php"); ?>

		<h1>Hot Deals&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>

		<? include("Includes/Top-Links.php"); ?>

	</div>



<!-- Top Navigation Bar -->

	<div id="Menu-Holder1">

		<? include("Includes/Top-Nav.php"); ?>

	</div>



<!--- Left Column --->



	<div id="Left-Side">



		<? include("Includes/left-side2.php"); ?>	



	</div>



<!-- Content -->

	<div id="Content">

		<?



		// ------------------------------- Connect to Database --------------------------------------



		include("application_functions.php"); 

		$dbh=db_connect();

		$table_name = "Syed_Gilani_STR_Item";



		$sqlString = "select intItemID, strImage, curItemPrice, curItemNewPrice, strItemCast, strItemName from $table_name where (strDeal='y' || strDeal='Y')";



		$result = @mysql_query($sqlString, $dbh) or die ("Couldn't execute query");



		echo "<h2>New Deals</h2><br />";

		while($recordset=@mysql_fetch_array($result))

		{

			$Picture = $recordset['strImage'];



			$Price = $recordset['curItemPrice'];



			$NewPrice = $recordset['curItemNewPrice'];			



			$Discount = $Price - $NewPrice;



			$Discount = round($Discount);



			$Brand = $recordset['strItemCast'];



			$Name = $recordset['strItemName'];			



			$ItemName = $Brand . " " . $Name;



			echo "<div class=\"Phone1\"><img src=\"http://www.humbermedia2.ca/portfolio0708/syed_gilani/php/Products/Phone/Images/$Picture" . ".jpg\" alt=\"$strImage1\" height=\"100\" width=\"100\" / ><br />";



        	echo "<div class=\"price1\">Save: " . "$" . "$Discount" . "<br />";



			echo "<b>$NewPrice</b></div>";



			echo "<a href=Items-Info.php?txtHiddenIntItemID=" . $recordset['intItemID'] . " style=\"font-size:18px\">$ItemName</a>";

			

			echo "<font size=\"2\"><div class='cartbuttn'><a href=AddCart.php?txtHiddenIntItemID=" . $recordset['intItemID'] . "> Add to Basket </font></a></div></div>";

		}

?>	

	</div>



<!-- Footer -->



	<div id="footer">

		<? include("Includes/footer.php"); ?>

	</div>

</div>

</body>

</html>