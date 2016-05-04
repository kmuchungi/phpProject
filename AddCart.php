<? session_start(); ?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



<html xmlns="http://www.w3.org/1999/xhtml">







<head>







<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />



<title>PHONE.CA - View Cart</title>



<link rel="stylesheet" type="text/css" href="CustomerService.css" />

<link rel="stylesheet" type="text/css" href="Cart.css" />



<script language="javascript">

	function goback()

	{

		window.history.go(-1);

	}

	

	function Redirct()

	{

		location.href="OrderPage.php";

	}

</script>





</head>



<body>



<!-- Main Website Holder -->



<div id="holder">



<!-- Top Side of the Website -->



	<div class="Top-Side">



		<? include("Includes/header.php"); ?>



		<h1>View Basket&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>



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



	<form action="AddCart.php" method="post">



<?

	$prodId=$_REQUEST['txtHiddenIntItemID'];

	

	include("application_functions.php"); 

	$dbh=db_connect();

	$table_name1 = "Syed_Gilani_STR_Item";

	

	if ($_REQUEST['press']!="pressed" && $prodId!="")

	{

		$strSQLQuery = "SELECT * FROM $table_name1 WHERE (strActive='y' OR strActive='Y') AND intItemID= $prodId";

        $result =@mysql_query($strSQLQuery, $dbh) or die ("Couldn't execute query");

		$rs = mysql_fetch_array($result);

	}

	

	$PID = 0;

	$PPNAME = 1;

	$PPRICE = 2;

	$IMAGE = 3;

	$QUANTITY = 4;



	$iExist=0;

	$iQty=0;

	$iTot=0;

	

	if ($_REQUEST['press']=="pressed")

	{

//		session_unset();



		for ($n=0; $n<=20; $n++)

		{

			$_SESSION['cart'][$QUANTITY][$n] = $_REQUEST[$n];

		}

	}

	

	if (!isset($_SESSION['cart']))

	{

		$_SESSION['cart']=array();

	}

	

	if ($prodId=="" && $_SESSION['cart'][$PID][0]=="")

	{

		echo "<br /><br /><br /><br /><br /><br /><br /><center><font color=\"Blue\"> Your cart is empty, Please start shopping with us. Thanks. </font></center>";

	}

	else

	{

		if ($_REQUEST['press']!="pressed") 

		{

			if ($rs['strDeal']=="y" || $rs['strDeal']=="Y") 

			{

				$ProdPrice = $rs['curItemNewPrice'];

			}

			else

			{	

				$ProdPrice = $rs['curItemPrice'];

			}

		

			$ProdName = $rs['strItemCast']. " " .$rs['strItemName'];

			$ProdIMAGE = $rs['strImage'];

		

			for ($n=0; $n<=20; $n++)

			{

				if ($_SESSION['cart'][$PID][$n]==$prodId)

				{

					$_SESSION['cart'][$QUANTITY][$n] = $_SESSION['cart'][$QUANTITY][$n]+1;

					$iExist=1;

				}

			}

		

			if($iExist == 0)

			{

				if ($_SESSION['cart'][$PID][20]=="") 

				{

					for ($j=0; $j<=20; $j++)

					{

						if ($_SESSION['cart'][$PID][$j]=="")

						{

							$_SESSION['cart'][$PID][$j] = $prodId;

							$_SESSION['cart'][$PNAME][$j] = $ProdName;

							$_SESSION['cart'][$PPRICE][$j] = $ProdPrice;

							$_SESSION['cart'][$IMAGE][$j] = $ProdIMAGE;

							$_SESSION['cart'][$QUANTITY][$j] = 1;

							break;

						}

					}

				}

			}

		}

	

		$iCount=-1;

		echo "<br /><center><table width=\"600\" border = \"1\" cellspacing = \"1\">";

		echo "<td width=\"80\" bgcolor=\"#999999\"><b>Select to Delete</b></td><td width=\"80\" bgcolor=\"#999999\"><b>Pic</b></td><td width=\"400\" bgcolor=\"#999999\"><b>Name</b></td><td width=\"70\" bgcolor=\"#999999\"><b>Price</b></td><td width=\"100\" bgcolor=\"#999999\"><b>Qty</b></td><td width=\"70\" bgcolor=\"#999999\"><b>Total</b></td></b>";

							

		for ($k=0; $k<=20; $k++)

		{

			echo "<tr><td align = \"center\">";

			echo "<input type=\"checkbox\" value=\"" . $_SESSION['cart'][$PID][$k] . "\" /></td><td align = \"center\">";

			echo "<img src = \"/portfolio0708/syed_gilani/php/Products/Phone/Images/" . $_SESSION['cart'][$IMAGE][$k] . ".jpg\" width=\"40\" align=\"center\" height = \"40\" /></td><td  align=\"left\">";

			echo $_SESSION['cart'][$PNAME][$k] . "</td><td align = \"right\">";

			echo "$" . number_format($_SESSION['cart'][$PPRICE][$k],2) . "</td><td align = \"center\">";

			echo "<input type=\"text\" size=\"5\" value=" . $_SESSION['cart'][$QUANTITY][$k] . " name=" . $k . " /></td><td align = \"right\">";

			echo "$" . number_format(($_SESSION['cart'][$PPRICE][$k] * $_SESSION['cart'][$QUANTITY][$k]),2) . "</td></tr>";

			$iQty=$iQty+$_SESSION['cart'][$QUANTITY][$k];

			$iTot=$iTot+($_SESSION['cart'][$PPRICE][$k] * $_SESSION['cart'][$QUANTITY][$k]);

					

			$iCount=$iCount+1;

			if ($_SESSION['cart'][$PID][$k+1]=="")

			{

				break;

			}

		}

				

		echo "<tr><td colspan=\"4\" bgcolor=\"#999999\"><b>TOTAL</b></td>";

		echo "<td align=\"center\" bgcolor=\"#999999\"><b>" . $iQty . "</b></td><td bgcolor=\"#999999\" align = \"right\"><b>$" . number_format($iTot,2) . "</b></td>";

		echo "<input type=\"hidden\" name=\"press\" value=\"pressed\" />";

		echo "<input type=\"hidden\" name=\"limit\" value=" . $iCount . " />";

		echo "</tr></table><br />";

		echo "<input type=\"Submit\" value=\"Save Changes\" />";

		if ($iCount<=-1) 

		{

			echo "<input type=\"Button\" disabled=\"disabled\" value=\"Order Confirmation\" onclick=\"Redirect($iCount)\" /></center>";

		}

		else

		{

			echo "<input type=\"Button\" value=\"Order Confirmation\" onclick=\"Redirct()\" /></center>";

		}

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