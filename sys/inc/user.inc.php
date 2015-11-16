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
	 *	User
	 ******************************/
	$USER =  new Member();
	class Member{
		public function __construct(){
			return true;
		}
		public function LoginProcess(){
			global $DB, $GLOB;
			if(isset($_REQUEST['user_id']) && $_REQUEST['user_id'] != "" && isset($_REQUEST['user_pass']) && $_REQUEST['user_pass'] != ""){
				$userID = $_REQUEST['user_id'];
				$userPwd = md5($_REQUEST['user_pass']);
			}else{
				$out = new HtmlOutput();
				$out->Login();exit;
			}
			if($data = $DB->query("SELECT * FROM member WHERE account='{$userID}'")){
				if($userPwd == $data['password']){
					$_SESSION['logined'] = true;
					$_SESSION['acc_type'] = $data['acc_type'];
					$_SESSION['member'] = $data['account'];
					$out = new HtmlOutput();
					$out->Home();exit;
				}else{
					$GLOB->login_status = "Wrong password";
					$out = new HtmlOutput();
					$out->Login();exit;
				}
			}else{
				$GLOB->login_status = "{$userID}: Account not found";
				$out = new HtmlOutput();
				$out->Login();exit;
			}
			return;
		}
		public function Register(){
			return;
		}
	}
?>