<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>PHONE.CA - Admin</title>

<link rel="stylesheet" type="text/css" href="Add.css" />

</head>



<body>

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

		$pattern1 = "(^[0-9]+$)";

		$pattrnEmail = "(^[\w\.-]+(\+[\w-]*)?@([\w-]+\.)+[\w-]+$)";

		$pattrnYYYY = "(^[0-9]{4}$)";

		$pattrnMMDD = "(^[0-9][0-9]?$)";

		

		$host = "humbermedia2.ca";

		$username = "humb2ca_d78t2";

		$password = "dare_to_dream_0708";

		$dbname="humb2ca_d";

		$table_name1 = "Syed_Gilani_STR_Careers";

			

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

			$JobId = stripslashes($_POST['JobId']);

			$JobTitle = stripslashes($_POST['JobTitle']);

			$Department = stripslashes($_POST['Department']);

			$Email = stripslashes($_POST['Email']);

			$PYYYY = stripslashes($_POST['PYYYY']);

			$PMM = stripslashes($_POST['PMM']);

			$PDD = stripslashes($_POST['PDD']);

			$LYYYY = stripslashes($_POST['LYYYY']);

			$LMM = stripslashes($_POST['LMM']);

			$LDD = stripslashes($_POST['LDD']);

			$PosAvailable = stripslashes($_POST['PosAvailable']);

			$Status = stripslashes($_POST['Status']);

			$Description = stripslashes($_POST['Description']);

			

			$PostDate = $PYYYY."-".$PMM."-".$PDD;

			$LastDate = $LYYYY."-".$LMM."-".$LDD;

			

			$Date = Date("Y-m-d");

			$X = Date("Y-m-d");

			$B = explode("-", $X);

			$Year = $B[0];

			$Year1 = $Year + 1;

	   

			if ($JobId == "" || $JobTitle == "" || $Department == "" || $Email == "" || $PYYYY == "" || $PMM == "" || $PDD == "" || $LYYYY == "" || $LMM == "" || $LDD == "" || $PosAvailable == "" || $Status == "" || $Description == "") 

			{

				$error = $error . "Please fill out everything. <br />";

			}

			else

			{

				if (preg_match($pattern1, $JobId)){}

				else

				{

					$error = $error . "The Job ID should be a number.<br />";

				}

				if (preg_match($pattrnEmail, $Email)){}

				else

				{

					$error = $error . "Your E-mail is NOT a valid E-mail.<br />";

				}

				if(($PYYYY != 0) && ($PMM != 0) && ($PDD != 0))

				{

					if (preg_match($pattrnYYYY, $PYYYY))

					{

						if(($PYYYY < 1980) OR ($PYYYY > $Year)) 

						{

							$error = $error . "The Year in Post Date should be between 1980-" . $Year . ".<br />";

						}

						else {}

					}

					else

					{

						$error = $error . "The Year in Post Date is NOT in proper format.<br />";

					}

					

					if (preg_match($pattrnMMDD, $PMM))

					{

						if(($PMM <= 0) OR ($PMM > 12)) 

						{

							$error = $error . "The Month in Post Date should be between 1-12.<br />";

						}

						else {}

					}

					else

					{

						$error = $error . "The Month in Post Date is NOT in proper format.<br />";

					}

					

					if (preg_match($pattrnMMDD, $PDD))

					{

						if(($PDD<=0) OR ($PDD>31)) 

						{

							$error = $error . "The Day in Post Date should be between 1-31.<br />";

						}

						else {}

					}

					else

					{

						$error = $error . "The Day in Post Date is NOT in proper format.<br />";

					}

				}

				else

				{

					$error = $error . "The Post Date is NOT in proper format.<br />";

				}

				if(($LYYYY != 0) && ($LMM != 0) && ($LDD != 0))

				{

					if (preg_match($pattrnYYYY, $LYYYY))

					{

						if(($LYYYY < 1980) OR ($LYYYY > $Year1)) 

						{

							$error = $error . "The Year in Last Date to apply should be between 1980-" . $Year1 . ".<br />";

						}

						else {}

					}

					else

					{

						$error = $error . "The Year in Last Date to apply is NOT in proper format.<br />";

					}

					

					if (preg_match($pattrnMMDD, $LMM))

					{

						if(($LMM <= 0) OR ($LMM > 12)) 

						{

							$error = $error . "The Month in Last Date to apply should be between 1-12.<br />";

						}

						else {}

					}

					else

					{

						$error = $error . "The Month in Last Date to apply is NOT in proper format.<br />";

					}

					

					if (preg_match($pattrnMMDD, $LDD))

					{

						if(($LDD<=0) OR ($LDD>31)) 

						{

							$error = $error . "The Day in Last Date to apply should be between 1-31.<br />";

						}

						else {}

					}

					else

					{

						$error = $error . "The Day in Last Date to apply is NOT in proper format.<br />";

					}

				}

				else

					{

						$error = $error . "The Last Date to apply is NOT in proper format.<br />";

					}

				

				if (preg_match($pattern1, $PosAvailable)){}

				else

				{

					$error = $error . "The Positions Available should be a number.<br />";

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

				$sqlString1 = "Insert into $table_name1 values('$JobId', '$JobTitle', '$Description', '$Department', '$Email', '$PostDate', '$LastDate', '$PosAvailable', '$Status')";

				$result1 =@mysql_query($sqlString1, $dbh) or die ("Couldn't execute query");



				echo "<em>The Record was successfully added</em>";

				

				$JobId= "";

				$JobTitle= "";

				$Department = "";

				$Email = "";

				$PostDate = "";

				$LastDate = "";

				$PosAvailable = "";

				$Status = "";

				$Description = "";

			}

		}

