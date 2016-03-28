<?php 
function openDB()
{ 
	$link = mysql_connect('mcbitlabcom.fatcowmysql.com', 'mcmead', '123db4mc'); 
		if (!$link) 
		{ 
			die('Could not connect: ' . mysql_error()); 
		} 
	echo 'Connected successfully'; 
	mysql_select_db(mcmeaddb);
} 
?>