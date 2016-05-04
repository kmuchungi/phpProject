<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Welcome to PHONE.CA</title>

<link rel="stylesheet" type="text/css" href="Template.css" />
<link rel="stylesheet" type="text/css" href="Cart.css" />

</head>



<body>

<!-- Main Website Holder -->

<div id="holder">

<!-- Top Side of the Website -->

	<div class="Top-Side">

		<? include("Includes/header.php"); ?>

		<h1>Welcome</h1>

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

	<div id="Content">
<form action="TopSales.php" method="post">

<?
			$strCat=$_POST['Category'];
			
			if ($strCat=="None" || $strCat =="/")
			{
				$strCat="";
			}
?>    
      <fieldset>
    	<legend>Search</legend>
        		<center><em> <font size="2"><b>NOTE:</b>&nbsp;&nbsp;Brand-wise search for new releases is available by selecting brand down here. </font></em><br /><br />
<font size="2">				Brand: <select name="Category">
<?
								
								if ($strCat != "" || $strCat != "None") {
?>					
	                				<option value="None"><font size="+2">None</font></option>
<?
								}else{	
?>                                
									<option selected="selected" value="None"><font size="+2">None</font></option>
<?
								}
								
								if ($strCat == "Nokia") {
?>
 
                                	<option selected="selected" value="Nokia"><font size="+2">Nokia</font></option>
<?
								}else{
?>                   
                                	<option value="Nokia"><font size="+2">Nokia</font></option>
<?
								}
								if ($strCat == "Motorola") {
?>
                                	<option selected="selected" value="Motorola"><font size="+2">Motorola</font></option>
<?
								}else{
?>                   
                                	<option value="Motorola"><font size="+2">Motorola</font></option>
<?
								}
								if ($strCat == "Samsung") {
?>
                                	<option selected="selected" value="Samsung"><font size="+2">Samsung</font></option>
<?
								}else{
?>                   
                                	<option value="Samsung"><font size="+2">Samsung</font></option>
<?
								}
								if ($strCat == "Symbol") {
?>
                                	<option selected="selected" value="Symbol"><font size="+2">Symbol</font></option>
<?
								}else{
?>                   
                                	<option value="Symbol"><font size="+2">Symbol</font></option>
<?
								}
								if ($strCat == "TELUS") {
?>
                                	<option selected="selected" value="TELUS"><font size="+2">TELUS</font></option>
<?
								}else{
?>                   
                                	<option value="TELUS"><font size="+2">TELUS</font></option>
<?
								}
?>
                			</select> &nbsp;&nbsp;&nbsp;&nbsp;	
                            <input type="submit" value="Search" /> <br />
        	</center>
			</font>        
      </fieldset>  

<?
	include("application_functions.php"); 
	$dbh=db_connect();
	$table_name1 = "Syed_Gilani_STR_Item";

/*	$lastmonth = date();
	echo $lastmonth;


	$CurntDate = getdate();
	settype($CurntDate, "date");
	echo gettype($CurntDate) . "<br />";
*/
			$DateToStart = "2007-10-15";
			if ($strCat=="" || $strCat=="None")
			{
				$sqlString = "SELECT * FROM $table_name1 where (strActive=\"y\" || strActive=\"Y\") ORDER BY intQtySold DESC";
			}
			else
			{
				$sqlString = "SELECT * FROM $table_name1 where strItemCast='$strCat' && (strActive=\"y\" || strActive=\"Y\") ORDER BY intQtySold DESC";

			}
	
            $result =@mysql_query($sqlString, $dbh) or die ("Couldn't execute query");

			$iCount=1;
			echo "<table cellspacing=\"5\" border=\"0\">";
				while($rs = mysql_fetch_array($result))
				{
					if ($iCount==1)
					{ 
						echo "<tr><td align = \"left\">";
						echo "<font color=\"#009933\" size=\"2\"" . "><strong> Top Sales </strong></font><br />";
						echo "<br /><img src = \"http://www.humbermedia2.ca/portfolio0708/syed_gilani/php/Products/Phone/Images/" . $rs['strImage'] . ".jpg\" alt='". $rs['strItemName'] . "' border='0' width='80px' height='100' /></td><td align = \"left\">";
						echo "<br />" . $rs['strItemCast'] . " " . $rs['strItemName'] . "<br />";
						echo "$" . $rs['curItemPrice'] . "<br />";
						echo "<br /><font size=\"2\">Qty Sold:&nbsp;&nbsp;" . $rs['intQtySold'] . "</font><br />";
						echo "<br /><font size=\"2\"><div class='cartbuttn'><a href=AddCart.php?txtHiddenIntItemID=" . $rs['intItemID'] . "> Add to Basket </font></a></div>";
						echo "<font size = \"1\"> " . "<a href=DetailPage2.asp?txtHiddenIntItemID=" . $rs['intItemID'] . ">More </a>";
						echo "</td><td width=\"30\"><td width=\"30\">";
						$iCount=2;
					 }
					 else
					 {
						echo "<td align = \"right\">";
						echo "<br />" . $rs['strItemCast'] . " " . $rs['strItemName'] . "<br />";
						echo "$" . $rs['curItemPrice'] . "<br />";
						echo "<br /><font size=\"2\">Qty Sold:&nbsp;&nbsp;" . $rs['intQtySold'] . "</font><br />";
						echo "<br /><font size=\"2\"><div class='cartbuttn'><a href=AddCart.php?txtHiddenIntItemID=" . $rs['intItemID'] . "> Add to Basket </font></a></div>";
						echo "<font size = \"1\"> " . "<a href=DetailPage2.asp?txtHiddenIntItemID=" . $rs['intItemID'] . ">More </a></td><td align=\"right\">";
						echo "<font color=\"#009933\" size=\"2\"" . "><strong> Top Sales </strong></font><br />";
						echo "<br /><img src = \"http://www.humbermedia2.ca/portfolio0708/syed_gilani/php/Products/Phone/Images/" . $rs['strImage'] . ".jpg\" alt='". $rs['strItemName'] . "' border='0' width='80px' height='100' /></td><td align = \"left\">";
						echo "</td></tr><tr height='30'></tr>";
						$iCount=1;
					  }
					}
					echo "</table>";
//				}
	?>
	</form>	

	</div>

<!-- Footer -->

	<div id="footer">

		@ 2007 Phone.ca. All rights reserved.

	</div>
</div>
</body>
</html>