<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>PHONE.CA - Email a friend</title>

<link rel="stylesheet" type="text/css" href="CustomerService.css" />

<script language="javascript">

	function lod()

	{

		document.Subscribe.UserName.focus();

		document.Subscribe.UserName.select();

	}

</script>

</head>



<body onLoad="lod()">

<!-- Main Website Holder -->

<div id="holder">

<!-- Top Side of the Website -->

	<div class="Top-Side">

		<? include("Includes/header.php"); ?>

		<h1>Email a friend&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>

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

		$pattrnEmail = "(^[\w\.-]+(\+[\w-]*)?@([\w-]+\.)+[\w-]+$)";

			

		$host = "humbermedia2.ca";

		$username = "humb2ca_d78t2";

		$password = "dare_to_dream_0708";

		$dbname="humb2ca_d";

		$table_name1 = "Syed_Gilani_STR_Item";

				

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



		$ItemID = $_REQUEST['txtHiddenIntItemID'];

					

		$sqlString1 = "select * from $table_name1 where intItemID = '$ItemID'";

		$result1 = @mysql_query($sqlString1, $dbh) or die ("Couldn't execute query");

		$Obtain = mysql_fetch_array($result1);

		

		if ($_POST['PassCheck'] == "Passed")

		{

			$iCheck=1;

       		$Name = stripslashes($_POST['Name']);

	        $Email = stripslashes($_POST['Email']);

			$FriendName = stripslashes($_POST['FriendName']);

			$FriendEmail = stripslashes($_POST['FriendEmail']);

			$Subject = stripslashes($_POST['Subject']);

			$Message = stripslashes($_POST['Message']);

			$Website = "www.humbermedia2.ca/portfolio0708/syed_gilani/php/Products/Phone/index.php";



         

			if ($Name == "" || $Email == "" || $FriendName == "" || $FriendEmail == "" || $Subject == "" || $Message == "") 

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

				if (preg_match($pattrnEmail, $Email)){}

				else

				{

					$error = $error . "Your E-mail is NOT a valid E-mail.<br />";

				}

				if (preg_match($pattern1, $FriendName)){}

				else

				{

					$error = $error . "Your friend Name is NOT a valid Name.<br />";

				}

				if (preg_match($pattrnEmail, $FriendEmail)){}

				else

				{

					$error = $error . "Your friend E-mail is NOT a valid E-mail.<br />";

				}

			}

		}

?>

  <br />

        	

<?

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

					$mail_to = "$FriendEmail";

					$mail_subject = "$Subject";

					$mail_body = "<a href=\"$Website\"><img src=\"http://www.humbermedia2.ca/portfolio0708/syed_gilani/php/Products/Phone/Images/Email-Header.jpg\"></a>";

					$mail_body .= "<br /><br />" . "$FriendName" . ", " . "$Name" . " recommend you to visit this page at Phone.ca: ";

					$mail_body .= "<a href=\"" . $_POST['Link'] . "\">" . "Click here to open the link" . "</a>";

					$mail_body .= "<br /><br /><hr /><br /><b>His message:</b><br />" . "$Message" . "<br /><br /><hr />";

					$mail_body .= "<br />This page was sent from Phone.ca Website. Your email address has not been kept by us or recorded by our site.<br />";

					$mail_headers = "From:$Email\nContent-Type:text/html; charset=iso-8859-1";

									

					mail($mail_to, $mail_subject, $mail_body, $mail_headers);

	

					echo "<em>Congratulations! Your mail was sent to your friend.</em>";

					





?>

						<script language="javascript">

                        	lod();

                        </script>



<?

				}

			}

?> 

	<form name="EmailFriend" action="EmailFriend.php" method="post" style="text-align:left; width:600px">	

	<input type="hidden" name="Link" value="<?= $_SERVER['HTTP_REFERER'] ?>">

		<table>

			<tr>

				<td colspan="2" style="background-color:#CCCCCC; font-size:24px"><? echo $Obtain['strItemCast'] . " " . $Obtain['strItemName'] . " " . $Obtain['strCategory'];?></td>

			</tr>

			<tr>

				<td colspan="2"><br />

					<span class="style2"><font size="2">Want to tell a friend about <? echo $Obtain['strItemCast'] . " " . $Obtain['strItemName'] . " " . $Obtain['strCategory'];?>? It's easy. Just enter the information requested below, click "send", and your message will be on its way. We'll only use the email addresses provided below, to send your message to your friend.</font></span><br />

				</td>

			</tr>

			<tr>

				<td><b>Your First Name:</b></td>

				<td><input type=text name="Name" value="<?= $Name ?>">*</td>

			</tr>

			<tr>

				<td><b>Your Email Address:</b></td>

				<td><input type=text name="Email" value="<?= $Email ?>">*</td>

			</tr>

			<tr>

				<td><b>Your Friend's Name:</b></td>

				<td><input type=text name="FriendName" value="<?= $FriendName ?>">*</td>

			</tr>

			<tr>

				<td><b>Your Friend's Email Address:</b></td>

				<td><input type=text name="FriendEmail" value="<?= $FriendEmail ?>">*</td>

			</tr>

			<tr>

				<td><b>E-mail subject:</b></td>

				<td><input maxLength=60 name="Subject" size=50 value="<?= $Subject ?>">*</td>

			</tr>

			<tr>

				<td colspan=2 align=center><br /><b>Enter a personal message:</b>

					<br /><span class="style2"><font size="2">Just erase what's in the box below and type in the text you want to send. Or, feel free to use the one we wrote.</font></span>

					<textarea cols=50 name="Message" rows=7>Thought you might be interested on this phone from Phone.ca.</textarea></td>

			</tr>

			<tr>

		        <td height="24" align="left">

					<input type="hidden" name="PassCheck" value="Passed" />

				</td> 

	        	<td><br /> 	

					<input type="submit" value="Send it to a friend" />

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