?>         

		<h2 style="text-align:center">Add New Careers to Database</h2>

		<form name:"AddCareer" action="AddCareer.php" method="post">

		<table class="form1" style="text-align:left">

			<tr>

				<td colspan="2"><font color="#000000" size="2"><em> Note: </em> The fields with <font color="#FF0000"> *  </font> are necessary to enter in. </font><br /><br /></td>

			</tr>

			<tr align="left">

				<td width="250" align="left"><b>Job Id:</b></td> 

			  <td width="323"><input name="JobId" type="text" size="10" maxlength="10" value="<?= $JobId?>" /><font color="#FF0000"> *  </font></td>

			</tr>

			<tr>

				<td align="left"><b>Job Title:</b></td> 

			  <td><input type="text" name="JobTitle" size="25" maxlength="25" value="<?= $JobTitle?>" /><font color="#FF0000"> *  </font></td>

			</tr>

			<tr>

				<td align="left"><b>Department:</b></td> 

			  <td><input type="text" name="Department" size="25" maxlength="50" value="<?= $Department?>" /><font color="#FF0000"> *  </font></td>

			</tr>

			<tr>

				<td height="24" align="left"><b>Email To:</b></td> 

			  <td><input type="text" name="Email" size="25" maxlength="50" value="<?= $Email?>" /><font color="#FF0000"> *</font></td>

			</tr>

			<tr>

				<td align="left"><b>Post Date: </b><em><font size="2">(YYYY-MM-DD) </font></em></td> 

			  	<td><input type="text" name="PYYYY" maxlength="4" size="5" value="<?= $PYYYY?>" />&nbsp;<input type="text" name="PMM" maxlength="2" size="1" value="<?= $PMM?>" />&nbsp;<input type="text" name="PDD" maxlength="2" size="1" value="<?= $PDD?>" />&nbsp;<font color="#FF0000"> *</font></td>

			</tr>

			<tr>

				<td align="left"><b>Last Date to apply: </b><em><font size="2">(YYYY-MM-DD) </font></em></td> 

			  	<td><input type="text" name="LYYYY" maxlength="4" size="5" value="<?= $LYYYY?>" />&nbsp;<input type="text" name="LMM" maxlength="2" size="1" value="<?= $LMM?>" />&nbsp;<input type="text" name="LDD" maxlength="2" size="1" value="<?= $LDD?>" />&nbsp;<font color="#FF0000"> *</font></td>

			</tr>	

			<tr>

				<td align="left"><b>Positions Available:</b></td> 

			  <td><input type="text" name="PosAvailable" size="10" maxlength="10" value="<?= $PosAvailable?>" /><font color="#FF0000"> *  </font></td>

			</tr>

			<tr>

				<td height="24" align="left"><b>Status:</b></td> 

				<td><select name="Status">

					<option selected="selected" value="Open">Open</option>

					<option value="Closed">Closed</option>

				</select><font color="#FF0000"> *</font></td>

			</tr>

			<tr>

				<td colspan=2 align=center><br /><b>Description:</b><br />

				<textarea cols=70 name="Description" rows=7><?= $Description?></textarea></td>

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

