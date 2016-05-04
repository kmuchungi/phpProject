<?
	function db_connect()
	{
		include("connect.php");
	
		if($dbh=mysql_connect($host, $username, $password)){}
		else
		{
			die ('<hr /> I cannot connect to mysql because: ' . mysql_error());
		}
	
		if ($dbconn=@mysql_select_db($dbname, $dbh)){}
		else
		{
			die ('<hr />I cannot connect to database because:'.mysql_error());
		}
		return $dbh;
	}
?>
