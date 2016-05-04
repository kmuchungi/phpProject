<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



<html xmlns="http://www.w3.org/1999/xhtml">



<head>



<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />



<title>PHONE.CA - Add Item</title>



<link rel="stylesheet" type="text/css" href="Add.css" />

<script language="javascript">

	function lod()

	{

		document.AddItem.Model.focus();

		document.AddItem.Model.select();

	}

</script>

</head>







<body onLoad="lod()">

<form name="AddItem" action="AddItem.php" method="post">





<!-- Main Website Holder -->



<div id="holder">



<!-- Top Side of the Website -->



	<div class="Top-Side">



		<? include("Includes/header.php"); ?>



		<h1>Admin</h1>



		<? include("Includes/Top-Links2.php"); ?>



	</div>



<!-- Top Navigation Bar -->



	<div id="Menu-Holder1">



		<? include("Includes/top-menu2.php"); ?>



	</div>



<!-- Content -->



	<div style="text-align:left; padding-left:320px; padding-top:50px">

<?

		echo "<h2>Add New Item</h2>";

		echo "<br />";



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

		$iCheck=0;	

		if ($_POST['PassCheck'] == "Passed")

		{

			$iCheck=1;

			$Brand=$_POST['Brand'];

			$Model= $_POST['Model'];

			$Price=$_POST['Price'];

			$Deal=$_POST['Deal'];

			$Category=$_POST['Category'];

			$DealPrice=$_POST['DealPrice'];

			$Active=$_POST['Active'];

			

			if($Active=="on")

			{

				$Act=1;

				$Acti="y";

			}

			else

			{

				$Act=0;

				$Acti="n";

			}

			

			if($Deal=="Yes")

			{

				$Del="y";

			}

			else

			{

				$Del="n";

			}

		

			if ($Model == "")

			{

				$error = $error . "Model field cannot be empty. <br />";

				$iCheck+=1;

			}

		

			if ($Price == "")

			{

				$error = $error . "Price field cannot be empty. <br />";

				$iCheck+=1;

			}

						

			if ($Deal=="Yes")

			{

				if ($DealPrice == "")

				{

					$error = $error . "Deal Price field cannot be empty. <br />";

					$iCheck+=1;

				}

			}

		

           	if ($iCheck>1)

           	{

?>

				<font size="2" color="#FF0000"> <?=$error?></font>



<?

   	        }

			else

			{

				if ($Del=="y")

				{

					$sqlString1 = "Insert into $table_name1(intItemID, strCategory, strItemName, curItemPrice, strItemCast, strImage, strDeal, curItemNewPrice, strActive) values('', '$Category', '$Model', $Price, '$Brand', '$Model', '$Del', $DealPrice, '$Acti')";

				}

				else

				{

					$sqlString1 = "Insert into $table_name1(intItemID, strCategory, strItemName, curItemPrice, strItemCast, strImage, strDeal, strActive) values('', '$Category', '$Model', $Price, '$Brand', '$Model', '$Del', '$Acti')";

				}

					$result1 =@mysql_query($sqlString1, $dbh) or die ("Couldn't execute query");	



					echo "<em>Congratulations! Record added successfully.</em><br /><br />";



					$iCheck=0;

					$Brand="";

					$Model=""; 

					$Price="";

					$Deal="";

					$Category="";

					$DealPrice="";

					$Active="";

					$Act=1;

					$Del="n";

			}

		}



?>    

		<table>

        	<tr>

            	<td align="left" width="130px">

                	Brand:

                </td>

                <td align="left">

                	<select name="Brand" />

<?						

						if ($Brand=="Nokia" || $iCheck==0)

						{

?>

	                    	<option selected="selected" value="Nokia">Nokia</option>

<?						}

						else

						{

?>

							<option value="Nokia">Nokia</option>

<?

						}

						if ($Brand=="Symbol")

						{

?>

	                        <option selected="selected" value="Symbol">Symbol</option>

<?						}

						else

						{

?>

	                        <option value="Symbol">Symbol</option>

<?

						}

						if ($Brand=="Telus")

						{

?>

	                        <option selected="selected" value="Telus">Telus</option>

<?						}

						else

						{

?>

	                        <option value="Telus">Telus</option>

<?

						}

						if ($Brand=="Motorola")

						{

?>

	                        <option selected="selected" value="Motorola">Motorola</option>

<?						}

						else

						{

?>

	                        <option value="Motorla">Motorola</option>

<?

						}

						if ($Brand=="Samsung")

						{

?>

	                        <option selected="selected" value="Samsung">Samsung</option>

<?						}

						else

						{

?>

	                        <option value="Samsung">Samsung</option>

<?

						}

?>

                    </select>



                </td>

            </tr>

            <tr>

            	<td align="left">

                	Model:

                </td>

                <td align="left">

                	<input type="text" name="Model" value="<?=$Model?>" />

                </td>

            </tr>

        	<tr>

            	<td align="left">

                	Price:

                </td>

                <td align="left">

                	<input type="text" name="Price" value="<?=$Price?>" />

                </td>

            </tr>

        	<tr>

            	<td align="left">

                	Category:

                </td>

                <td align="left">

                	<select name="Category">

<?

						if ($Category=="Cell" || iCheck==0)

						{

?>

	                    	<option selected="selected" value="Cell">Cell</option>

    	                    <option value="PDA">PDA</option>

<?						}

						else

						{

?>

	                    	<option value="Cell">Cell</option>

    	                    <option selected="selected" value="PDA">PDA</option>

<?

						}

?>

                    </select>

                </td>

            </tr>          

            <tr>

            	<td align="left">

                	Deal:

                </td>

                <td align="left">

<?

						if ($Deal=="Yes")

						{

?>

		                	<input type="radio" name="Deal" checked="checked" value="Yes">Yes</input>

        		            <input type="radio" name="Deal" value="No">No</input>



<?						}

						else

						{

?>

		                	<input type="radio" name="Deal" value="Yes">Yes</input>

        		            <input type="radio" name="Deal" checked="checked" value="No">No</input>

<?

						}

?>

                </td>                

            </tr>        

            <tr>

            	<td align="left">

                	Deal Price:

                </td>

                <td align="left">

                	<input type="text" name="DealPrice" value="<?=$DealPrice?>" />

                </td>                

            </tr>

            <tr>

            	<td height="10"></td>

            </tr>        

            <tr>

            	<td align="left">

<?                

                	if ($Act==1 || $iCheck==0)

                  	{

?>

	                	<input type="checkbox" name="Active" checked="checked">Active</input>

<?

                    }

                    else

                    {

?>

                    	<input type="checkbox" name="Active">Active</input>

<?

                    }

 ?>

                </td>

            </tr>

            <tr>

            	<td height="20"></td>

            </tr>        

            <tr>

            	<td>

                	<input type="hidden" name="PassCheck" value="Passed" />

                </td>

            	<td align="left">

                	<input type="submit" value="Add Item" />

                    <input type="reset" value="Reset" />

                </td>

            </tr>

        </table><br /><br /><br /><br />

	</div>



<!-- Footer -->



	<div id="footer">



		<? include("Includes/footer.php"); ?>



	</div>



</div>

</form>

</body>



</html>



