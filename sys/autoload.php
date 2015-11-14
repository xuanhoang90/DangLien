<?php
	/*******************************
	 *	Project: Dang Lien Library
	 *	Start: 12:00 12/11/2015
	 *	File: Autoload
	 *	Remote all request
	 *******************************/
	
	//check access
	if (!defined('ROOT_ACCESS')) {
		echo "Access denies!";exit;
	}
	//test output
	$out = new HtmlOutput();
	$out->test();exit;
?>