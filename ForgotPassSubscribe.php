<? session_start(); ?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



<html xmlns="http://www.w3.org/1999/xhtml">



<head>



<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />



<title>PHONE.CA - Forgot Password</title>



<link rel="stylesheet" type="text/css" href="CustomerService.css" />

<link rel="stylesheet" type="text/css" href="Cart.css" />

<script language="javascript">

	function lod()

	{

		document.ForgotPass.SarchUserName.focus();

		document.ForgotPass.SarchUserName.select();

	}

</script>

</head>



<body onLoad="lod()">

<form name="ForgotPass" action="ForgotPassSubscribe.php" method="post">



<!-- Main Website Holder -->



<div id="holder">



<!-- Top Side of the Website -->



	<div class="Top-Side">



		<? include("Includes/header.php"); ?>



		<h1>Forgot Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>



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

		echo "<center><H4>Subscriber Forgot Password Page</h4>";

		echo "</center>";

?>



<?

			$host = "humbermedia2.ca";

			$username = "humb2ca_d78t2";

			$password = "dare_to_dream_0708";

			$dbname="humb2ca_d";

			$table_name1 = "Syed_Gilani_STR_Subscribe";

				

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

				$PrevUser=$_POST['SarchUserName'];

        		$UsrName= $_POST['SarchUserName'];

   	         	$SecurityAns=$_POST['SecurityAns'];



				$sqlString2 = "Select * from $table_name1 where strUserName=\"$PrevUser\"";

				$result2 =@mysql_query($sqlString2, $dbh) or die ("Couldn't execute query1");

				$chkAns=mysql_fetch_array($result2);

				echo "<br />";

				

				if ($chkAns['strSecAnswer']==$SecurityAns)

				{

					$strTo=$chkAns['strEmail'];

					$strSub="Your Phone.ca User Password";

					$strFrom= "info@phone.ca";

			

					$MailBody = "UserName: " . $UsrName . "\n";

					$MailBody .= "\n Password: " . $chkAns['strPassword'] . "\n";

					$MailBody .= "\n We hope you will take care of your password in future \n\n";

					$MailBody .= "Regards,\n\n";

					$MailBody .= "Admin Incharge";

			

					mail($strTo, $strSub, $MailBody, $strFrom);

					echo ("Congratulations! Email sent Successfully <br />");

				} 

				else

				{

?>

					<font color="#FF0000" size="2">

<?				

					echo "Sorry! Wrong Answer. We cannot send you Password in Email.</font>";

				}



			}

?>         

		

        <br /><br />

        

		<center> 

			<fieldset>

            	<legend>Search</legend>

<?                

					$sqlString3 = "Select * from $table_name1";

					$result3 =@mysql_query($sqlString3, $dbh) or die ("Couldn't execute query1");

?>

					<table>

				    	<tr>

        	            	<td>Enter User Name:</td>

            	            <td><input type="text" name="SarchUserName" /></td>

                	     </tr>

	                </table>

    	      </fieldset>

			<fieldset>

                <legend>

                    Security Answer

                </legend>

                <table cellpadding="1" cellspacing="1">

                    <tr>

                      <td align="left"> </td> <td align="justify"> </td>

                    </tr>

                    <tr>

                      <td align="left">Security Answer </td> 

                      <td align="justify"> <input type="text" name="SecurityAns" size="25" maxlength="255" /></td>

                    </tr>

                    <tr>

                        <td height="24" align="left"><input type="hidden" name="SelectUser" value="<?=$UsrName?>" />

                                                <input type="hidden" name="PrevUser" value="<?=$UsrName?>" />

                                                <input type="hidden" name="PassCheck" value="Passed" />

                        </td>

                        <td align="justify"><br /> 	<input type="submit" value="Verify & Send E-mail" />

                                                	<input type="reset" value="Reset" />

                        </td>

                     </tr>

                </table>

			</fieldset>			

        </center>

		<br /><br /><br />

	</div>



<!-- Footer -->



	<div id="footer">

		<? include("Includes/footer.php"); ?>

	</div>



</div>

</body>

</html>