<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>PHONE.CA - Subscribe</title>

<link rel="stylesheet" type="text/css" href="CustomerService.css" />

<script language="javascript">

	function lod()

	{

		document.Subscribe.UserName.focus();

		document.Subscribe.UserName.select();

	}

</script>

</head>



<body>

<!-- Main Website Holder -->

<div id="holder">

<!-- Top Side of the Website -->

	<div class="Top-Side">

		<? include("Includes/header.php"); ?>

		<h1>Subscribe&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>

		<? include("Includes/Top-Links.php"); ?>

	</div>

<!-- Top Navigation Bar -->

	<div id="Menu-Holder1">

		<? include("Includes/Top-Nav.php"); ?>

	</div>

	<div id="Left-Side">

		<? include("Includes/left-side2.php"); ?>		

	</div>

<!-- Content -->

	<div id="Content" style="text-align:left">

<?

			$pattern1 = "(^[a-zA-Z]+$)";

			$pattrnEmail = "(^[\w\.-]+(\+[\w-]*)?@([\w-]+\.)+[\w-]+$)";

			$pattrnUserName = "(^[A-Z,a-z,0-9,_]{6,10}$)";

			$pattrnPassword = "((?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$)";

			

			$host = "humbermedia2.ca";

			$username = "humb2ca_d78t2";

			$password = "dare_to_dream_0708";

			$dbname="humb2ca_d";

			$table_name1 = "Syed_Gilani_STR_Subscribe";

				

			if($dbh=mysql_connect($host, $username, $password)){}

			else

			{

				die ('<hr /> I cannot connect to mysql because: ' . mysql_error());

			}	

	

			if ($dbconn=@mysql_select_db($dbname, $dbh)){}

			else

			{

				die ('<hr>I cannot connect to database because:'.mysql_error());

			}



			if ($_POST['PassCheck'] == "Passed")

			{

				$iCheck=1;

        		$FirstName = stripslashes($_POST['FirstName']);

	            $LastName = stripslashes($_POST['LastName']);

				$Address = stripslashes($_POST['Address']);

				$Email = stripslashes($_POST['Email']);

				$UserName = stripslashes($_POST['UserName']);

				$Password = stripslashes($_POST['Password']);

				$CPassword = stripslashes($_POST['CPassword']);

				$SecAnswer = stripslashes($_POST['SecurityAnswer']);

           

				if ($FirstName == "" || $LastName == "" || $Address == "" || $Email == "" || $UserName == "" || $Password == "" || $CPassword == "" || $SecAnswer == "") 

				{

					$error = $error . "Please fill out everything. <br />";

				}

				else

				{

					if (preg_match($pattern1, $FirstName)){}

					else

					{

						$error = $error . "Your First Name is NOT a valid First Name.<br />";

					}

					if (preg_match($pattern1, $LastName)){}

					else

					{

						$error = $error . "Your Last Name is NOT a valid Last Name.<br />";

					}

					if (preg_match($pattrnEmail, $Email)){}

					else

					{

						$error = $error . "Your E-mail is NOT a valid E-mail.<br />";

					}

					if (preg_match($pattrnUserName, $UserName)){}

					else

					{

						$error = $error . "Your User Name is NOT a valid User Name. User Name must be 6 to 10 characters long.<br />";

					}

					if (preg_match($pattrnPassword, $Password)){}

					else

					{

						$error = $error . "Your Password is NOT a valid Password. Please use all of the following:<ul><li>Password has to be 8 characters long.</li><li>Must contain at least 1 upper case letter.</li><li>Must contain at least 1 lower case letter.</li><li>Must contain at least 1 number or special character.</li></ul>";

					}

					if ($UserName == $Password)

					{

						$error = $error . "Your User Name and Password cannot be the same. Please re-enter Password.<br />";

					}

					if (preg_match($pattrnPassword, $CPassword)){}

					else

					{

						$error = $error . "Your password confirmation is NOT a valid Password. Please use all of the following:<ul><li>Password has to be 8 characters long.</li><li>Must contain at least 1 upper case letter.</li><li>Must contain at least 1 lower case letter.</li><li>Must contain at least 1 number or special character.</li></ul>";

					}

					if ($CPassword != $Password)

					{

						$error = $error . "The two Passwords don't match. Please enter your confirmation Password again.<br />";

					}

					if (preg_match($pattern1, $SecAnswer)){}

					else

					{

						$error = $error . "Your Security Answer is NOT a valid one.<br />";

					}



				}

			}



   			if ($_POST['PassCheck'] == "Passed")

			{



				if ($error!="")

   		        {

?>

				 	<font size="2" color="#FF0000"> <?=$error?></font>

<?	

    	        }

				else

				{

					$strEmail = "newsletter@Phone.ca";				

					$mail_to = "$Email";

					$mail_subject = "This month's Newsletter:";

					$mail_body = "<a href=\"http://www.humbermedia2.ca/portfolio0708/syed_gilani/php/Products/Phone/index.php\"><img src=\"http://www.humbermedia2.ca/portfolio0708/syed_gilani/php/Products/Phone/Images/Newsletter.jpg\"></a>";

					$mail_headers = "From:$strEmail\nContent-Type:text/html; charset=iso-8859-1";					

					mail($mail_to, $mail_subject, $mail_body, $mail_headers);

					

					

					$sqlString1 = "Insert into $table_name1 values('$FirstName', '$LastName', '$Address', '$Email', '$UserName', '$Password', '$SecAnswer')";

					$result1 =@mysql_query($sqlString1, $dbh) or die ("Couldn't execute query");

	

					echo "<em>Congratulations! You were successfully subscribe. <br />Check your email to see this month's newsletter</em>";

					

					$FirstName= "";

					$LastName= "";

					$Address = "";

					$Email = "";

					$UserName = "";

					$Password = "";

					$CPassword = "";

					$SecAnswer = "";



?>

						<script language="javascript">

                        	lod();

                        </script>



<?

				}

			}

