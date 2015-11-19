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
				$data = $data[0];
				if($userPwd == $data['password']){
					$_SESSION['logined'] = true;
					$_SESSION['acc_type'] = $data['acc_type'];
					$_SESSION['member'] = $data['account'];
					$_SESSION['member_id'] = $data['id'];
					if($data['acc_type'] == "1" || $data['acc_type'] == "2"){
						$out = new HtmlOutput();
						$out->AdminMainPage();exit;
					}
					if($data['acc_type'] == "3"){
						$out = new HtmlOutput();
						$out->Home();exit;
					}
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
		public function CheckId($id = false){
			global $DB;
			if($id){
				if($data = $DB->query("SELECT * FROM member WHERE account='{$id}'")){
					return false;
				}else{
					return true;
				}
			}else{
				return false;
			}
		}
		public function AddNewUser($userID = false, $userPwd = false){
			global $DB;
			if($userID && $userPwd){
				//table user: acc_type: 1=supper admin, 2=smod, 3=user
				//truong hop nay: acc_type = 3
				$DB->query_insert("INSERT INTO member(account, password, acc_type) VALUES ('{$userID}', '{$userPwd}', '3')");
			}
			return;
		}
		public function RegisterProcess(){
			//lay gia tri
			//luc nay chi can lay 1 mat khau, vi js da xac thuc 2 mat khau giong nhau
			$userID = $_REQUEST['user_id'];
			$userPwd = md5($_REQUEST['user_pass']);
			//de tranh viec ten dang nhap trung nhau, truoc khi them vao ta se kiem tra coi ten user da co chua
			if($this->CheckId($userID)){
				//neu chua co nguoi nao su dung ten dang nhap nay, cho phep dang ki
				//o day tam bo qua email di 
				$this->AddNewUser($userID, $userPwd);
				$out = new HtmlOutput();
				$out->UserRegisterSucess();exit;
			}else{
				//da ton tai ten dang nhap, bao loi~ va yeu cau dang ki voi ten khac
				$out = new HtmlOutput();
				$out->UserRegisterFalseID();exit;
			}
			return;
		}
	}
?>