<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



<html xmlns="http://www.w3.org/1999/xhtml">



<head>



<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />



<title>PHONE.CA - Review Form</title>



<link rel="stylesheet" type="text/css" href="CustomerService.css" />



<script language="javascript">



	function textCounter(field, countfield, maxlimit) 



	{



		if (field.value.length > maxlimit)



			field.value = field.value.substring(0, maxlimit);



		else 



			countfield.value = maxlimit - field.value.length;



	}



	



	function lod()



	{



		document.Subscribe.UserName.focus();



		document.Subscribe.UserName.select();



	}



</script>



</head>







<body>



<!-- Main Website Holder -->



<div id="holder">



<!-- Top Side of the Website -->



	<div class="Top-Side">



		<? include("Includes/header.php"); ?>



		<h1>Review Form &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>



		<? include("Includes/Top-Links.php"); ?>



	</div>



<!-- Top Navigation Bar -->



	<div id="Menu-Holder1">



		<? include("Includes/Top-Nav.php"); ?>



	</div>



	<div id="Left-Side">



		<? include("Includes/left-side2.php"); ?>		



	</div>



<!-- Content -->



	<div id="Content">



	<?



		$pattern1 = "(^[a-zA-Z]+$)";



			



		$host = "humbermedia2.ca";

		$username = "humb2ca_d78t2";

		$password = "dare_to_dream_0708";

		$dbname="humb2ca_d";

		$table_name1 = "Syed_Gilani_STR_Reviews";



				



		if($dbh=mysql_connect($host, $username, $password)){}



		else



		{



			die ('<hr /> I cannot connect to mysql because: ' . mysql_error());



		}	



	



		if ($dbconn=@mysql_select_db($dbname, $dbh)){}



		else



		{



			die ('<hr>I cannot connect to database because:'.mysql_error());



		}







		if ($_POST['PassCheck'] == "Passed")



		{



			$iCheck=1;

			

			$Item = stripslashes($_POST['Item']);



       		$Name = stripslashes($_POST['Name']);



	        $Location = stripslashes($_POST['Location']);



			$Subject = stripslashes($_POST['Subject']);



			$Message = stripslashes($_POST['Message']);



         



			if ($Name == "" || $Location == "" || $Subject == "" || $Message == "") 



			{



				$error = $error . "Please fill out everything. <br />";



			}



			else



			{



				if (preg_match($pattern1, $Name)){}



				else



				{



					$error = $error . "Your Name is NOT a valid Name.<br />";



				}				



			}



		}



   		if ($_POST['PassCheck'] == "Passed")



		{



			if ($error!="")



	        {



?>



			 	<font size="2" color="#FF0000"> <?=$error?></font>



<?	



    	    }



			else



			{





					$Date = Date("Y-m-d");					



					$sqlString1 = "Insert into $table_name1 values ('$Item', '$Name', '$Location', '$Date', '$Subject', '$Message')";



					$result1 =@mysql_query($sqlString1, $dbh) or die ("Couldn't execute query");



	



					echo "<em>Congratulations! Your review was successfully added.</em>";



					



					$Name= "";



					$Location= "";



					$Date = "";



					$Subject = "";



					$Message = "";







?>



						<script language="javascript">



                        	lod();



                        </script>







<?



					



			}



		}



?>  



	<form class="form2" name="ReviewForm" action="ReviewForm.php" method="post" style="text-align:left; width:600px">



		<table>



			<tr>



				<td colspan="2" style="background-color:#CCCCCC; font-size:24px">Share what you have to say</td>



			</tr>



			<tr>



				<td colspan="2"><br />



					<span class="style2"><font size="2">Share what you have to say with the rest of Canada. Write a customer review on any product and help others make a final buying decision.</font></span><br />



				</td>



			</tr>



			<tr>



				<td><b>Enter your name:</b></td>



				<td><input type="text" name="Name" value="<?= $Name ?>">*</td>



			</tr>



			<tr>



				<td><b>Enter your location:</b></td>



				<td><input type="text" name="Location" value="<?= $Location ?>">*</td>



			</tr>



			<tr>



				<td><b>Pick the product you want to sent a review:</b></td>



				<td>



					<select name="Item">

					<?

						$ItemID = $_REQUEST['txtHiddenIntItemID'];	

						if ($ItemID == 1) {$Choice1 = "selected";} 

						if ($ItemID == 2) {$Choice2 = "selected";} 

						if ($ItemID == 3) {$Choice3 = "selected";} 

						if ($ItemID == 4) {$Choice4 = "selected";} 

						if ($ItemID == 5) {$Choice5 = "selected";} 

						if ($ItemID == 6) {$Choice6 = "selected";} 

						if ($ItemID == 7) {$Choice7 = "selected";} 

						if ($ItemID == 8) {$Choice8 = "selected";} 

						if ($ItemID == 9) {$Choice9 = "selected";} 

						if ($ItemID == 10) {$Choice10 = "selected";} 

						if ($ItemID == 11) {$Choice11 = "selected";} 

						if ($ItemID == 12) {$Choice12 = "selected";} 

							

					?>

								<option <?= $Choice1 ?> value="1">Nokia N800</option>



								<option <?= $Choice2 ?> value="2">Nokia E62</option>



								<option <?= $Choice3 ?> value="3">Nokia 8801</option>



								<option <?= $Choice4 ?> value="4">Nokia 6265i</option>



								<option <?= $Choice5 ?> value="5">Motorola MotoRazar V3</option>



								<option <?= $Choice6 ?> value="6">Motorola MotoPEBL</option>



								<option <?= $Choice7 ?> value="7">Samsung SGH-a516</option>



								<option <?= $Choice8 ?> value="8">Samsung SGH-d606</option>



								<option <?= $Choice9 ?> value="9">Symbol MC50</option>



								<option <?= $Choice10 ?> value="10">Symbol MC70</option>



								<option <?= $Choice11 ?> value="11">Symbol PPT8800</option>



								<option <?= $Choice12 ?> value="12">TELUS BlackBerry 7130e</option>



					</select>



				</td>



			</tr>



			<tr>



				<td><b>Enter the title for your review:</b></td>



				<td><input maxLength=60 name="Subject" size=50 value="<?= $Subject ?>">*</td>



			</tr>



			<tr style="text-align:center">



				<td colspan=2><br /><b style="font-size:18px">Write your review:</b>



					<br /><font size="2">(You may enter up to 1000 characters.)<br /><br />



					<input readonly type="text" name="remLen" size=3 maxlength=4 value="1000">Characters left</font><br />



					<textarea name="Message" wrap="physical" cols=70 rows=13 onkeydown="textCounter(this.form.Message,this.form.remLen,1000);" onkeyup="textCounter(this.form.Message,this.form.remLen,1000);" ><?= $Message ?></textarea>



				</td>



			</tr>



			<tr style="height:9px; font-size:9px">



				<td colspan=2>



					<input type="hidden" name="PassCheck" value="Passed" />



				</td>



			</tr>



			<tr style="text-align:center">



				<td colspan=2>



					<input type="submit" value="Add" />



					<input type="reset" value="Reset" />



				</td>					



			</tr>



		</table>



	</form><br /><br />



	</div>



<!-- Footer -->



	<div id="footer">



		<? include("Includes/footer.php"); ?>



	</div>



</div>



</body>



</html>



