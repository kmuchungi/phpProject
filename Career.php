<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>PHONE.CA - Careers</title>

<link rel="stylesheet" type="text/css" href="index.css" />

</head>

<body>

<!-- Main Website Holder -->

<div id="holder">

<!-- Top Side of the Website -->

	<div class="Top-Side">	

		<? include("Includes/header.php"); ?>

		<h1>Careers&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>
		<? include("Includes/Top-Links.php"); ?>

	</div>

<!-- Top Navigation Bar -->

	<div id="Menu-Holder1">

		<? include("Includes/Top-Nav.php"); ?>

	</div>

<!-- Content -->

	<div id="Content" style="text-align:left; width:700px">

	<br /><br />

<?

	include("application_functions.php"); 
	$dbh=db_connect();

	$table_name1 = "Syed_Gilani_STR_Careers";
	$sqlString = "SELECT * from $table_name1 ";

    $result =@mysql_query($sqlString, $dbh) or die ("Couldn't execute query");

	$intNameLink = 1;
?>
	<h2>Positions we are looking at Phone.ca</h2><br />

	<table width="700px">

            	<th width="300" align="center" bgcolor="#9BA8DB"><font size="3">Job Title</font></th>

                <th width="200" align="center" bgcolor="#9BA8DB"><font size="3">Department</font></th>

                <th width="200" align="center" bgcolor="#9BA8DB"><font size="3">Closing Date</font></th>

<?		
				while($rs = mysql_fetch_array($result))

				{

					if ($intNameLink==1)

					{
?>
                		<tr valign="top">

                    		<td width="380" align="left" bgcolor="#F0F0F0"><font size="3"><a href="JobDetails.php?JobId=<?= $rs['intJobId']?>"><?=$rs['strJobTitle']?></td>

                    		<td width ="200" align="center" bgcolor="#F0F0F0"><font size="3"><?=$rs['strDept']?></td>

                			<td width = "200" align="center" bgcolor="#F0F0F0"><font size="3"><?=$rs['dtLastDateToApply']?></td>

    	            	</tr>

<?
						$intNameLink = 2;
					}
					else

					{
?>
                		<tr valign="top">

                    		<td width="380" align="left" bgcolor="#DADADA"><font size="3"><a href="JobDetails.php?JobId= <?= $rs['intJobId']?>"><?=$rs['strJobTitle']?></font></td>

                    		<td width ="200" align="center" bgcolor="#DADADA"><font size="3"><?=$rs['strDept']?></font></td>

                			<td width = "200" align="center" bgcolor="#DADADA"><font size="3"><?=$rs['dtLastDateToApply']?></font></td>
    	            	</tr>

<?			
						$intNameLink = 1;

					}
				}	
?>

	</table><br /><br /><br /><br /><br /><br />

	</div>

<!-- Footer -->

	<div id="footer">

		<? include("Includes/footer.php"); ?>

	</div>

</div>
</body>
</html>