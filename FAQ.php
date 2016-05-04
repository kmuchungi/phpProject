<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>PHONE.CA - FAQ</title>
<link rel="stylesheet" type="text/css" href="CustomerService.css" />
</head>

<body>

<!-- Main Website Holder -->

<div id="holder">

<!-- Top Side of the Website -->

	<div class="Top-Side">	

		<? include("Includes/header.php"); ?>

		<h1>FAQ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>

		<? include("Includes/Top-Links.php"); ?>
	</div>

<!-- Top Navigation Bar -->

	<div id="Menu-Holder1">

		<? include("Includes/Top-Nav.php"); ?>
	</div>

<!--- Left Column --->

	<div id="Left-Side">
		<? include("Includes/left-side1.php"); ?>			
	</div>

<!-- Content -->

	<div id="Content" style="text-align:left; width:700px">

<?
		include("application_functions.php");
		$dbh=db_connect();

		$table_name1 = "Syed_Gilani_STR_Faq";

		$strSQLQuery = "SELECT * from $table_name1";

		$result =@mysql_query($strSQLQuery, $dbh) or die ("Couldn't execute query");

		echo "<h3>Frequently Asked Questions</a></h3><br />";

		echo "<table cellpadding=\"1\" cellspacing=\"1\" border=\"0\">";

		while($rs = mysql_fetch_array($result))
		{
			echo "<tr><td align=\"left\" bgcolor=\"#DBDBDB\"><strong>Question: </strong></td>";
	
			echo "<td align=\"left\" bgcolor=\"#F4F4F4\"><strong>" . $rs['strQuestion'] . "</strong></td></tr>";
	
			echo "<tr><td align=\"left\" bgcolor=\"#DBDBDB\">Answer: </td>";
	
			echo "<td align=\"left\" bgcolor=\"#F4F4F4\">" . $rs['strAnswer'] . "</td></tr>";
	
			echo "<tr><td height=\"20\"></td>";
	
			echo "<td height=\"20\"></td></tr>";
		}
		echo "</table><br /><br /><br /><br />";
?>	

<br /><br />

	</div>

<!-- Footer -->
	<div id="footer">

		<? include("Includes/footer.php"); ?>

	</div>

</div>

</body>
</html>