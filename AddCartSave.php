<html>
<head>
<script language="javascript">
	function goback()
	{
		location.href = "AddCart.asp?press=pressed";
	}
</script>
</head>

<body>
<?
/*		$QUANTITY = 4;

		for ($n=0; $n<=20; $n++)
		{
			$_SESSION['cart'][$QUANTITY][$n] = $_REQUEST['$n'];
		}*/
		session_unset();
?>

<script language="javascript">
	goback()
</script>


</body>
</html>

