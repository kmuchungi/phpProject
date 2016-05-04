<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>PHONE.CA - Admin</title>

<link rel="stylesheet" type="text/css" href="Add.css" />

<script language="javascript">

	function Redrct(SelectID)

	{

		location.href="ModifyFeatures.php?SelectID=" + SelectID;

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

		$table_name1 = "Syed_Gilani_STR_Features";

			

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

			$FeatureId = stripslashes($_POST['FeatureId']);

			$FeatureTypes = stripslashes($_POST['FeatureTypes']);

			$FeatureTitles = stripslashes($_POST['FeatureTitles']);

			$Text1 = stripslashes($_POST['Text1']);

			$Text2 = stripslashes($_POST['Text2']);

			$Text3 = stripslashes($_POST['Text3']);

			$Paragraph1 = stripslashes($_POST['Paragraph1']);

			

			if ($FeatureId == "" || $FeatureTypes == "" || $FeatureTitles == "" || $Text1 == "") 

			{

				$error = $error . "Please fill out the fields with <font color=\"#FF0000\"> *  </font>. <br />";

			}

			else

			{

				if (preg_match($pattern1, $FeatureId))

				{

					if ($FeatureId != $PrevID)

					{

						$sqlString = "Select intID from $table_name1 where intID='$FeatureId'";

						$result =@mysql_query($sqlString, $dbh) or die ("Couldn't execute query1");

						$chkId=mysql_fetch_array($result);

						

						if ($chkId)

						{

							$error = $error . "Feature Id already exists. <br />";

						}

					}

				}

				else

				{

					$error = $error . "The Feature Id should be a number.<br />";

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

				$sqlString1 = "Update $table_name1 set intID=\"$FeatureId\",     strType=\"$FeatureTypes\",    strTextTitle1=\"$FeatureTitles\",   strText1=\"$Text1\",   strText2=\"$Text2\",   strText3=\"$Text3\",   strParagraph=\"$Paragraph1\" where intID=\"$FeatureId\"";

				$result1 =@mysql_query($sqlString1, $dbh) or die ("Couldn't execute query");



				echo "<em>Record updated successfully.</em>";

				

				$PrevID = "";

				$FeatureId = "";

				$FeatureTypes = "";

				$FeatureTitles = "";

				$Text1 = "";

				$Text2 = "";

				$Text3 = "";

				$Paragraph1 = "";

			}

		}

?>  

	    <h2 style="text-align:center">Modify Features in the Database</h2>

<?                

		$sqlString3 = "Select * from $table_name1";

		$result3 =@mysql_query($sqlString3, $dbh) or die ("Couldn't execute query1");

?>

		<table style="padding-left:320px;">

		<tr>

			<td style="text-align:left; width:150px">Select Feature ID:</td>

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

							$FeatureId = $lstID['intID'];

							$FeatureTypes = $lstID['strType'];

							$FeatureTitles = $lstID['strTextTitle1'];

							$Text1 = $lstID['strText1'];

							$Text2 = $lstID['strText2'];

							$Text3 = $lstID['strText3'];

							$Paragraph1 = $lstID['strParagraph'];

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

		<form name:"ModifyFeatures" action="ModifyFeatures.php" method="post">

		<table class="form1" style="text-align:left">

			<tr>

				<td colspan="2"><font color="#000000" size="2"><em> Note: </em> The fields with <font color="#FF0000"> *  </font> are necessary to enter in. </font><br /><br /></td>

			</tr>

			<tr align="left">

				<td width="150" align="left"><b>Feature Id:</b></td> 

			  	<td width="393"><input name="FeatureId" type="text" size="10" maxlength="10" value="<?= $FeatureId?>" /><font color="#FF0000"> *  </font></td>

			</tr>

			<tr>

				<td align="left"><b>Feature Types:</b></td> 

			  	<td><textarea cols=40 name="FeatureTypes" rows=2><?= $FeatureTypes?></textarea><font color="#FF0000"> *  </font></td>

			</tr>

			<tr>

				<td align="left"><b>Feature Titles:</b></td> 

			  	<td><textarea cols=40 name="FeatureTitles" rows=2><?= $FeatureTitles?></textarea><font color="#FF0000"> *  </font></td>

			</tr>

			<tr>

				<td align="left"><br /><b>Text 1:</b></td>

				<td><textarea cols=40 name="Text1" rows=7><?= $Text1?></textarea><font color="#FF0000"> *  </font></td>

			</tr>

			<tr>

				<td align="left"><br /><b>Text 2:</b></td>

				<td><textarea cols=40 name="Text2" rows=7><?= $Text2?></textarea></td>

			</tr>

			<tr>

				<td align="left"><br /><b>Text 3:</b></td>

				<td><textarea cols=40 name="Text3" rows=7><?= $Text3?></textarea></td>

			</tr>

			<tr>

				<td align="left"><br /><b>Paragraph 1:</b></td>

				<td><textarea cols=40 name="Paragraph1" rows=7><?= $Paragraph1?></textarea></td>

			</tr>

			<tr>

		        <td height="24" align="left">

				<input type="hidden" name="SelectID" value="<?=$FeatureId?>" />

				<input type="hidden" name="PrevID" value="<?=$FeatureId?>" />

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



