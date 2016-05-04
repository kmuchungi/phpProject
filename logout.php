<? session_start(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>PHONE.CA - Customer Logout</title>

<link rel="stylesheet" type="text/css" href="CustomerService.css" />
<link rel="stylesheet" type="text/css" href="Cart.css" />

</head>

<body onLoad="lod()">

<!-- Main Website Holder -->

<div id="holder">

<!-- Top Side of the Website -->

	<div class="Top-Side">

		<? include("Includes/header.php"); ?>

		<h1>Customer Logout&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>

		<? include("Includes/Top-Links.php"); ?>

	</div>

<!-- Top Navigation Bar -->

	<div id="Menu-Holder1">

		<? include("Includes/Top-Nav.php"); ?>

	</div>

<!--- Left Column --->

	<div id="Left-Side">

		<? include("Includes/left-side2.php"); ?>			

	</div>

<!-- Content -->

	<div id="Content">

<?
			session_unset();
			echo "<br /><br /><center><h3>You are logged out safely. Thanks for visiting us.</h3></center>";
?>
	</div><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

<!-- Footer -->

	<div id="footer">
		<? include("Includes/footer.php"); ?>
	</div>

</div>
</body>
</html>
