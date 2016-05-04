<?php

	echo "<br /><br />";

// ------------------------------- AD ROTATOR --------------------------------------

	$Ad[1] = '<a href="http://www.amazon.ca"><img src="Images/Ad-1.jpg" width="140" height="391" border="0" alt="Amazon Ad"></a>';

	$Ad[2] = '<a href="http://media.monster.ca/goodlife/"><img src="Images/Ad-2.jpg" width="140" height="391" border="0" alt="GoodLife Fitness Ad"></a>';

	$Ad[3] = '<a href="http://franchise.monster.ca/"><img src="Images/Ad-3.jpg" width="140" height="391" border="0" alt="Monster Ad"></a>';

	$Ad[4] = '<a href="http://mapleleafs.nhl.com/leafstv/index.htm"><img src="Images/Ad-4.jpg" width="140" height="391" border="0" alt="Leafs TV Ad"></a>';

	$adCount = count($Ad);

	$randomAdNumber = mt_rand(1, $adCount);

	echo $Ad[$randomAdNumber];

	

	echo "<br /><br /><br />";



?>

