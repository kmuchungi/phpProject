<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>PHONE.CA - Admin</title>

<link rel="stylesheet" type="text/css" href="Add.css" />

<script language="javascript">

	function Redrct(SelectID)

	{

		location.href="ModifyContents.php?SelectID=" + SelectID;

	}

</script>

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

		

		$host = "humbermedia2.ca";

		$username = "humb2ca_d78t2";

		$password = "dare_to_dream_0708";

		$dbname="humb2ca_d";

		$table_name1 = "Syed_Gilani_STR_Content";

			

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

			$PrevID=$_POST['PrevID'];

			$ContentId = stripslashes($_POST['ContentId']);

			$TextTitle = stripslashes($_POST['TextTitle']);

			$Paragraph1 = stripslashes($_POST['Paragraph1']);

			$Paragraph2 = stripslashes($_POST['Paragraph2']);

			$Paragraph3 = stripslashes($_POST['Paragraph3']);

			$Paragraph4 = stripslashes($_POST['Paragraph4']);

			$Paragraph5 = stripslashes($_POST['Paragraph5']);

			$Paragraph6 = stripslashes($_POST['Paragraph6']);

			$Image = stripslashes($_POST['Image']);

			

			if ($ContentId == "" || $TextTitle == "" || $Paragraph1 == "") 

			{

				$error = $error . "Please fill out the fields with <font color=\"#FF0000\"> *  </font>. <br />";

			}

			else

			{

				if (preg_match($pattern1, $ContentId))

				{

					if ($ContentId != $PrevID)

					{

						$sqlString = "Select intID from $table_name1 where intID='$ContentId'";

						$result =@mysql_query($sqlString, $dbh) or die ("Couldn't execute query1");

						$chkId=mysql_fetch_array($result);

						

						if ($chkId)

						{

							$error = $error . "Content Id already exists. <br />";

						}

					}

				}

				else

				{

					$error = $error . "The Content Id should be a number.<br />";

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

				$sqlString1 = "Update $table_name1 set intID=\"$ContentId\",    strTextTitle1=\"$TextTitle\",   strText1=\"$Paragraph1\",  strText2=\"$Paragraph2\",  strText3=\"$Paragraph3\",  strText4=\"$Paragraph4\",  strText5=\"$Paragraph5\",  strText6=\"$Paragraph6\",  strImage2=\"$Image\" where intID=\"$ContentId\"";

				$result1 =@mysql_query($sqlString1, $dbh) or die ("Couldn't execute query");



				echo "<em>Record updated successfully.</em>";

				

				$PrevID = "";

				$ContentId = "";

				$TextTitle = "";

				$Paragraph1 = "";

				$Paragraph2 = "";

				$Paragraph3 = "";

				$Paragraph4 = "";

				$Paragraph5 = "";

				$Paragraph6 = "";

				$Image = "";

			}

		}

?>  

	    <h2 style="text-align:center">Modify Contents in the Database</h2>

<?                

		$sqlString3 = "Select * from $table_name1";

		$result3 =@mysql_query($sqlString3, $dbh) or die ("Couldn't execute query1");

?>

		<table style="padding-left:320px;">

		<tr>

			<td style="text-align:left; width:150px">Select Content ID:</td>

			<td style="text-align:left; width:100px">

			<select name="SarchUserName" onchange="Redrct(this.value)">

			<?

				if ($_REQUEST['SelectID']=="")

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

				while($lstID=@mysql_fetch_array($result3))

				{	

					if ($lstID['intID'] == $_REQUEST['SelectID'])

					{

						if ($_POST['PassCheck'] != "Passed")

						{

							$PrevID = $_POST['SelectID'];

							$ContentId = $lstID['intID'];

							$TextTitle = $lstID['strTextTitle1'];

							$Paragraph1 = $lstID['strText1'];

							$Paragraph2 = $lstID['strText2'];

							$Paragraph3 = $lstID['strText3'];

							$Paragraph4 = $lstID['strText4'];

							$Paragraph5 = $lstID['strText5'];

							$Paragraph6 = $lstID['strText6'];

							$Image = $lstID['strImage2'];

						}

			?>

				<option selected="selected" value="

				<?=$_REQUEST['SelectID'] ?>

				">

				<?= $_REQUEST['SelectID'] ?>

				</option>

			<?

					}

					else

					{

			?>	

				<option value="<?= $lstID['intID'] ?>">

				<?= $lstID['intID'] ?>

				</option>

			<?

					}	

				}

			?>

			</select>	

            </td>

		</tr>

  		</table><br /> 

		<form name:"ModifyContents" action="ModifyContents.php" method="post">

		<table class="form1" style="text-align:left">

			<tr>

				<td colspan="2"><font color="#000000" size="2"><em> Note: </em> The fields with <font color="#FF0000"> *  </font> are necessary to enter in. </font><br /><br /></td>

			</tr>

			<tr align="left">

				<td width="150" align="left"><b>Content Id:</b></td> 

			  	<td width="393"><input name="ContentId" type="text" size="10" maxlength="10" value="<?= $ContentId?>" /><font color="#FF0000"> *  </font></td>

			</tr>

			<tr>

				<td align="left"><b>Content Titles:</b></td> 

			  	<td><textarea cols=40 name="TextTitle" rows=2><?= $TextTitle?></textarea><font color="#FF0000"> *  </font></td>

			</tr>

			<tr>

				<td align="left"><br /><b>Paragraph 1:</b></td>

				<td><textarea cols=40 name="Paragraph1" rows=7><?= $Paragraph1?></textarea><font color="#FF0000"> *  </font></td>

			</tr>

			<tr>

				<td align="left"><br /><b>Paragraph 2:</b></td>

				<td><textarea cols=40 name="Paragraph2" rows=7><?= $Paragraph2?></textarea></td>

			</tr>

			<tr>

				<td align="left"><br /><b>Paragraph 3:</b></td>

				<td><textarea cols=40 name="Paragraph3" rows=7><?= $Paragraph3?></textarea></td>

			</tr>

			<tr>

				<td align="left"><br /><b>Paragraph 4:</b></td>

				<td><textarea cols=40 name="Paragraph4" rows=7><?= $Paragraph4?></textarea></td>

			</tr>

			<tr>

				<td align="left"><br /><b>Paragraph 5:</b></td>

				<td><textarea cols=40 name="Paragraph5" rows=7><?= $Paragraph5?></textarea></td>

			</tr>

			<tr>

				<td align="left"><br /><b>Paragraph 6:</b></td>

				<td><textarea cols=40 name="Paragraph6" rows=7><?= $Paragraph6?></textarea></td>

			</tr>

			<tr>

				<td align="left"><br /><b>Image Filename:</b></td>

				<td><input name="Image" type="text" size="40" maxlength="40" value="<?= $Image?>" /></td>

			</tr>

			<tr>

		        <td height="24" align="left">

				<input type="hidden" name="SelectID" value="<?=$ContentId?>" />

				<input type="hidden" name="PrevID" value="<?=$ContentId?>" />

				<input type="hidden" name="PassCheck" value="Passed" />

			</td> 

			<td align="justify"><br /> 	

				<input type="submit" value="Modify" />

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



