<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>PHONE.CA - About Us</title>

<link rel="stylesheet" type="text/css" href="index.css" />

</head>



<body>

<!-- Main Website Holder -->

<div id="holder">

<!-- Top Side of the Website -->

	<div class="Top-Side">

		<? include("Includes/header.php"); ?>

		<h1>About Us&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>

		<? include("Includes/Top-Links.php"); ?>

	</div>

<!-- Top Navigation Bar -->

	<div id="Menu-Holder1">

		<? include("Includes/Top-Nav.php"); ?>

	</div>

<!-- Content -->

	<div id="Content" style="text-align:left; width:700px">

		<?

		// ------------------------------- Connect to Database --------------------------------------

		$host = "humbermedia2.ca";

		$username = "humb2ca_d78t2";

		$password = "dare_to_dream_0708";

		

		$db_name = "humb2ca_d";

		$table_name = "Syed_Gilani_STR_Content";

		

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

		

		$sqlString = "select * from $table_name where intID = '1'";

		$result = @mysql_query($sqlString, $dbh) or die ("Couldn't execute query");

		

		while($recordset=@mysql_fetch_array($result))

		{

			$strTextTitle1 = $recordset['strTextTitle1'];

			$strText1 = $recordset['strText1'];

			$strText2 = $recordset['strText2'];

			$strText3 = $recordset['strText3'];

			

			$Titles = explode(" - ", $strTextTitle1);

			

//------------------- Displaying dynamic content into Website --------------------

			

			echo "<hr /><b style=\"font-size:28px\">$Titles[0]</b><hr />";

			echo "<p>$strText1</p>";

			echo "<h3>$Titles[1]</h3>";

			echo "<p>$strText2</p>";

			echo "<h3>$Titles[2]</h3>";

			echo "<p>$strText3</p><br /><br />";

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

