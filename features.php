<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>



<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />



<title>PHONE.CA - Features</title>

<link rel="stylesheet" type="text/css" href="CustomerService.css" />

</head>



<body>

<!-- Main Website Holder -->

<div id="holder">

<!-- Top Side of the Website -->

	<div class="Top-Side">	

		<? include("Includes/header.php"); ?>

		<h1>Features&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>

		<? include("Includes/Top-Links.php"); ?>

	</div>

<!-- Top Navigation Bar -->

	<div id="Menu-Holder1">

		<? include("Includes/Top-Nav.php"); ?>

	</div>

<!--- Left Column --->

	<div id="Left-Side">

		<? include("Includes/left-side2.php"); ?>	

		<? include("Includes/ad-rotator.php"); ?>		

	</div>

<!-- Content -->

	<div id="Content">

		<?

// ------------------------------- Call Management Table --------------------------------------

		include("Includes/Database-Connection.php");

		

		$table_name = "Syed_Gilani_STR_Features";

		$sqlString = "select * from $table_name where intID = '1'";

		$result = @mysql_query($sqlString, $dbh) or die ("Couldn't execute query");

	

		while($recordset=@mysql_fetch_array($result))

		{	

			$strType = $recordset['strType'];

			$strTextTitle1 = $recordset['strTextTitle1'];

			$strText1 = $recordset['strText1'];

			$Text2 = $recordset['strText2'];

			$strText3 = $recordset['strText3'];

			$Paragraph = $recordset['strParagraph'];			

			

			$Type = explode(" - ", $strType);

			$TextTitle1 = explode(" - ", $strTextTitle1);

			$Text1 = explode(" - ", $strText1);

			$Text3 = explode(" - ", $strText3);

			

			echo "<h1 style=\"text-align:center\">$Type[0]</h1>";

			echo "<h2 style=\"text-align:left; color:#FF0000\">$Type[1]</h2>";

			echo "<p style=\"text-align:left\">$Paragraph</p>";

			echo "<table cellspacing=\"1\" cellpadding=\"5\" style=\"font-size:14px\"><tr style=\"background-color:#04CFFB; color:#FFFFFF; font-size:20px\"><td><b>$TextTitle1[0]</b></td>";

			echo "<td><b>$TextTitle1[1]</b></td>";

			echo "<td><b>$TextTitle1[2]</b></td></tr>";

			echo "<tr><td style=\"background-color:#CCCCCC; text-align:left\"><b>$Text1[0]</b></td>";

			echo "<td style=\"background-color:#CCCCCC; text-align:left\">$Text2</td>";

			echo "<td style=\"background-color:#CCCCCC; text-align:left\"><p>$Text3[0]</p></td></tr>";

			echo "<tr><td style=\"background-color:#CCCCCC; text-align:left\"><b>$Text1[1]</b></td>";

			echo "<td style=\"background-color:#CCCCCC; text-align:left\">$Text2</td>";

			echo "<td style=\"background-color:#CCCCCC; text-align:left\"><p>$Text3[1]</p></td></tr>";

			echo "<tr><td style=\"background-color:#CCCCCC; text-align:left\"><b>$Text1[2]</b></td>";

			echo "<td style=\"background-color:#CCCCCC; text-align:left\">$Text2</td>";

			echo "<td style=\"background-color:#CCCCCC; text-align:left\"><p>$Text3[2]</p></td></tr>";

			echo "<tr><td style=\"background-color:#CCCCCC; text-align:left\"><b>$Text1[3]</b></td>";

			echo "<td style=\"background-color:#CCCCCC; text-align:left\">$Text2</td>";

			echo "<td style=\"background-color:#CCCCCC; text-align:left\"><p>$Text3[3]</p></td></tr>";

			echo "<tr><td style=\"background-color:#CCCCCC; text-align:left\"><b>$Text1[4]</b></td>";

			echo "<td style=\"background-color:#CCCCCC; text-align:left\">$Text2</td>";

			echo "<td style=\"background-color:#CCCCCC; text-align:left\"><p>$Text3[4]</p>" . "<p>$Text3[5]</p>" . "<p>$Text3[6]</p>" . "</td></tr>";

			echo "<tr><td style=\"background-color:#CCCCCC; text-align:left\"><b>$Text1[5]</b></td>";

			echo "<td style=\"background-color:#CCCCCC; text-align:left\">$Text2</td>";

			echo "<td style=\"background-color:#CCCCCC; text-align:left\"><p>$Text3[7]</p></td></tr>";

			echo "<tr><td style=\"background-color:#CCCCCC; text-align:left\"><b>$Text1[6]</b></td>";

			echo "<td style=\"background-color:#CCCCCC; text-align:left\">$Text2</td>";

			echo "<td style=\"background-color:#CCCCCC; text-align:left\"><p>$Text3[8]</p></td></tr></table>";

		}

		?>

		<?	

