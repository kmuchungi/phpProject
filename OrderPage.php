<? session_start(); ?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



<html xmlns="http://www.w3.org/1999/xhtml">



<head>



<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />



<title>PHONE.CA - Order Page</title>



<link rel="stylesheet" type="text/css" href="CustomerService.css" />

<link rel="stylesheet" type="text/css" href="Cart.css" />



<script language="javascript">

	function goRegister()

	{

		location.href="login.php?intOrderCnfm=1";

	}

	function done()

	{

		location.href="index.php"

	}

</script>	



</head>



<body>

<?

	if ($_SESSION['Login']=="")

	{

?>

		<script language="javascript">

			goRegister()

		</script>

<?

	}

?>





<!-- Main Website Holder -->



<div id="holder">



<!-- Top Side of the Website -->



	<div class="Top-Side">



		<? include("Includes/header.php"); ?>



		<h1>Order Page&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>



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



	<form action="OrderPage.php" method="po st">

<?

	if ($_SESSION['Login']=="")

	{

?>

		<script language="javascript">

			goRegister()

		</script>

<?

	}

	else

	{

		$PID = 0;

		$PPNAME = 1;

		$PPRICE = 2;

		$IMAGE = 3;

		$QUANTITY = 4;



		if (!isset($_SESSION['cart']))

		{

			$_SESSION['cart']=array();

		}			

		if ($_SESSION['cart'][0][0]=="")

		{

?>

			<script language="javascript">

				done();

			</script>

<?

		}

		echo "<center><H3>Order Confirmation Form</h3></center>";



		$UsrName=$_SESSION['Login'];

		$TotPrice=$_REQUEST['TotPrice'];

		$TotQty=$_REQUEST['Qty'];

		$PayCard=$_REQUEST['paycard'];

		$CardNo=$_REQUEST['CardNo'];

		$ExpMonth=$_REQUEST['ExpMonth'];

		$ExpYear=$_REQUEST['ExpYear'];



		$iValid=0;

		$iUpdated=0;



		if ($_REQUEST['pass']=="passed")

		{

			if ($CardNo=="" || $CardNo=="/")

			{

				echo "<font color=\"Red\" size=\"2\"> You have not entered the credit card number</font><br />";

				$iValid=1;

			}

			else

			{

				if (strlen($CardNo)!=16)

				{

				  echo "<font color=\"Red\" size=\"2\"> Credit Card Number should have 16 digits</font><br />";

				  $iValid=1;

				}

			}		

		

			if ($ExpMonth=="" || $ExpMonth=="/")

			{

				echo "<font color=\"Red\" size=\"2\"> You have not entered Expiry Month</font><br />";

				$iValid=1;

			}

			else

			{

				if ($ExpMonth < 1 || $ExpMonth >12)

				{

				   echo "<font color=\"Red\" size=\"2\"> Month is not valid</font><br />";

				   $iValid=1;

				}

			}



			if ($ExpYear=="" || $ExpYear=="/")

			{

				echo "<font color=\"Red\" size=\"2\"> You have not entered Expiry Year</font><br />";

				$iValid=1;

			}

			else

			{

					if ($ExpYear < 1 || $ExpYear >99)

					{

					   echo "<font color=\"Red\" size=\"2\"> Year is not valid</font><br />";

					   $iValid=1;

					}

			}

			

			if ($iValid==0)

			{

				include("application_functions.php"); 

				$dbh=db_connect();

				$table_name1 = "Syed_Gilani_STR_Subscribe";

				$table_name2 = "Syed_Gilani_STR_OrderPage";

				$table_name3 = "Syed_Gilani_STR_OrderItems";

	

				$strGetEmailAdd="Select strEmail, strUserName from $table_name1";

				$result =@mysql_query($strGetEmailAdd, $dbh) or die ("1Couldn't execute query");

		

				while($rs4 = mysql_fetch_array($result))

				{

					if ($rs4['strUserName']==$UsrName)

					{

						$EmailAddr=$rs4['strEmail'];

						break;

					}

				}

	

				$strMax = "Select intOrderId from $table_name2 ORDER BY intOrderId DESC";

				$result2 =@mysql_query($strMax, $dbh) or die ("3Couldn't execute query");

				$rs2 = mysql_fetch_array($result2);

				$MaxOrderId= $rs2['intOrderId'];

				$MaxOrderId=$MaxOrderId+1;



				$strSQLQuery= "Insert into $table_name2 values(". $MaxOrderId . ", '".$UsrName."', ".$TotPrice.", ".$TotQty.", '".$PayCard."', '".$CardNo."', '".$ExpYear."', '".$ExpMonth."')";

				$result3 =@mysql_query($strSQLQuery, $dbh) or die ("2Couldn't execute query");

												

				for ($k=0; $k<=20; $k++)

				{

					$strRecQuery= "Insert into $table_name3 values(" . $MaxOrderId . ", " . $_SESSION['cart'][$PID][$k] . ", '".$_SESSION['cart'][$PNAME][$k] . "', '". $_SESSION['cart'][$QUANTITY][$k] . "', '". $_SESSION['cart'][$PPRICE][$k] . "')";

	

					$result3=@mysql_query($strRecQuery, $dbh) or die ("4Couldn't execute query");

	

					if ($_SESSION['cart'][$PID][$k+1]=="")

					{

						break;

					}

				}

	

				generatemail ($MaxOrderId, $EmailAddr);

				

				echo "<center><font size=\"2\" color=\"Blue\"><em>Order is confirmed and e-mail to check invoice is generated at your email address. Thanks for shopping with us. </em></font><center>";

								

				session_unset();

				$iUpdated=1;

				}

		}



		if ($iUpdated==0)

		{

			$iCount=-1;

			echo "<br /><center><table width=\"600\" border = \"1\" cellspacing = \"1\">";

			echo "<td width=\"80\" bgcolor=\"#999999\"><b>Pic</b></td><td width=\"400\" bgcolor=\"#999999\"><b>Name</b></td><td width=\"70\" bgcolor=\"#999999\"><b>Price</b></td><td width=\"100\" bgcolor=\"#999999\"><b>Qty</b></td><td width=\"70\" bgcolor=\"#999999\"><b>Total</b></td></b>";



			for ($k=0; $k<=20; $k++)

			{

				echo "<tr><td align = \"center\">";



				echo "<img src = \"/portfolio0708/syed_gilani/php/Products/Phone/Images/" . $_SESSION['cart'][$IMAGE][$k] . ".jpg\" width=\"40\" align=\"center\" height = \"40\" /></td><td  align=\"left\">";

				

				echo $_SESSION['cart'][$PNAME][$k] . "</td><td align = \"right\">";

				

				echo "$" . number_format(($_SESSION['cart'][$PPRICE][$k]),2) . "</td><td align = \"center\">";

				

				echo "<input type=\"text\" disabled=\"disabled\" size=\"5\" value=\"" . $_SESSION['cart'][$QUANTITY][$k] . "\" name=\"" . $k . "\" /></td><td align = \"right\">";

				

				echo "$" . number_format(($_SESSION['cart'][$PPRICE][$k] * $_SESSION['cart'][$QUANTITY][$k]),2) . "</td></tr>";

				$iQty=$iQty + ($_SESSION['cart'][$QUANTITY][$k]);

				$iTot=$iTot+($_SESSION['cart'][$PPRICE][$k] * $_SESSION['cart'][$QUANTITY][$k]);

				$iCount=$iCount+1;

				if ($_SESSION['cart'][$PID][$k+1]=="")

				{

					break;

				}

			}

			echo "<tr><td colspan=\"3\" bgcolor=\"#999999\"><b>TOTAL</b></td>";

			echo "<td align=\"center\" bgcolor=\"#999999\"><b>" . $iQty . "</b></td><td bgcolor=\"#999999\" align = \"right\"><b>$" .  number_format(($iTot),2) . "</b></td>";



			echo "<input type=\"hidden\" name=\"TotPrice\" value=\"" . $iTot . "\" />";

			echo "<input type=\"hidden\" name=\"Qty\" value=\"" . $iQty . "\" />";

			echo "<input type=\"hidden\" name=\"limit\" value=\"" . $iCount . "\" />";

			echo "</tr></table><br />";

			

			echo "<fieldset><legend>Payment</legend><table width=\"600\"><tr><td colspan=\"3\">";

		

			if ($PayCard=="Visa" || $PayCard=="")

			{

				echo "<input type=\"radio\" checked=\"checked\" name=\"paycard\" value=\"Visa\"><img src=\"/portfolio0708/syed_gilani/php/Products/Phone/Images/Visa.gif\" width=\"40\" height=\"30\" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

			}

			else

			{

				echo "<input type=\"radio\" name=\"paycard\" value=\"Visa\"><img src=\"/portfolio0708/syed_gilani/php/Products/Phone/Images/Visa.gif\" width=\"40\" height=\"30\" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

			}

			

			if ($PayCard=="Master")

			{

				echo "<input type=\"radio\" checked=\"checked\" name=\"paycard\" value=\"Master\"><img src=\"/portfolio0708/syed_gilani/php/Products/Phone/Images/Master.gif\" width=\"40\" height=\"30\" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

			}

			else

			{

				echo "<input type=\"radio\" name=\"paycard\" value=\"Master\"><img src=\"/portfolio0708/syed_gilani/php/Products/Phone/Images/Master.gif\" width=\"40\" height=\"30\" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

			}

			

			if ($PayCard=="AmericanExpress")

			{

				echo "<input type=\"radio\" checked=\"checked\" name=\"paycard\" value=\"AmericanExpress\"><img src=\"/portfolio0708/syed_gilani/php/Products/Phone/Images/USAExpress.gif\" width=\"40\" height=\"30\" /></td></tr>";

			}	

			else

			{

				echo "<input type=\"radio\" name=\"paycard\" value=\"AmericanExpress\"><img src=\"/portfolio0708/syed_gilani/php/Products/Phone/Images/USAExpress.gif\" width=\"40\" height=\"30\" /></td></tr>";

			}



			echo "<tr><td colspan=\"2\">Card No: <font size=\"2\">(16 Digits) </font><input type=\"text\" name=\"CardNo\" maxlength=\"16\" value=" . $CardNo . " />";

			echo "</td><td>Expiry: (mm-yy) <input type=\"text\" name=\"ExpMonth\" size=\"5\" maxlength=\"2\" value=" . $ExpMonth . " />";

			echo "<input type=\"text\" name=\"ExpYear\" size=\"5\" maxlength=\"2\" value=" . $ExpYear . " /></td></tr></table></fieldset>";

			echo "<br />";



			echo "<input type=\"hidden\" name= \"pass\" value=\"passed\">";

			echo "<input type=\"Submit\" value=\"Order Confirmation\">";

		}

}





		function generatemail($OrderId, $EmailAdd)

		{

			$strSub="Confirmation for Your Order at Phone.ca";

				

			$MailBody = "Thankyou for shopping with us.<br /><br />";

			$MailBody = $MailBody . "We will expect you shopping at our site regularly because of our competitive rates ";

			$MailBody = $MailBody . "and timely shipping.<br /><br />You order number is <strong>" . $OrderId . "</strong><br />";

			$MailBody = $MailBody . "and you can check your order details by clicking on the following link<br /><br />";

			$MailBody = $MailBody . "<a href=\"http://humbermedia2.ca/portfolio0708/syed_gilani/php/Products/Phone/login.php?intOrderCnfm=3&OrderId=". $OrderId . "\">View Invoice</a>";

	

			$MailHeaders="From:rizwangilani1@yahoo.com\nContent-Type: text/html; charset=iso-8859-1";

			

			mail($EmailAdd, $strSub, $MailBody, $MailHeaders);

		}



?>



	<br /><br /><br /><br /><br /><br /><br />



	</form>	

	</div>



<!-- Footer -->



	<div id="footer">

		<? include("Includes/footer.php"); ?>

	</div>



</div>

</body>

</html>