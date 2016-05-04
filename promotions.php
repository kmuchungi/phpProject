<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>PHONE.CA - Promotions</title>

<link rel="stylesheet" type="text/css" href="CustomerService.css" />

</head>



<body>

<!-- Main Website Holder -->

<div id="holder">

<!-- Top Side of the Website -->

	<div class="Top-Side">

		<? include("Includes/header.php"); ?>

		<h1>Promotions&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>

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

	<div id="Content" style="text-align:left">

		<?

// ------------------------------- Promotion 1 --------------------------------------

		include("application_functions.php"); 
		$dbh=db_connect();
		$table_name = "Syed_Gilani_STR_Promotions";

		$sqlString = "select * from $table_name where (strPromotionNumber = 'Promotion 1')";

		$result = @mysql_query($sqlString, $dbh) or die ("Couldn't execute query");

	

		while($recordset=@mysql_fetch_array($result))

		{	

			$strTextTitle1 = $recordset['strTextTitle1'];

			$strText1 = $recordset['strText1'];

			$strText2 = $recordset['strText2'];

			$strImage1 = $recordset['strImage1'];

			

			echo "<h2>Promotions</h2>";

			echo "<hr /><b style=\"font-size:20px; color:red\">$strTextTitle1</b>";

			echo "<div style=\"float:left; width:440px\"><p>$strText1</p>";

			echo "<p>$strText2</p></div>";

			echo "<img src=\"http://www.humbermedia2.ca/portfolio0708/syed_gilani/php/Products/Phone/Images/$strImage1" . ".jpg\" alt=\"$strImage1\" style=\"float:left; width:200px; padding-left:20px\" />";

		}

		?>

		<?	

//---------------------------- Promotion 2 --------------------------------------

		include("Includes/Database-Connection.php");

		

		$table_name = "Syed_Gilani_STR_Promotions";

		$sqlString = "select * from $table_name where strPromotionNumber = 'Promotion 2'";

		$result = @mysql_query($sqlString, $dbh) or die ("Couldn't execute query");

		

		while($recordset=@mysql_fetch_array($result))

		{

			$strTextTitle1 = $recordset['strTextTitle1'];

			$strText1 = $recordset['strText1'];

			$strText2 = $recordset['strText2'];

			$strText3 = $recordset['strText3'];

			$strImage1 = $recordset['strImage1'];

			

			$Titles = explode(" - ", $strTextTitle1);

			$Text2 = explode(" - ", $strText2);

			

			echo "<hr style=\"clear:left\"/><b style=\"font-size:20px; color:red\">$Titles[0]</b>";

			echo "<div style=\"float:left; width:440px\"><p>$strText1</p>";

			echo "<b style=\"font-size:18px\">$Titles[1]</b>";

			echo "<ul><li>$Text2[0]</li>";

			echo "<li>$Text2[1]</li>";

			echo "<li>$Text2[2]</li></ul>";

			echo "<b style=\"font-size:18px\">$Titles[2]</b>";

			echo "<p>$strText3</p>";

			echo "<b style=\"font-size:18px\">$Titles[3]</b><br /><br /></div>";

			echo "<img src=\"http://www.humbermedia2.ca/portfolio0708/syed_gilani/php/Products/Phone/Images/$strImage1" . ".jpg\" alt=\"$strImage1\" style=\"float:left; width:200px; padding-left:20px; padding-top:40px\" />";

		}

		?>	

		<?

//		---------------------------- Promotion 3 --------------------------------------

		include("Includes/Database-Connection.php");

		

		$table_name = "Syed_Gilani_STR_Promotions";

		$sqlString = "select * from $table_name where strPromotionNumber = 'Promotion 3'";

		$result = @mysql_query($sqlString, $dbh) or die ("Couldn't execute query");

		

		while($recordset=@mysql_fetch_array($result))

		{

			$strTextTitle1 = $recordset['strTextTitle1'];

			$strText1 = $recordset['strText1'];

			$strText2 = $recordset['strText2'];

			$strText3 = $recordset['strText3'];

			$strText4 = $recordset['strText4'];

			$strImage1 = $recordset['strImage1'];

			

			$Titles = explode(" - ", $strTextTitle1);

			$Text2 = explode(" - ", $strText2);

			

			echo "<hr style=\"clear:left\"/><b style=\"font-size:20px; color:red\">$Titles[0]</b><br />";

			echo "<b style=\"font-size:18px\">$Titles[1]</b>";

			echo "<div style=\"float:left; width:440px\"><p>$strText1</p>";

			echo "<b style=\"font-size:18px\">$Titles[2]</b>";

			echo "<ul><li>$Text2[0]</li>";

			echo "<li>$Text2[1]</li></ul>";		

			echo "<p>$strText3</p>";

			echo "<p style=\"font-size:14px\">Note:" . "$strText4</p></div>";

			echo "<img src=\"http://www.humbermedia2.ca/portfolio0708/syed_gilani/php/Products/Phone/Images/$strImage1" . ".jpg\" alt=\"$strImage1\" style=\"float:left; width:200px; padding-left:20px; padding-top:40px\" />";

		}

		?>

		<?

//		---------------------------- Promotion 4 --------------------------------------

		include("Includes/Database-Connection.php");

		

		$table_name = "Syed_Gilani_STR_Promotions";

		$sqlString = "select * from $table_name where strPromotionNumber = 'Promotion 4'";

		$result = @mysql_query($sqlString, $dbh) or die ("Couldn't execute query");

		

		while($recordset=@mysql_fetch_array($result))

		{

			$strTextTitle1 = $recordset['strTextTitle1'];

			$strText1 = $recordset['strText1'];

			$strText2 = $recordset['strText2'];

			$strImage1 = $recordset['strImage1'];

			

			$Titles = explode(" - ", $strTextTitle1);

			$Text1 = explode(" - ", $strText1);

			

			echo "<hr style=\"clear:left\"/><b style=\"font-size:20px; color:red\">$Titles[0]</b><br />";

			echo "<b style=\"font-size:18px\">$Titles[1]</b>";

			echo "<div style=\"float:left; width:440px\"><p>$Text1[0]</p>";

			echo "<ul><li>$Text1[1]</li>";

			echo "<li>$Text1[2]</li>";	

			echo "<li>$Text1[3]</li>";

			echo "<li>$Text1[4]</li>";

			echo "<li>$Text1[5]</li></ul>";	

			echo "<p>$strText2</p><br /><br /></div>";

			echo "<img src=\"http://www.humbermedia2.ca/portfolio0708/syed_gilani/php/Products/Phone/Images/$strImage1" . ".jpg\" alt=\"$strImage1\" style=\"float:left; width:200px; padding-left:20px; padding-top:40px\" />";

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

