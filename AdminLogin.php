<? session_start(); ?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



<html xmlns="http://www.w3.org/1999/xhtml">



<head>



<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />



<title>PHONE.CA - Admin Login</title>



<link rel="stylesheet" type="text/css" href="CustomerService.css" />

<link rel="stylesheet" type="text/css" href="Cart.css" />

<script language="javascript">

	function lod()

	{

		document.Login.Username.focus();

		document.Login.Username.select();

	}

	

	function goforward()

	{

		location.href = "Admin.php";

	}

	

	function forgotpass()

	{

		location.href = "ForgotPass.php";

	}



</script>

</head>



<body onLoad="lod()">



<!-- Main Website Holder -->



<div id="holder">



<!-- Top Side of the Website -->



	<div class="Top-Side">



		<? include("Includes/header.php"); ?>



		<h1>Admin Login&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>



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

		echo "<center><h3>Admin Login Page</h3>";

		echo "</center>";

?>

		<form name="Login" action="AdminLogin.php" method="post">

<?

		if ($_REQUEST['PassCheck']=="Passed")

		{

	

			// Connection URL information.

			$host       = 'humbermedia2.ca';

			$username   = 'humb2ca_d78t2';

			$password   = 'dare_to_dream_0708';

			 

			// Database information.

			$db_name    = 'humb2ca_d';

			$table_name = 'Syed_Gilani_STR_Admin';

			

			// Read POST form variables.

			$strUsername = trim($_POST['Username']);

			$strPassword = trim($_POST['Password']);

			

			// Connect to MySQL

			$connection = @mysql_connect($host, $username, $password) or die("DB connect error");

			

			// Select the database

			$db = @mysql_select_db($db_name, $connection) or die("DB couldn't select");

			

			// SQL

			// Should be SELECT * FROM admin_table where username, password match

			$sqlString = "SELECT * FROM $table_name";

		

			$result = @mysql_query($sqlString, $connection) or die("Could not execute query.");

			

			$icount = 0;

			

			while ($recordset = @mysql_fetch_array($result)) 

			{

				if ($strUsername == $recordset['strUsername']) 

				{

					if ($strPassword == $recordset['strPassword']) 

					{

						// Success!

						$icount += 1;

					}

				}

			}

			

			if ($icount > 0) 

			{

?>

				<script language="javascript">

                    goforward();

                </script>

<?         

			 }

			 else

			 {

?>

					<font size="2" color="#FF0000"><em>Incorrect Login or Password.</em></font>

<?		 	

			 }

		}

	

?>

		<center>

        <br />

			<table cellpadding="1" border="1">

				<tr>

    				<td width="175" height="25" align="left">

      					<strong>User Name</strong>

       				</td>

					<td width="181" align="justify"> 

          				<input type="text" size="25" maxlength="20" name="Username" />

	         		</td>

 				</tr>

	    		<tr>

                   	<td height="31" height="25" align="left">

        				<strong>Password</strong>

	        		</td>

		   			<td align="justify">

        	   			<input type="password" size="25" maxlength="20" name="Password" />

            		</td>

	    		</tr>

		 	</table>

				

  			<input type="hidden" name="PassCheck" value="Passed" />

      		&nbsp;<br />

      		<input type="submit" value="Login" width="50" size="50" /> 

      		<input type="reset" value="Reset" width="30" /><br />

      		<input type="button" value="Forgot Password" width="20" onclick="forgotpass()" />

		</center>

	</form><br /><br /><br /><br /><br />



	</div>



<!-- Footer -->



	<div id="footer">

		<? include("Includes/footer.php"); ?>

	</div>



</div>

</body>

</html>

