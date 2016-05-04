<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>PHONE.CA - Job Details</title>

<link rel="stylesheet" type="text/css" href="index.css" />
<script language="javascript">
	function goback()
	{
		window.history.go(-1);
	}
</script>

</head>

<body>

<!-- Main Website Holder -->

<div id="holder">

<!-- Top Side of the Website -->

	<div class="Top-Side">

		<? include("Includes/header.php"); ?>
		<h1>Job Details&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>
		<? include("Includes/Top-Links.php"); ?>

	</div>

<!-- Top Navigation Bar -->

	<div id="Menu-Holder1">
		<? include("Includes/Top-Nav.php"); ?>
	</div>

<!-- Content -->
	<div id="Content" style="text-align:left; width:700px">

	<br />

<?
		$JobId= $_REQUEST['JobId'];

		include("application_functions.php"); 
		$dbh=db_connect();
		$table_name1 = "Syed_Gilani_STR_Careers";

		$strSQLQuery = "SELECT * from $table_name1 where intJobId= $JobId";
		$result =@mysql_query($strSQLQuery, $dbh) or die ("Couldn't execute query");
		$rs = mysql_fetch_array($result);

		$JobId= $rs['intJobId'];

		$JobTitle= $rs['strJobTitle'];

		$Dept=$rs['strDept'];

		$EmailTo=$rs['strEmailTo'];

		$PostDate=$rs['dtPostDate'];

		$LastDate=$rs['dtLastDateToApply'];

		$NoFPositions=$rs['NoFPositions'];

		$JobDesc=$rs['strJobDesc'];

		echo "<h2>$JobTitle</h2>";

		echo "<table align=\"left\">";

		echo "<tr><td align=\"left\" width=\"150\" bgcolor=\"#DBDBDB\"> <strong>Job Id </strong></td>";

		echo "<td bgcolor=\"#F4F4F4\" align=\"left\">$JobId</td></tr>";

		echo "<tr><td align=\"left\" bgcolor=\"#DBDBDB\"> <strong>Job Title </strong></td>";

		echo "<td bgcolor=\"#F4F4F4\" align=\"left\">$JobTitle</td></tr>";

		echo "<tr><td align=\"left\" bgcolor=\"#DBDBDB\"> <strong>Department </strong></td>";

		echo "<td bgcolor=\"#F4F4F4\" align=\"left\">$Dept</td></tr>";

		echo "<tr><td align=\"left\" bgcolor=\"#DBDBDB\"> <strong>Email To: </strong></td>";

		echo "<td bgcolor=\"#F4F4F4\" align=\"left\">$EmailTo</td></tr>";

		echo "<tr><td align=\"left\" bgcolor=\"#DBDBDB\"> <strong>Post Date </strong></td>";

		echo "<td bgcolor=\"#F4F4F4\" align=\"left\">$PostDate</td></tr>";

		echo "<tr><td align=\"left\" bgcolor=\"#DBDBDB\"> <strong>Last Date </strong></td>";

		echo "<td bgcolor=\"#F4F4F4\" align=\"left\">$LastDate</td></tr>";

		echo "<tr><td align=\"left\" bgcolor=\"#DBDBDB\"> <strong>No of Positions </strong></td>";

		echo "<td bgcolor=\"#F4F4F4\" align=\"left\">$NoFPositions</td></tr>";

		echo "<tr><td align=\"left\" bgcolor=\"#DBDBDB\"> <strong>Description </strong></td>";

		echo "<td bgcolor=\"#F4F4F4\"align=\"left\">$JobDesc</td></tr>";

		echo "<tr height=\"30\"><td></td>";

		echo "<td></td></tr>";

		echo "<tr><td></td>";

		echo "<td><input type=\"button\" value=\"Back\" onclick=\"goback()\" /><br /><br /><br /><br /></td></tr>";

		echo "<br /></table>";
?>
	</div>

<!-- Footer -->

	<div id="footer">
		<? include("Includes/footer.php"); ?>
	</div>

</div>
</body>
</html>