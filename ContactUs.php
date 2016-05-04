<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript">
	function lod()
	{
		document.Contact.txtEmail.focus();
		document.Contact.txtEmail.select();
	}
</script>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>PHONE.CA - Contact Us</title>

<link rel="stylesheet" type="text/css" href="CustomerService.css" />

</head>

<body onload="lod()">

<!-- Main Website Holder -->

<div id="holder">

<!-- Top Side of the Website -->

	<div class="Top-Side">	

		<? include("Includes/header.php"); ?>

		<h1>Contact Us&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>

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
			$press=$_POST['press'];
			if ($press==1)
			{
				$Email=$_POST['txtEmail'];
				$Subject=$_POST['txtSubject'];
				$msg=$_POST['txtMessage'];
				$intValid=0;
	 
				if ($Email =="" || $Subject =="" || $msg =="")
				{
					echo "<font size=\"2\" color=\"Red\">The fields with * are necessary to enter in.</font>";
					$intValid=1;
				}
				else
				{
					$pattrnEmail = "(^[\w\.-]+(\+[\w-]*)?@([\w-]+\.)+[\w-]+$)";
					if (preg_match($pattrnEmail, $Email)){}
					else
					{
						$intValid=1;
						echo "<font size=\"2\" color=\"Red\">The Email address is not in proper format.</font>";
					}
				}
			 

				if ($intValid==0)
				{
						$mail_CompanyTo="rizwangilani1@yahoo.com";
						$mail_sub=$Subject;
						$mail_body=$msg . " From: " . $Email;
						$MailHeaders="From:info@Phone.ca\nContent-Type: text/html; charset=iso-8859-1";
		
						mail("rizwangilani1@yahoo.com", $mail_sub, $mail_body, $MailHeaders);
						mail($Email, $mail_sub, $mail_body, $MailHeaders);
					
						echo "<font size=\"2\" color=\"Red\">We have received your request or query and we will reply back in shortest possible time. Confirmation Email has been sent on your email address.</font>";
				}
			}
			
	       	echo "<h2>Contact Us</h2>";
           
	        echo "<form name=\"Contact\" action=\"ContactUs.php\" method=\"post\">";
            echo "<table style=\"width:700px; padding:20px\">";
            echo "<tr valign=\"top\">";
            echo "<td width=\"120\"><b>E-mail:</b></td>";
            echo "<td width=\"310\"><input type=\"text\" name=\"txtEmail\" maxlength=\"100\" size=\"50\" width=\"25\" value=\"$Email\" />";
            echo "<font color=\"Red\">*</font></td>";
            echo "</tr>";
            echo "<tr valign=\"top\">";
            echo "<td><b>Subject:</b></td>";
            echo "<td><input type=\"text\" name=\"txtSubject\" size=\"50\" maxlength=\"100\" width=\"25\" value=\"$Subject\" />";
            echo "<font color=\"Red\">*</font></td>";
			echo "</tr>";
            echo "<tr valign=\"top\">";
            echo "<td><b>Message:</b></td>";
            echo "<td><textarea name=\"txtMessage\" rows=\"5\" cols=\"38\ value=\"$msg\"></textarea>";
            echo "<font color=\"Red\">*</font></td>";
            echo "</tr>";
            echo "<tr><td height=\"30\"></td></tr><tr>";
            echo "<td><input type=\"hidden\" name=\"press\" value=\"1\"></td>";
            echo "<td><input type=\"submit\" value=\"Send Message\" /><input type=\"reset\" value=\"Reset\" /></td>";
            echo "<td>&nbsp;</td>";
            echo "</tr>";
            echo "</table>";
         	echo "</form><br /><br /><br /><br />";
?>
	</div>

<!-- Footer -->

	<div id="footer">

		<? include("Includes/footer.php"); ?>

	</div>

</div>

</body>

</html>