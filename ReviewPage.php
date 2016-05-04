<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">







<html xmlns="http://www.w3.org/1999/xhtml">







<head>







<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />







<title>PHONE.CA - Reviews</title>







<link rel="stylesheet" type="text/css" href="CustomerService.css" />



<link rel="stylesheet" type="text/css" href="Cart.css" />







</head>















<body>







<!-- Main Website Holder -->







<div id="holder">







<!-- Top Side of the Website -->



	<div class="Top-Side">



		<? include("Includes/header.php"); ?>



		<h1>Reviews&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>



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



		// ----------------------------- Connect to Item Table ----------------------------------



		$ItemID = $_REQUEST['txtHiddenIntItemID'];



		



		include("Includes/Database-Connection.php");



		



		$table_name1 = "Syed_Gilani_STR_Item";



					



		$sqlString1 = "select * from $table_name1 where  intItemID = '$ItemID'";



		$result1 = @mysql_query($sqlString1, $dbh) or die ("Couldn't execute query");



		$Obtain = mysql_fetch_array($result1);



		



		$Picture = $Obtain['strImage'];



		?>



		<span><h2>



		<?	



			echo $Obtain['strItemCast'] . " " . $Obtain['strItemName'] . " " . $Obtain['strCategory'] . "<br />Customer Review";?>



		</h2></span>



		<div class="picture">



			<? echo "<img src=\"http://www.humbermedia2.ca/portfolio0708/syed_gilani/php/Products/Phone/Images/$Picture" . ".jpg\" alt=\"" . $Obtain['strItemName'] . "\" border='0' width='170px'>";?>



			<br /><br /><br /><? echo "<a href=ReviewForm.php?txtHiddenIntItemID=" . $Obtain['intItemID'] . ">Write a Review</a>" ?>



		</div>



		<?



		// ------------------------------- Connect to Reviews Table -------------------------------



		$ItemID = $_REQUEST['txtHiddenIntItemID'];		



		



		include("Includes/Database-Connection.php");



		



		$table_name2 = "Syed_Gilani_STR_Reviews";



					



		$sqlString2 = "select * from $table_name2";



		$result2 = @mysql_query($sqlString2, $dbh) or die ("Couldn't execute query");



		?>



		<div class="info2" style="text-align:left">



		<?



		while($recordset = @mysql_fetch_array($result2))



		{	

			if($recordset['ItemNumber'] == $ItemID)

			{

					$strName = $recordset['strName'];					

					$strDate = $recordset['strDate'];

					$strLocation = $recordset['strLocation'];

					$strSubject = $recordset['strSubject'];

					$strMessage = $recordset['strMessage'];

					

					$B = explode("-", $strDate);

					$Date = $B[0]."/".$B[1]."/".$B[2];

			

					echo "<b style=\"font-size:18px\">$strSubject</b>, $Date<br />";

					echo "Reviewer: $strName<br />From: $strLocation";

					echo "<p>$strMessage</p><hr />";

			}

//			if($recordset['ItemNumber'] == $ItemID)

//			{

//					$strName = $recordset['strName'];

//					$strDate = $recordset['strDate'];

//					$strLocation = $recordset['strLocation'];

//					$strSubject = $recordset['strSubject'];

//					$strMessage = $recordset['strMessage'];

//					

//					$B = explode("-", $strDate);

//					$Date = $B[0]."/".$B[1]."/".$B[2];

//			

//					echo "<b style=\"font-size:18px>$strSubject</b>, $Date<br />";

//					echo "Reviewer: $strName, $strLocation";

//					echo "<p>$strMessage</p><hr /><br /><br />";

//			}

		}



		?><br /><br /></div>

	</div>





<!-- Footer -->







	<div id="footer">



		<? include("Includes/footer.php"); ?>



	</div>







</div>







</body>







</html>







