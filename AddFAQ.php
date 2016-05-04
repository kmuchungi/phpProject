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

		$pattrnYYYY = "(^[0-9]{4}$)";

		$pattrnMMDD = "(^[0-9][0-9]?$)";

		

		$host = "humbermedia2.ca";

		$username = "humb2ca_d78t2";

		$password = "dare_to_dream_0708";

		$dbname="humb2ca_d";

		$table_name1 = "Syed_Gilani_STR_Faq";

			

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

			$QuestionId = stripslashes($_POST['QuestionId']);

			$Question = stripslashes($_POST['Question']);

			$Answer = stripslashes($_POST['Answer']);

			$AskYYYY = stripslashes($_POST['AskYYYY']);

			$AskMM = stripslashes($_POST['AskMM']);

			$AskDD = stripslashes($_POST['AskDD']);

			$AnsYYYY = stripslashes($_POST['AnsYYYY']);

			$AnsMM = stripslashes($_POST['AnsMM']);

			$AnsDD = stripslashes($_POST['AnsDD']);

			$Revision = stripslashes($_POST['Revision']);

			

			$AskDate = $AskYYYY."-".$AskMM."-".$AskDD;

			$AnswerDate = $AnsYYYY."-".$AnsMM."-".$AnsDD;

			

			$Date = Date("Y-m-d");

			$X = Date("Y-m-d");

			$B = explode("-", $X);

			$Year = $B[0];

	   

			if ($QuestionId == "" || $Question == "" || $Answer == "" || $AskYYYY == "" || $AskMM == "" || $AskDD == "" || $AnsYYYY == "" || $AnsMM == "" || $AnsDD == "" || $Revision == "") 

			{

				$error = $error . "Please fill out everything. <br />";

			}

			else

			{

				if (preg_match($pattern1, $QuestionId)){}

				else

				{

					$error = $error . "The Question Id should be a number.<br />";

				}

				if(($AskYYYY != 0) && ($AskMM != 0) && ($AskDD != 0))

				{

					if (preg_match($pattrnYYYY, $AskYYYY))

					{

						if(($AskYYYY < 1980) OR ($AskYYYY > $Year)) 

						{

							$error = $error . "The Year in Date Asked should be between 1980-" . $Year . ".<br />";

						}

						else {}

					}

					else

					{

						$error = $error . "The Year in Date Asked is NOT in proper format.<br />";

					}

					

					if (preg_match($pattrnMMDD, $AskMM))

					{

						if(($AskMM <= 0) OR ($AskMM > 12)) 

						{

							$error = $error . "The Month in Date Asked should be between 1-12.<br />";

						}

						else {}

					}

					else

					{

						$error = $error . "The Month in Date Asked is NOT in proper format.<br />";

					}

					

					if (preg_match($pattrnMMDD, $AskDD))

					{

						if(($AskDD<=0) OR ($AskDD>31)) 

						{

							$error = $error . "The Day in Date Asked should be between 1-31.<br />";

						}

						else {}

					}

					else

					{

						$error = $error . "The Day in Date Asked is NOT in proper format.<br />";

					}

				}

				else

				{

					$error = $error . "The Date Asked is NOT in proper format.<br />";

				}

				if(($AnsYYYY != 0) && ($AnsMM != 0) && ($AnsDD != 0))

				{

					if (preg_match($pattrnYYYY, $AnsYYYY))

					{

						if(($AnsYYYY < 1980) OR ($AnsYYYY > $Year)) 

						{

							$error = $error . "The Year in Date Answered should be between 1980-" . $Year . ".<br />";

						}

						else {}

					}

					else

					{

						$error = $error . "The Year in Date Answered is NOT in proper format.<br />";

					}

					

					if (preg_match($pattrnMMDD, $AnsMM))

					{

						if(($AnsMM <= 0) OR ($AnsMM > 12)) 

						{

							$error = $error . "The Month in Date Answered should be between 1-12.<br />";

						}

						else {}

					}

					else

					{

						$error = $error . "The Month in Date Answered is NOT in proper format.<br />";

					}

					

					if (preg_match($pattrnMMDD, $AnsDD))

					{

						if(($AnsDD<=0) OR ($AnsDD>31)) 

						{

							$error = $error . "The Day in Date Answered should be between 1-31.<br />";

						}

						else {}

					}

					else

					{

						$error = $error . "The Day in Date Answered is NOT in proper format.<br />";

					}

				}

				else

					{

						$error = $error . "The Date Answered is NOT in proper format.<br />";

					}

				

				if (preg_match($pattern1, $Revision)){}

				else

				{

					$error = $error . "The Times Revised should be a number.<br />";

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

				$sqlString1 = "Insert into $table_name1 values('$QuestionId', '$AskDate', '$AnswerDate', '$Question', '$Answer', '$Revision')";

				$result1 =@mysql_query($sqlString1, $dbh) or die ("Couldn't execute query");



				echo "<em>The Record was successfully added</em>";

				

				$QuestionId = "";

				$AskDate = "";

				$AnswerDate = "";

				$Question = "";

				$Answer = "";

				$Revision = "";

			}

		}

?>         

		<h2 style="text-align:center">Add New FAQ to Database</h2>

		<form name:"AddFAQ" action="AddFAQ.php" method="post">

		<table class="form1" style="text-align:left">

			<tr>

				<td colspan="2"><font color="#000000" size="2"><em> Note: </em> The fields with <font color="#FF0000"> *  </font> are necessary to enter in. </font><br /><br /></td>

			</tr>

			<tr align="left">

				<td width="220" align="left"><b>Question Id:</b></td> 

			  	<td width="353"><input name="QuestionId" type="text" size="10" maxlength="10" value="<?= $QuestionId?>" /><font color="#FF0000"> *  </font></td>

			</tr>

			<tr>

				<td align="left"><b>Date Asked: </b><em><font size="2">(YYYY-MM-DD) </font></em></td> 

				<td><input type="text" name="AskYYYY" maxlength="4" size="5" value="<?= $AskYYYY?>" />&nbsp;<input type="text" name="AskMM" maxlength="2" size="1" value="<?= $AskMM?>" />&nbsp;<input type="text" name="AskDD" maxlength="2" size="1" value="<?= $AskDD?>" />&nbsp;<font color="#FF0000"> *</font></td>

			</tr>

			<tr>

				<td align="left"><b>Date Answered: </b><em><font size="2">(YYYY-MM-DD) </font></em></td> 

				<td><input type="text" name="AnsYYYY" maxlength="4" size="5" value="<?= $AnsYYYY?>" />&nbsp;<input type="text" name="AnsMM" maxlength="2" size="1" value="<?= $AnsMM?>" />&nbsp;<input type="text" name="AnsDD" maxlength="2" size="1" value="<?= $AnsDD?>" />&nbsp;<font color="#FF0000"> *</font></td>

			</tr>

			<tr>

				<td align="left"><b>Times Revised:</b></td> 

			  	<td><input name="Revision" type="text" size="10" maxlength="10" value="<?= $Revision?>" /><font color="#FF0000"> *  </font></td>

			</tr>

			<tr>

				<td align="left"><b>Question:</b></td> 

			  	<td><input type="text" name="Question" size="40" maxlength="40" value="<?= $Question?>" /><font color="#FF0000"> *  </font></td>

			</tr>

			<tr>

				<td colspan=2 align=center><br /><b>Answer:</b><br />

				<textarea cols=70 name="Answer" rows=7><?= $Answer?></textarea></td>

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

