<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



<html xmlns="http://www.w3.org/1999/xhtml">



<head>



<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />



<title>PHONE.CA - Admin</title>



<link rel="stylesheet" type="text/css" href="Add.css" />

<script language="javascript">

	function lod()

	{

		document.ModifyAdmin.SarchUserName.focus();

		document.ModifyAdmin.SarchUserName.select();

	}

</script>



<script language="javascript">



	function Redrct(SelectUser)



	{



		location.href="ModifyAdmin.php?SelectUser=" + SelectUser;



	}



</script>

</head>







<body onLoad="lod()">

<form name="ModifyAdmin" action="ModifyAdmin.php" method="post">



<!-- Main Website Holder -->



<div id="holder">



<!-- Top Side of the Website -->



	<div class="Top-Side">



		<? include("Includes/header.php"); ?>



		<h1>Admin</h1>



		<? include("Includes/Top-Links2.php"); ?>



	</div>



<!-- Top Navigation Bar -->



	<div id="Menu-Holder1">



		<? include("Includes/top-menu2.php"); ?>



	</div>



<!-- Content -->



	<div id="Content">



<?

			echo "<center>";

			echo "<h3>Modify Admin Screen</h3>";

			echo "</center>";



			$pattrnEmail = "(^[\w\.-]+(\+[\w-]*)?@([\w-]+\.)+[\w-]+$)";

			

			$host = "humbermedia2.ca";

			$username = "humb2ca_d78t2";

			$password = "dare_to_dream_0708";

			$dbname="humb2ca_d";

			$table_name1 = "Syed_Gilani_STR_Admin";

				

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

				$PrevUser=$_POST['PrevUser'];

        		$UsrName= $_POST['UserName'];

	            $Psswrd=$_POST['Psswrd'];

   	         	$CnfmPsswrd=$_POST['CnfmPsswrd'];

   	         	$SecurityQuest=$_POST['SecurityQuest'];

   	         	$SecurityAns=$_POST['SecurityAns'];

            	$Email=$_POST['Email'];

            

				if ($UsrName == "")

				{

					$error = $error . "User Name field cannot be empty <br />";

				}

				else

				{

					if ($UsrName != $PrevUser)

					{

						$sqlString = "Select strUsername from $table_name1 where strUsername='$UsrName'";

						$result =@mysql_query($sqlString, $dbh) or die ("Couldn't execute query1");

						$chkUsrName=mysql_fetch_array($result);

						

						if ($chkUsrName)

						{

							$error = $error . "User Name already exists. <br />";

						}

					}

				}



				if ($Psswrd == "")

				{

					$error = $error . "Password field cannot be empty. <br />";

				}

				

				if ($CnfmPsswrd == "")

				{

					$error = $error . "Confirm Password field cannot be empty. <br />";

				}

					

				if ($SecurityAns == "")

				{

					$error = $error . "Security Answer field cannot be empty. <br />";

				}

				

				if ($Email == "")

				{

					$error = $error . "Email field cannot be empty. <br />";

				}

				else

				{

					if (preg_match($pattrnEmail, $Email)){}

					else

					{

						$error = $error . "The Email address is not in proper format.<br />";

					}



				}

				if ($Psswrd != "" && $CnfmPsswrd != "")

				{

					if ($Psswrd != $CnfmPsswrd)

					{

						$error = $error . "Password and Confirm Password fields does not match. <br />";

					}

				}

			}

?>

  <br /><br />

        	

<?

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

//					$sqlString2 = "Update $table_name1 set strUsername=\"$UsrName\", strPassword=\"$Psswrd\", strActiveOrNot =\"y\", strEmailAddress=\"$Email\" where strUsername=\"$PrevUser\"";

						$sqlString2 = "Update $table_name1 set strUsername=\"$UsrName\", strPassword=\"$Psswrd\", strActiveOrNot =\"y\", strEmailAddress=\"$Email\", strSecurityQuestion=\"$SecurityQuest\", strSecurityAnswer=\"$SecurityAns\" where strUsername=\"$PrevUser\"";



					

				$result2 =@mysql_query($sqlString2, $dbh) or die ("Couldn't execute query2");



					echo "<em>Congratulations! Record updated successfully.</em>";	



					$PrevUser = "";

		            $UsrName = "";

					$Psswrd  = "";

					$CnfmPsswrd  = "";

					$SecurityQuest  = "";

					$SecurityAns  = "";

					$Email  = "";

				}

			}

?>         

		

		<center> 

			<fieldset>

            	<legend>Search</legend>

<?                

					$sqlString3 = "Select * from $table_name1";

					$result3 =@mysql_query($sqlString3, $dbh) or die ("Couldn't execute query1");

