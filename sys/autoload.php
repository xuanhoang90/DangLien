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
	
	$Autorun = new Autorun();
	
	//switch
	class Autorun{
		public function __construct(){
			//check request
			switch($_REQUEST['site']){
				case 'home':
					$this->HomePage();
					break;
				case 'user':
					$this->User();
					break;
				case 'book':
				case 'admin':
					$this->Admin();
					break;
				default:
					$this->HomePage();
					break;
			}
			return;
		}
		public function HomePage(){
			$out = new HtmlOutput();
			$out->Home();exit;
			return;
		}
		public function Admin(){
			if(isset($_SESSION['logined'])){
			
			}else{
				$out = new HtmlOutput();
				$out->Login();exit;
				return;
			}
		}
		public function User(){
			global $USER;
			switch($_REQUEST['action']){
				case 'login':
					$out = new HtmlOutput();
					$out->Login();exit;
					break;
				case 'register':
					$out = new HtmlOutput();
					$out->Register();exit;
					break;
				case 'login_process':
					$USER->LoginProcess();
					break;
				default:
					$this->HomePage();
					break;
			}
		}
	}
?>