?>         

	

	<h3 style="text-align:center">REGISTRATION</h3>

	<font color="#000000" size="2"><em> Note: </em> The fields with <font color="#FF0000"> *  </font> are necessary to enter in. </font><br /><br />

	<form class="form1" name="subscribe" action="subscribe.php" method="post">  

		<table style="text-align:left">

			<tr>

				<td width="231" align="left"><b>First Name:</b></td> 

			  <td width="323"><input name="FirstName" type="text" size="25" maxlength="25" value="<?= $FirstName?>" /><font color="#FF0000"> *  </font></td>

			</tr>

			<tr>

				<td align="left"><b>Last Name:</b></td> 

			  <td> <input type="text" name="LastName" size="25" maxlength="25" value="<?= $LastName?>" /><font color="#FF0000"> *  </font></td>

			</tr>

			<tr>

				<td align="left"><b>Address:</b></td> 

			  <td> <input type="text" name="Address" size="25" maxlength="50" value="<?= $Address?>" /><font color="#FF0000"> *  </font></td>

			</tr>

			<tr>

				<td height="24" align="left"><b>Email Address:</b></td> 

			  <td><input type="text" name="Email" size="25" maxlength="50" value="<?= $Email?>" /><font color="#FF0000"> *</font></td>

			</tr>

			<tr>

				<td align="left"><b>User Name: </b><span class="style2"><font size="2">(6 to 10 Characters)</font></span></td> 

			  <td><input type="text" name="UserName" size="25" maxlength="25" value="<?= $UserName?>" /><font color="#FF0000"> *</font></td>

			</tr>

			<tr>

				<td align="left"><b>Password: </b><span class="style2"><font size="2">(at least 8 characters)</font></span></td> 

			  	<td> <input type="password" name="Password" size="25" maxlength="25" value="<?= $Password?>" /><font color="#FF0000"> *  </font></td>

			</tr>	

			<tr>

				<td align="left"><b>Confirm Password:</b></td> 

			  <td> <input type="password" name="CPassword" size="25" maxlength="25" value="<?= $CPassword?>" /><font color="#FF0000"> *  </font></td>

			</tr>	

			<tr>

				<td align="left"><b>Security Question</b>:</td> 

			  	<td><b>What is your mother's maiden name?</b></td>

			</tr>	

			<tr>

				<td align="left"><b>Your Answer:</b></td> 

			  <td> <input type="text" name="SecurityAnswer" size="25" maxlength="25" value="<?= $SecAnswer?>" /><font color="#FF0000"> *  </font></td>

			</tr>

			<tr>

		        <td height="24" align="left">

					<input type="hidden" name="PassCheck" value="Passed" />

				</td> 

	        	<td align="justify"><br /> 	

					<input type="submit" value="Add" />

                	<input type="reset" value="Reset" />

				</td>

			</tr>

		</table>

	</form><br /><br />

	</div>

<!-- Footer -->

	<div id="footer">

		<? include("Includes/footer.php"); ?>

	</div>

</div>

</body>

</html>