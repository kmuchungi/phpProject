<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Welcome to PHONE.CA</title>

<link rel="stylesheet" type="text/css" href="index.css" />

</head>



<body>

<!-- Main Website Holder -->

<div id="holder">

<!-- Top Side of the Website -->

	<div class="Top-Side">

		<? include("Includes/header.php"); ?>

		<h1>Welcome&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>

		<? include("Includes/Top-Links.php"); ?>

	</div>

<!-- Top Navigation Bar -->

	<div id="Menu-Holder1">

		<? include("Includes/Top-Nav.php"); ?>

	</div>

<!-- Content -->

	<div id="Content">

		<?

		// ------------------------------- Connect to Database --------------------------------------

		$host = "humbermedia2.ca";

		$username = "humb2ca_d78t2";

		$password = "dare_to_dream_0708";

		

		$db_name = "humb2ca_d";

		$table_name = "Syed_Gilani_STR_MainPage";

		

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

		

		while($recordset=@mysql_fetch_array($result))

		{

			$FlashMovie = $recordset['strFlashFile'];

			$strImage1 = $recordset['strImage1'];

			$strImage2 = $recordset['strImage2'];

			$strImage3 = $recordset['strImage3'];

			$strImage4 = $recordset['strImage4'];

			$strImage5 = $recordset['strImage5'];

			$strImage6 = $recordset['strImage6'];

			

			//------------------- Displaying dynamic content into Website --------------------

			

			echo "<div id=\"flash-menu\"><object type=\"application/x-shockwave-flash\" data=\"Images/$FlashMovie" . ".swf\" width=\"850\" height=\"215\">";

			echo "<param name=\"movie\" value=\"Images/$FlashMovie" . ".swf\" />";

			echo "<img src=\"banner.gif\" width=\"850\" height=\"215\" alt=\"banner\" />";

			echo "</object></div><br />";

			echo "<div class=\"Promotion-Ads1\"><a href=\"features.php\" border='0'><img src=\"http://www.humbermedia2.ca/portfolio0708/syed_gilani/php/Products/Phone/Images/$strImage1" . ".jpg\" alt=\"$strImage1\" border='0' width='250px'></a></div>";

			echo "<div class=\"Promotion-Ads1\"><a href=\"phones.php\" border='0'><img src=\"http://www.humbermedia2.ca/portfolio0708/syed_gilani/php/Products/Phone/Images/$strImage2" . ".jpg\" alt=\"$strImage2\" border='0' width='250px'></a></div>";

			echo "<div class=\"Promotion-Ads1\"><a href=\"promotions.php\" border='0'><img src=\"http://www.humbermedia2.ca/portfolio0708/syed_gilani/php/Products/Phone/Images/$strImage3" . ".jpg\" alt=\"$strImage3\" border='0' width='250px'></a></div>";

			echo "<div class=\"Promotion-Ads2\"><br /><a href=\"promotions.php\" border='0'><img src=\"http://www.humbermedia2.ca/portfolio0708/syed_gilani/php/Products/Phone/Images/$strImage4" . ".jpg\" alt=\"$strImage4\" border='0' width='250px'></a></div>";

			echo "<div class=\"Promotion-Ads1\"><br /><a href=\"promotions.php\" border='0'><img src=\"http://www.humbermedia2.ca/portfolio0708/syed_gilani/php/Products/Phone/Images/$strImage5" . ".jpg\" alt=\"$strImage5\" border='0' width='250px'></a></div>";

			echo "<div class=\"Promotion-Ads1\"><br /><a href=\"promotions.php\" border='0'><img src=\"http://www.humbermedia2.ca/portfolio0708/syed_gilani/php/Products/Phone/Images/$strImage6" . ".jpg\" alt=\"$strImage6\" border='0' width='250px'></a><br /><br /></div>";

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

