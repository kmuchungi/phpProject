<?
	$host = "humbermedia2.ca";
	$username = "humb2ca_d78t2";
	$password = "dare_to_dream_0708";
		
	$db_name = "humb2ca_d";
		
	if($dbh=@mysql_connect($host, $username, $password))
	{}
	else
	{
		die('<hr>You cannot connect to mysql because:' . mysql_error());
	}
	
	if($dbconn=@mysql_select_db($db_name, $dbh))
	{}
	else
	{
		die('<hr>You cannot connect to database because:' . mysql_error());
	}
?>