<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



<html xmlns="http://www.w3.org/1999/xhtml">



<head>



<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />



<title>PHONE.CA - Modify Item</title>



<link rel="stylesheet" type="text/css" href="Add.css" />

<script language="javascript">

	function lod()

	{

		document.ModifyItem.Model.focus();

		document.ModifyItem.Model.select();

	}

</script>



<script language="javascript">



	function Redrct(SelectModel)



	{



		location.href="ModifyItem.php?SelectModel=" + SelectModel;



	}



</script>



</head>







<body onLoad="lod()">

<form name="ModifyItem" action="ModifyItem.php" method="post">





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



	<div id="Content">

<?

		echo "<center>";

		echo "<h3>Modify Item</h3>";

		echo "</center><br />";



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

			$OrgModel= $_POST['SarchModel'];

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

					$sqlString1 = "Update $table_name1 set strCategory=\"$Category\", strItemName=\"$Model\", curItemPrice=$Price, strItemCast=\"$Brand\", strImage=\"$Model\", strDeal=\"$Del\", curItemNewPrice=$DealPrice, strActive=\"$Acti\" where strItemName=\"$OrgModel\" ";

				}

				else

				{

					$sqlString1 = "Update $table_name1 set strCategory=\"$Category\", strItemName=\"$Model\", curItemPrice=$Price, strItemCast=\"$Brand\", strImage=\"$Model\", strDeal=\"$Del\", strActive=\"$Acti\" where strItemName=\"$OrgModel\" ";

				}

				$result1 =@mysql_query($sqlString1, $dbh) or die ("Couldn't execute query");	



				echo "<em>Congratulations! Record added successfully.</em><br /><br />";



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

		<center> 

			<fieldset>

            	<legend>Search</legend>

<?                

					$sqlString3 = "Select * from $table_name1";

					$result3 =@mysql_query($sqlString3, $dbh) or die ("Couldn't execute query1");

?>

				<table>

			    <tr><td>Select Model:</td><td>

                <select name="SarchModel" onchange="Redrct(this.value)">

<?

					if ($_REQUEST['SelectModel']=="")

					{

?>

                		<option selected="selected" value="">Select ... </option>

<?

					}

					else

					{

?>

                		<option value="">Select ... </option>

<?

					}

                    while($lstUsrName=@mysql_fetch_array($result3))

		            {	

	                    if ($lstUsrName['strItemName'] == $_REQUEST['SelectModel'])

                        {

							if ($_POST['PassCheck'] != "Passed")

							{

								$Model=$_REQUEST['SelectModel']; 

								$Brand=$lstUsrName['strItemCast'];

								$Price=$lstUsrName['curItemPrice'];

								$Deal=$lstUsrName['strDeal'];

								$Category=$lstUsrName['strCategory'];

								$DealPrice=$lstUsrName['curItemNewPrice'];

								$Active=$lstUsrName['strActive'];

								

								if($Active=="y" || $Active=="Y")

								{

									$Act=1;

									$Acti="y";

								}

								else

								{

									$Act=0;

									$Acti="n";

								}

								

								if($Deal=="Y" || $Deal=="y")

								{

									$Del="y";

									$Deal="Yes";

								}

								else

								{

									$Del="n";

									$Deal="No";

								}

							}

?>

	                		<option selected="selected" value="<?=$_REQUEST['SelectModel']?>"><?=$_REQUEST['SelectModel']?></option>

<?

						}

						else

						{

?>	

    	            		<option value="<?=$lstUsrName['strItemName']?>"><?=$lstUsrName['strItemName']?></option>

<?

						}	

					}

					

?>

                </select>



                </td>

                </table>

            </fieldset>

            <fieldset>

            <legend> Details </legend>

    

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

						if ($Category=="Cell")

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

                	<input type="submit" value="Modify Item" />

                    <input type="reset" value="Reset" />

                </td>

            </tr>

        </table>

      </fieldset>

	</div>



<!-- Footer -->



	<div id="footer">



		<? include("Includes/footer.php"); ?>



	</div>



</div>

</form>

</body>



</html>