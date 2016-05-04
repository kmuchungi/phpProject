<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>PHONE.CA - Newsletter</title>

<link rel="stylesheet" type="text/css" href="CustomerService.css" />

</head>



<body>

<!-- Main Website Holder -->

<div id="holder">

<!-- Top Side of the Website -->

	<div class="Top-Side">

		<? include("Includes/header.php"); ?>

		<h1>Newsletter&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>

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
		include("application_functions.php"); 
		$dbh=db_connect();
		$table_name = "Team2_STR_Newsletter";

		$sqlString = "select * from $table_name";
		$result = @mysql_query($sqlString, $dbh) or die ("Couldn't execute query");

		while($recordset=@mysql_fetch_array($result))
		{	
			$strTextTitle1 = $recordset['strTextTitle1'];

			$strText1 = $recordset['strText1'];

			$strText2 = $recordset['strText2'];

			$strText3 = $recordset['strText3'];

			$strText4 = $recordset['strText4'];

			$strImage1 = $recordset['strImage1'];

			$Text2 = explode(" - ", $strText2);

			$Text4 = explode(" - ", $strText4);

			echo "<h2>$strTextTitle1</h2>";

			echo "<p>$strText1</p>";

			echo "<ul><li>$Text2[0]</li>";

			echo "<li>$Text2[1]</li></ul>";

			echo "<p>$strText3</p>";

			echo "<img src=\"http://www.humbermedia2.ca/portfolio0708/team2/PHP/Website2/Images/$strImage1" . ".jpg\" alt=\"$strImage1\" style=\"text-align:center; width:550px\" />";

		}
			echo "<p>$Text4[0]" . " " . "<a href=\"subscribe.php\">$Text4[1]</a>" . " " . "$Text4[2]<br /><br /></p>";
		?>
	</div>

<!-- Footer -->

	<div id="footer">
		<? include("Includes/footer.php"); ?>
	</div>
</div>
</body>
</html>