<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



<html xmlns="http://www.w3.org/1999/xhtml">



<head>



<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />



<title>PHONE.CA - Phones</title>



<link rel="stylesheet" type="text/css" href="CustomerService.css" />

<link rel="stylesheet" type="text/css" href="Cart.css" />



</head>







<body>



<!-- Main Website Holder -->



<div id="holder">



<!-- Top Side of the Website -->

	<div class="Top-Side">

		<? include("Includes/header.php"); ?>

		<h1>Phones&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>

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

		$host = "humbermedia2.ca";

		$username = "humb2ca_d78t2";

		$password = "dare_to_dream_0708";

		

		$db_name = "humb2ca_d";

		$table_name = "Syed_Gilani_STR_Item";

		

		if($dbh=@mysql_connect($host, $username, $password))

		{}

		else

		{

			die('<hr>You cannot connect to mysql because:' . mysql_error());

		}

		

		if($dbconn=@mysql_select_db($db_name, $dbh))

		{}

		else

		{

			die('<hr>You cannot connect to database because:' . mysql_error());

		}

//-------------- Getting data from a specific row ----------------	



		$ItemID = $_REQUEST['txtHiddenIntItemID'];

			

		$sqlString1 = "select * from $table_name where intItemID = '$ItemID'";

		$result1 = @mysql_query($sqlString1, $dbh) or die ("Couldn't execute query");

		$Obtain = mysql_fetch_array($result1);

		

		$Picture = $Obtain['strImage'];

		$Price = $Obtain['curItemPrice'];

		$NewPrice = $Obtain['curItemNewPrice'];	

		

		$Price = number_format($Price, 2);

			

		if ($NewPrice == '')

		{

			$CurPrice = $Price;

			$Discount = 0;

			$Discount = number_format($Discount, 2);

		}

		else

		{

			$Discount = $Price - $NewPrice;

			$Discount = number_format($Discount, 2);

			$CurPrice = $Price - $Discount;

			$CurPrice = number_format($CurPrice, 2);

		}

		

		$strText = $Obtain['strItemDescription'];	

		$Text = explode(". ", $strText);

			

				

		?>

		<span><h2>

		<? 

		//------------------- Displaying dynamic content into Website ------------------------	

				echo $Obtain['strItemCast'] . " " . $Obtain['strItemName'] . " " . $Obtain['strCategory'];?>

		</h2></span>

		<div class="picture">

			<? echo "<img src=\"http://www.humbermedia2.ca/portfolio0708/syed_gilani/php/Products/Phone/Images/$Picture" . ".jpg\" alt=\"" . $Obtain['strItemName'] . "\" border='0' width='170px'>";?><br /><br /><br />

   			<? echo "<a href=EmailFriend.php?txtHiddenIntItemID=" . $Obtain['intItemID'] . ">" . "Send this page<br />to a friend" . "</a>";?><br /><br /><? echo "<a href=ReviewPage.php?txtHiddenIntItemID=" . $Obtain['intItemID'] . ">" . "Customer<br />Reviews" . "</a>";?>

		</div>

		<div class="info1">

			<table>

            	<tr>

                	<td class="name" style="font-size:13px">Our Price:</td>

                    <td class="desc1" style="font-size:13px"><?=  "$ " . "$Price"; ?></td>

                </tr>

                <tr>

                	<td class="name" style="font-size:13px">Discount:</td>

                    <td class="desc1" style="font-size:13px"><?=	"-$ " . "$Discount"; ?></td>

            	</tr>

                <tr>

                	<td class="name" style="color:#FF0000; font-weight:bold; font-size:13px">Sale Price:</td>

                    <td class="desc1" style="color:#FF0000; font-weight:bold; font-size:13px"><?=  "$ " . "$CurPrice"; ?></td>

                </tr>

                <tr>    

                    <td class="name" style="font-size:16px">Release Date:</td>

                    <td class="desc"><?=  $Obtain['dtReleaseDate']; ?></td>

                </tr>

                <tr>    

                    <td colspan="2" style="text-align:left; padding-left:15px"><br /><u style="text-align:center">Description:</u><br /><br /><? $x=0; while($x<20){echo $Text[$x] . "<br />"; $x++;} ?></td>

                </tr>

        	</table>

		</div>	

	</div>



<!-- Footer -->



	<div id="footer">

		<? include("Includes/footer.php"); ?>

	</div>



</div>



</body>



</html>



