<?php 
	/*******************************
	 *	Project: Dang Lien Library
	 *	Start: 12:00 12/11/2015
	 *******************************/
	
	//check access
	if (!defined('ROOT_ACCESS')) {
		echo "Access denies!";exit;
	}
	
	/******************************
	 *	Database
	 ******************************/
	$DB = new DBClass();
	class DBClass{
		public function __construct(){
			mysql_connect(DB_HOST, DB_USER, DB_PASS);
			mysql_select_db(DB_NAME);
			return;
		}
		public function query($query){
			global $GLOB;
			$request = mysql_query($query);
			$result = mysql_fetch_array($request);
			if(sizeof($result)){
				return $result;
			}else{
				return false;
			}
		}
	}
?>