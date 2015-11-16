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
				if(isset($_REQUEST['view'])){
					switch($_REQUEST['view']){
						case 'book':
							$this->Book();
							break;
						default:
							$out = new HtmlOutput();
							$out->AdminMainPage();exit;
							break;
					}
				}else{
					$out = new HtmlOutput();
					$out->AdminMainPage();exit;
					return;
				}
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
				case 'logout':
					session_destroy();
					header("Location: ".ROOT_DOMAIN);exit;
					break;
				default:
					$this->HomePage();
					break;
			}
		}
		public function Book(){
			if(isset($_REQUEST['action'])){
				switch($_REQUEST['action']){
					case 'list_book':
						$out = new HtmlOutput();
						$out->AdminListBook();exit;
						break;
					case 'add_book':
						$out = new HtmlOutput();
						$out->AdminAddBook();exit;
						break;
					case 'list_book_cat':
						$out = new HtmlOutput();
						$out->AdminListBookCategory();exit;
						break;
					case 'add_book_cat':
						$out = new HtmlOutput();
						$out->AdminAddBookCategory();exit;
						break;
					default:
						$out = new HtmlOutput();
						$out->AdminListBookCategory();exit;
						break;
				}
			}else{
				$out = new HtmlOutput();
				$out->AdminListBook();exit;
			}
		}
	}
?>