//---------------------------- Messaging Table --------------------------------------

		include("Includes/Database-Connection.php");

		

		$table_name = "Syed_Gilani_STR_Features";

		$sqlString = "select * from $table_name where intID = '2'";

		$result = @mysql_query($sqlString, $dbh) or die ("Couldn't execute query");

		

		while($recordset=@mysql_fetch_array($result))

		{

			$Type = $recordset['strType'];

			$strTextTitle1 = $recordset['strTextTitle1'];

			$strText1 = $recordset['strText1'];

			$Text2 = $recordset['strText2'];

			$strText3 = $recordset['strText3'];

			$Paragraph = $recordset['strParagraph'];			

			

			$TextTitle1 = explode(" - ", $strTextTitle1);

			$Text1 = explode(" - ", $strText1);

			$Text3 = explode(" - ", $strText3);

			

			echo "<h2 style=\"text-align:left; color:#FF0000\"><br />$Type</h2>";

			echo "<table cellspacing=\"1\" cellpadding=\"5\" style=\"font-size:14px\"><tr style=\"background-color:#04CFFB; color:#FFFFFF; font-size:20px\"><td><b>$TextTitle1[0]</b></td>";

			echo "<td><b>$TextTitle1[1]</b></td>";

			echo "<td><b>$TextTitle1[2]</b></td></tr>";

			echo "<tr><td style=\"background-color:#CCCCCC; text-align:left\"><b>$Text1[0]</b></td>";

			echo "<td style=\"background-color:#CCCCCC; text-align:left\">$Text2</td>";

			echo "<td style=\"background-color:#CCCCCC; text-align:left\"><b>$Text3[0]<br />" . "$Text3[1]</b><br />" . "$Text3[2]<br />" . "$Text3[3]<br />" . "<b>$Text3[4]</b><br />" . "$Text3[5]<br />" . "$Text3[6]" . "</td></tr>";

			echo "<tr><td style=\"background-color:#CCCCCC; text-align:left\"><b>$Text1[1]</b></td>";

			echo "<td style=\"background-color:#CCCCCC; text-align:left\">$Text2</td>";

			echo "<td style=\"background-color:#CCCCCC; text-align:left\"><p>$Text3[7]</p>" . "<ul><li>$Text3[8]</li>" . "<li>$Text3[9]</li></ul></td></tr></table>";

		}

		?>	

		<?

//		---------------------------- Cool Stuff --------------------------------------

		include("Includes/Database-Connection.php");

		

		$table_name = "Syed_Gilani_STR_Features";

		$sqlString = "select * from $table_name where intID = '3'";

		$result = @mysql_query($sqlString, $dbh) or die ("Couldn't execute query");

		

		while($recordset=@mysql_fetch_array($result))

		{

			$Type = $recordset['strType'];

			$strTextTitle1 = $recordset['strTextTitle1'];

			$strText1 = $recordset['strText1'];

			$Text2 = $recordset['strText2'];

			$strText3 = $recordset['strText3'];

			$Paragraph = $recordset['strParagraph'];			

			

			$TextTitle1 = explode(" - ", $strTextTitle1);

			$Text1 = explode(" - ", $strText1);

			$Text3 = explode(" - ", $strText3);

			

			echo "<h2 style=\"text-align:left; color:#FF0000\"><br />$Type</h2>";

			echo "<table cellspacing=\"1\" cellpadding=\"5\" style=\"font-size:14px\"><tr style=\"background-color:#04CFFB; color:#FFFFFF; font-size:20px\"><td><b>$TextTitle1[0]</b></td>";

			echo "<td><b>$TextTitle1[1]</b></td>";

			echo "<td><b>$TextTitle1[2]</b></td></tr>";

			echo "<tr><td style=\"background-color:#CCCCCC; text-align:left\"><b>$Text1[0]</b></td>";

			echo "<td style=\"background-color:#CCCCCC; text-align:left\">$Text2</td>";

			echo "<td style=\"background-color:#CCCCCC; text-align:left\"><p>$Text3[0]</p></td></tr>";

			echo "<tr><td style=\"background-color:#CCCCCC; text-align:left\"><b>$Text1[1]</b></td>";

			echo "<td style=\"background-color:#CCCCCC; text-align:left\">$Text2</td>";

			echo "<td style=\"background-color:#CCCCCC; text-align:left\"><p>$Text3[1]</p></td></tr>";

			echo "<tr><td style=\"background-color:#CCCCCC; text-align:left\"><b>$Text1[2]</b></td>";

			echo "<td style=\"background-color:#CCCCCC; text-align:left\">$Text2</td>";

			echo "<td style=\"background-color:#CCCCCC; text-align:left\"><p>$Text3[2]</p></td></tr></table><br /><br />";

		}

		?>	

	</div>



<!-- Footer -->

	<div id="footer">

		<? include("Includes/footer.php"); ?>

	</div>



</div>



</body>

</html>