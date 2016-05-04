<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>



<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />



<title>PHONE.CA - Rates</title>

<link rel="stylesheet" type="text/css" href="CustomerService.css" />

</head>



<body>



<!-- Main Website Holder -->

<div id="holder">



<!-- Top Side of the Website -->



	<div class="Top-Side">	

		<? include("Includes/header.php"); ?>

		<h1>Rates&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>

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

		// ------------------------------- Connect to Database --------------------------------------

		$host = "humbermedia2.ca";

		$username = "humb2ca_d78t2";

		$password = "dare_to_dream_0708";

		

		$db_name = "humb2ca_d";

		$table_name = "Syed_Gilani_STR_Rates";

		

		if($dbh=@mysql_connect($host, $username, $password))

		{}

		else

		{

			die('<hr>You cannot connect to mysql because:' . mysql_error());

		}

		

		if($dbconn=@mysql_select_db($db_name, $dbh))

		{}

		else

		{

			die('<hr>You cannot connect to database because:' . mysql_error());

		}

		

		$sqlString = "select * from $table_name";

		$result = @mysql_query($sqlString, $dbh) or die ("Couldn't execute query");

		

		echo "<h1>The Rates</h1>";

		

		while($recordset=@mysql_fetch_array($result))

		{

			$strPackage = $recordset['strPackage'];

			$strPlan = $recordset['strPlan'];

			$strOption1 = $recordset['strOption1'];

			$strOption2 = $recordset['strOption2'];

			$strOption3 = $recordset['strOption3'];

			$strMinPlan1 = $recordset['strMinPlan1'];

			$strMinPlan2 = $recordset['strMinPlan2'];

			$strTextPlan1 = $recordset['strTextPlan1'];

			$strTextPlan2 = $recordset['strTextPlan2'];

			$strTextPlan3 = $recordset['strTextPlan3'];

			$strTextPlan4 = $recordset['strTextPlan4'];

			$strWebPlan1 = $recordset['strWebPlan1'];

			$strParagraph = $recordset['strParagraph'];

			

			$Package = explode(" - ", $strPackage);

			$Plan = explode(" - ", $strPlan);

			$Option1 = explode(" - ", $strOption1);

			$Option2 = explode(" - ", $strOption2);

			$Option3 = explode(" - ", $strOption3);

			$MinPlan1 = explode(" - ", $strMinPlan1);

			$MinPlan2 = explode(" - ", $strMinPlan2);

			$TextPlan1 = explode(" - ", $strTextPlan1);

			$TextPlan2 = explode(" - ", $strTextPlan2);

			$TextPlan3 = explode(" - ", $strTextPlan3);

			$TextPlan4 = explode(" - ", $strTextPlan4);

			$WebPlan1 = explode(" - ", $strWebPlan1);

			$Paragraph = explode(" - ", $strParagraph);

			

//------------------- Displaying dynamic content into Website --------------------

			

			echo "<p style=\"text-align:left\">$Paragraph[0]</p>";

			echo "<h2 style=\"text-align:left; color:#FF0000\">Choose your plan</h2>";

			echo "<h2 style=\"text-align:center\">$Package[0]</h2>";

			echo "<table cellspacing=\"1\" cellpadding=\"3\"><tr style=\"font-size:24px\"><td style=\"background-color:#04CFFB; color:#FFFFFF; width:200px\"><b>$Plan[0]</b></td>";

			echo "<td style=\"background-color:#CCCCCC; width:155px\"><b>$Option1[0]</b></td>";

			echo "<td style=\"background-color:#CCCCCC; width:155px\"><b>$Option2[0]</b></td>";

			echo "<td style=\"background-color:#CCCCCC; width:155px\"><b>$Option3[0]</b></td></tr>";

			echo "<tr><td style=\"background-color:#04CFFB; color:#FFFFFF\"><b>$Plan[1]</b><br />" . "$Plan[2]</td>";

			echo "<td style=\"background-color:#CCCCCC\"><b>$Option1[1]</b></td>";

			echo "<td style=\"background-color:#CCCCCC\"><b>$Option2[1]</b></td>";

			echo "<td rowspan=\"2\" style=\"background-color:#CCCCCC\"><b>$Option3[2]</b></td></tr>";

			echo "<tr><td style=\"background-color:#04CFFB; color:#FFFFFF; height:40px\"><b>$Plan[3]</b></td>";

			echo "<td style=\"background-color:#CCCCCC\"><b>$Option1[2]</b></td>";

			echo "<td style=\"background-color:#CCCCCC\"><b>$Option2[2]</b></td></tr>";

			echo "<tr><td style=\"background-color:#04CFFB; color:#FFFFFF\"><b>$Plan[4]</b></td>";

			echo "<td colspan=\"3\" style=\"background-color:#CCCCCC; height:40px\"><b>$Option1[3]</b></td></tr></table>";

			

			echo "<span style=\"float:left\"><br /><h2 style=\"text-align:left\">$Package[1]</h2>";

			echo "<table cellspacing=\"1\" cellpadding=\"3\"><tr><td style=\"background-color:#FF0000; color:#FFFFFF; width:140px; font-size:20px\"><b>$MinPlan1[0]</b></td>";

			echo "<td style=\"width:200px; background-color:#CCCCCC\">$MinPlan1[1]</td></tr>";

			echo "<tr><td style=\"background-color:#FF0000; color:#FFFFFF; font-size:20px\"><b>$MinPlan2[0]</b></td>";

			echo "<td style=\"background-color:#CCCCCC\">$MinPlan2[1]</td></tr></table></span>";

			

			echo "<span style=\"float:left; padding-left:20px\"><br /><h2 style=\"text-align:left\">$Package[3]</h2>";

			echo "<table cellspacing=\"1\" cellpadding=\"3\"><tr style=\"font-size:20px\"><td style=\"background-color:#FF0000; color:#FFFFFF; width:150px\"><b>$WebPlan1[0]</b></td>";

			echo "<td style=\"background-color:#FF0000; color:#FFFFFF; width:150px\"><b>$WebPlan1[1]</b></td></tr>";

			echo "<tr><td style=\"background-color:#CCCCCC\">$WebPlan1[2]</td>";

			echo "<td style=\"background-color:#CCCCCC\">$WebPlan1[3]</td></tr>";

			echo "<tr><td colspan=\"2\" style=\"background-color:#CCCCCC; height:40px\">$WebPlan1[4]</td></tr></table></span>";

			

			echo "<h2 style=\"text-align:center; clear:left\"><br />$Package[2]</h2>";

			echo "<table cellspacing=\"1\" cellpadding=\"3\"><tr style=\"background-color:#04CFFB; color:#FFFFFF; font-size:20px\"><td><b>$TextPlan1[0]</b></td>";

			echo "<td><b>$TextPlan2[0]</b></td>";

			echo "<td><b>$TextPlan3[0]</b></td>";

			echo "<td><b>$TextPlan4[0]</b></td></tr>";

			echo "<tr><td style=\"background-color:#CCCCCC\">$TextPlan1[1]</td>";

			echo "<td style=\"background-color:#CCCCCC\">$TextPlan2[1]</td>";

			echo "<td style=\"background-color:#CCCCCC\">$TextPlan3[1]</td>";

			echo "<td style=\"background-color:#CCCCCC\">$TextPlan4[1]</td></tr>";

			echo "<tr style=\"background-color:#CCCCCC\"><td colspan=\"2\">$TextPlan1[2]</td>";

			echo "<td colspan=\"2\" style=\"background-color:#CCCCCC\">$TextPlan3[2]</td></tr>";

			echo "<td colspan=\"4\" style=\"background-color:#CCCCCC; height:40px\">$TextPlan1[3]</td></tr></table>";

			

			echo "<br /><br /><p style=\"text-align:left\"><b style=\"font-size:20px\">$Paragraph[1]: </b>" . "$Paragraph[2]</p><br /><br />";

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