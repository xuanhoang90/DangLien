<?php
	/*******************************
	 *	Project: Dang Lien Library
	 *	Start: 12:00 12/11/2015
	 *	File: Init
	 *	Load all system file
	 *******************************/
	
	//check access
	if (!defined('ROOT_ACCESS')) {
		echo "Access denies!";exit;
	}
	
	//Config
	define("DB_HOST", "localhost");
	define("DB_USER", "root");
	define("DB_PASS", "");
	define("DB_NAME", "dl_lib");
	define("ROOT_DOMAIN","http://".$_SERVER[HTTP_HOST]);
	
	//Include system file:
	$sysFile = array(
		"sys/inc/db.inc.php",
		"sys/inc/user.inc.php",
		"sys/inc/book.inc.php",
		"sys/inc/html.inc.php",
		"sys/autoload.php",
	);
	foreach($sysFile as $file){
		if(file_exists($file)){
			require $file;
		}else{
			echo "System error!!!";exit;
		}
	}
?>