//					$lstUsrName=mysql_fetch_array($result3);



?>

				<table>

			    <tr><td>Select User Name:</td><td>

                <select name="SarchUserName" onchange="Redrct(this.value)">

<?

					if ($_REQUEST['SelectUser']=="")

					{

?>

                		<option selected="selected" value="">Select ... </option>

<?

					}

					else

					{

?>

                		<option value="">Select ... </option>

<?

					}

                    while($lstUsrName=@mysql_fetch_array($result3))

		            {	

	                    if ($lstUsrName['strUsername'] == $_REQUEST['SelectUser'])

                        {

							if ($_POST['PassCheck'] != "Passed")

							{

								$PrevUser=$_POST['SelectUser'];

								$UsrName= $lstUsrName['strUsername'];

								$Psswrd=$lstUsrName['strPassword'];

								$CnfmPsswrd=$lstUsrName['strPassword'];

								$SecurityQuest=$lstUsrName['strSecurityQuestion'];

								$SecurityAns=$lstUsrName['strSecurityAnswer'];

								$Email=$lstUsrName['strEmailAddress'];

							}

?>

	                		<option selected="selected" value="<?=$_REQUEST['SelectUser']?>"><?=$_REQUEST['SelectUser']?></option>

<?

						}

						else

						{

?>	

    	            		<option value="<?=$lstUsrName['strUsername']?>"><?=$lstUsrName['strUsername']?></option>

<?

						}	

					}

?>

                </select>	

                </td>

                </table>

            </fieldset>

            <br /><font color="#000000" size="2"><em> Note: </em> The fields with <font color="#FF0000"> *  </font> are necessary to enter in. </font><br />



			<fieldset>

            	<legend>Details</legend>

            <table cellpadding="1" cellspacing="1">

				<tr>

				  <td width="180" align="left">User Name </td> <td width="224" align="left"> <input name="UserName" type="text" size="27" maxlength="25" value="<?=$UsrName?>" /><font color="#FF0000"> *  </font></td></tr>

				<tr>

				  <td align="left">Password</td> <td align="left"> <input type="password" name="Psswrd" size="27" maxlength="25" value="<?=$Psswrd?>" /><font color="#FF0000"> *  </font></td></tr>

				<tr>

				  <td align="left">Confirm Password </td> <td align="left"> <input type="password" name="CnfmPsswrd" size="27" maxlength="25" value="<?=$CnfmPsswrd?>" /><font color="#FF0000"> *  </font></td></tr>

		        <tr>

		          <td align="left">Security Question </td> <td align="left"> 

                  								<select name="SecurityQuest">

<?

													if ($SecurityQuest == "What is your mother name?" || $SecurityQuest == "")

													{

?>                  

                										<option selected="selected" value="What is your mother name?">What is your mother name?</option>

<?

													}

													else

													{

?>

                										<option value="What is your mother name?">What is your mother name?</option>

<?

													}

													if ($SecurityQuest == "What is your father name?")

													{

?>                  

                										<option selected="selected" value="What is your father name?">What is your father name?</option>

<?

													}

													else

													{

?>

                										<option value="What is your father name?">What is your father name?</option>

<?

													}

													if ($SecurityQuest == "What is your pet name?")

													{

?>                  

                										<option selected="selected" value="What is your pet name?">What is your pet name?</option>

<?

													}

													else

													{

?>

                										<option value="What is your pet name?">What is your pet name?</option>

<?

													}

													

?>

                                                </select><font color="#FF0000"> *  </font></td></tr>

                <tr>

                  <td align="left">Security Answer </td> <td align="left"> <input type="text" name="SecurityAns" size="27" maxlength="255" value="<?=$SecurityAns?>" /><font color="#FF0000"> *  </font></td></tr>

		        <tr>

		        <td height="24" align="left">Email Address </td> 

		        <td align="left"> <input type="text" name="Email" size="27" maxlength="50" value="<?=$Email?>" /><font color="#FF0000"> *  </font></td></tr>

				<tr>

		        <td height="24" align="left"><input type="hidden" name="SelectUser" value="<?=$UsrName?>" />

                							<input type="hidden" name="PrevUser" value="<?=$UsrName?>" />

                							<input type="hidden" name="PassCheck" value="Passed" />

 											  	               

		        <td align="left"><br /> 	<input type="submit" value="Modify" />

                							<input type="reset" value="Reset" /></td></tr>



            </table>

			</fieldset>			

            </center>

		<br />

	</div>



<!-- Footer -->



	<div id="footer">



		<? include("Includes/footer.php"); ?>



	</div>



</div>



</form>

</body>



</html>



