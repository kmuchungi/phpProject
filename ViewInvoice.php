<? session_start(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>PHONE.CA - View Invoice</title>

<link rel="stylesheet" type="text/css" href="CustomerService.css" />
<link rel="stylesheet" type="text/css" href="Cart.css" />

</head>

<body onLoad="lod()">
<?
		$OrderId = $_REQUEST['OrderId'];
?>

<!-- Main Website Holder -->

<div id="holder">

<!-- Top Side of the Website -->

	<div class="Top-Side">

		<? include("Includes/header.php"); ?>

		<h1>View Invoice&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>

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

        <form action="ViewInvoice.php" name="View" method="post">

<?
				$OrderId=$_REQUEST['OrderId'];
				$UserName=$_SESSION['login'];
				
				include("application_functions.php"); 
				$dbh=db_connect();
				$table_name1 = "Syed_Gilani_STR_Subscribe";
				$table_name2 = "Syed_Gilani_STR_OrderPage";
				$table_name3 = "Syed_Gilani_STR_OrderItems";
	
				$strOrderDetails="Select * from $table_name2 where intOrderId= $OrderId";
				$result =@mysql_query($strOrderDetails, $dbh) or die ("1Couldn't execute query");
				$rs = mysql_fetch_array($result);

				$strOrderItems="Select * from $table_name3 where intOrderId= $OrderId";
				$result1 =@mysql_query($strOrderItems, $dbh) or die ("2Couldn't execute query");

				$strCustDetails="Select * from $table_name1";
				$result2 =@mysql_query($strCustDetails, $dbh) or die ("3Couldn't execute query");

				while($rs2 = mysql_fetch_array($result2))
				{
					if ($rs2['strUserName']==$UserName)
					{
						$FName=$rs2['strFirstName'];
						$LName=$rs2['strLastName'];
						$Addr=$rs2['strAddress'];
						$OrdId=$OrderId;
						break;
					}
				}
				
				echo "<fieldset><legend>Enter Order Id</legend>";
				echo "<center><table cellspacing=\"0\" border=\"0\"><tr><td align=\"left\">";
				echo "Enter Order No: <input type=\"text\" name=\"OrderId\" value=\"" . $OrderId . "\" /></td>";
				echo "<td width=\"20\"></td><td align=\"right\"><input type=\"Submit\" value=\"Search\" /></td>";
				echo "</tr></table></center>";
				echo "</fieldset><br />";

				echo "<fieldset>";
				echo "<legend>General</legend><br />";
				echo "<center><table width=\"500\" border=\"0\" cellspacing=\"1\" cellpadding=\"1\"></center><tr>";
				echo "<td align=\"left\"><strong>First Name:</strong></td><td align=\"left\">" . $FName . "</td><td width=\"20\"></td>";
				echo "<td width=\"50\"></td>";
				echo "<td align=\"left\"><strong>Last Name:</strong></td><td align=\"left\">" . $LName . "</td></tr>";
				echo "<td align=\"left\"><strong>Order Id:</strong></td><td align=\"left\">" . $OrdId . "</td><td width=\"20\"></td>";
				echo "<td width=\"200\"></td>";
				echo "<td align=\"left\"><strong>Address:</strong></td><td align=\"left\">" . $Addr . "</td></tr>";
				echo "</tr></table><br />";
				echo "</fieldset><br />";

				echo "<fieldset>";
				echo "<legend>Invoice Details</legend>";
				echo "<br /><center><table width=\"600\" border=\"1\" cellspacing=\"1\" cellpadding=\"1\">";
				echo "<th>Item Name</th><th>Unit Price</th><th>Quantity</th><th>Total Price</th>";

				while($rs1 = mysql_fetch_array($result1))
				{
					$ItemName=$rs1['strItemName'];
					$UnitPrice=$rs1['curProdPrice'];
					$Qty=$rs1['intProdQty'];
					$Tot=$UnitPrice*$Qty;
				   echo "<tr><td align=\"left\">" . $ItemName . "</td><td align=\"right\">" . "$" . number_format($UnitPrice, 2) . "</td><td>" . $Qty . "</td><td align=\"right\">" . "$" . number_format($Tot,2) . "</td></tr>";
				}
				echo "<tr><td colspan=\"2\" bgcolor=\"#999999\"><center><strong>TOTAL</strong></center></td>";
				echo "<td><strong>" .  $rs['intQty'] . "</strong></td><td align=\"right\"><strong>" . "$" . number_format($rs['intTotPrice'],2) . "</strong>";
				echo "</td></tr>";
				echo "</table></center><br />";
				echo "</fieldset>";
?>
		</form>
	</div>

<!-- Footer -->

	<div id="footer">
		<? include("Includes/footer.php"); ?>
	</div>

</div>
</body>
</html>
