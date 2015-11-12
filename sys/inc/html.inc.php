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
	 *	HTML OUTPUT
	 ******************************/
	
	class HtmlOutput{
		public function __construct(){
			return true;
		}
		//Test function
		public function test(){
			global $GLOB;
			$GLOB->vars['page_title'] = "Test";
			include "public/html/header.php";
			include "public/html/footer.php";
			return true;
		}
	}
?>