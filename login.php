<? session_start(); ?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



<html xmlns="http://www.w3.org/1999/xhtml">



<head>



<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />



<title>PHONE.CA - Customer Login</title>



<link rel="stylesheet" type="text/css" href="CustomerService.css" />

<link rel="stylesheet" type="text/css" href="Cart.css" />



	<script language="javascript">

		function Redirct()

		{

			location.href="OrderPage.php";

		}

		function viewInvoice(OrdId)

		{

			location.href="ViewInvoice.php?OrderId="+OrdId;

		}

		function lod()

		{

			document.Login.UserName.focus();

			document.Login.UserName.select();

		}

		function Forgot()

		{

			location.href="ForgotPassSubscribe.php"

		}

	</script>



</head>



<body onLoad="lod()">

<?

		$iCheck=0;

		$iCheck1=0;

		if ($_REQUEST['intOrderCnfm']=="1")

		{

			$gotoOrder=1;

	        echo "<form action=\"login.php?intOrderCnfm=1\" name=\"Login\" method=\"post\">";

			$iCheck=1;

		}

		

		if ($_REQUEST['intOrderCnfm']=="3")

		{

			$gotoOrder=3;

			$OrdId=$_REQUEST['OrderId'];

		    echo "<form action=\"login.php?intOrderCnfm=3&OrderId=". $OrdId . "\" name=\"Login\" method=\"post\">";

			$iCheck=1;

		}	

		

		if ($iCheck=0)

		{

			$gotoOrder=0;

	        echo "<form action=\"login.php\" name=\"Login\" method=\"post\">";

		}

?>



<!-- Main Website Holder -->



<div id="holder">



<!-- Top Side of the Website -->



	<div class="Top-Side">



		<? include("Includes/header.php"); ?>



		<h1>Customer Login&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>



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



	<form action="login.php" method="post">



<?

	echo "<center><h3>Customer Login Page</h3>";

	echo "</center>";

	

	$UserName=$_REQUEST['UserName'];

	$Passw=$_REQUEST['Passw'];

		

	if ($_REQUEST['pass'] == "passed")

	{

		$iCount=0;

		include("application_functions.php"); 

		$dbh=db_connect();

		$table_name1 = "Syed_Gilani_STR_Subscribe";

			

		$strSQLQuery = "SELECT * FROM Syed_Gilani_STR_Subscribe where strUserName='$UserName'";

	    $result2 =@mysql_query($strSQLQuery, $dbh) or die ("Couldn't execute query");

		$rs4 = mysql_fetch_array($result2);

			

		if ($rs4['strUserName'] != $UserName)

		{

			echo "<font color=\"Red\" size=\"2\">Username does not exist - Bad Login. </font><br /><br />";

		}

		else

		{

			if ( $rs4['strPassword'] == $Passw)

			{

				$_SESSION['Login']=$UserName;

				if ($gotoOrder==0)

				{

					echo "<font color=\"Blue\" size=\"2\">Login Successful. You can continue with shopping. Thanks for visiting us</font> <br /><br />";

				}

				if ($gotoOrder==1)

				{

?>

					<script language="javascript">

						Redirct()

					</script>

<?					

				}

				if ($gotoOrder==3)

				{

					$_SESSION['OID']=$OrdId;

					$_SESSION['login']=$UserName;

?>

					<script language="javascript">

						viewInvoice(<?=$OrdId?>)

					</script>

<?		

				}

			}

			else

			{

				echo "<font color=\"Red\" size=\"2\">Password does not match.</font> <br /><br />";

			}

		}

	}

?>        

            <center>

				<table border="1" cellpadding="1" align="center">

                	<tr>

                    	<td>User Name: </td> <td><input type="text" name="UserName" value="<?=$UserName?>" /></td></tr><tr>

    	        	    <td>Password: </td><td><input type="password" name="Passw" /></td></tr><tr>

                        <input type="hidden" name="pass" value="passed" />

                        <td colspan="2" align="center"><input type="submit" value="Login" />

                        <input type="button" name="ForgotPass" value="Forgot Password" onClick="Forgot()" />

                        </td>

            		</tr>

            	</table>

            	

				<br /><br /><font size="2" color="#3366FF">

                New Users: Click &nbsp;&nbsp;<a href = "register.asp">Subscribe</a>&nbsp;&nbsp; for Sign Up</font>

		     </center>

			</form><br /><br /><br /><br /><br /><br /><br />

	</div>



<!-- Footer -->



	<div id="footer">

		<? include("Includes/footer.php"); ?>

	</div>



</div>

</body>

</html>