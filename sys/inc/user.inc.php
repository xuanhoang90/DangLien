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
					if($data['active_status'] == '0'){
						//chua kich hoat
						$GLOB->login_status = "Tai khoan chua kich hoat, vui long lien he admin";
						$out = new HtmlOutput();
						$out->Login();exit;
					}else{
						//ok
						$_SESSION['logined'] = true;
						$_SESSION['acc_type'] = $data['acc_type'];
						$_SESSION['member'] = $data['account'];
						$_SESSION['member_id'] = $data['id'];
						$_SESSION['member_svgv'] = $data['svgv'];
						if($data['acc_type'] == "1" || $data['acc_type'] == "2"){
							$out = new HtmlOutput();
							$out->AdminMainPage();exit;
						}
						if($data['acc_type'] == "3"){
							$out = new HtmlOutput();
							$out->Home();exit;
						}
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
		public function AddNewUser($userID = false, $userPwd = false, $userSvorgv = 'sinhvien'){
			global $DB;
			if($userID && $userPwd){
				//table user: acc_type: 1=supper admin, 2=smod, 3=user
				//truong hop nay: acc_type = 3
				$DB->query_insert("INSERT INTO member(account, password, acc_type, svgv) VALUES ('{$userID}', '{$userPwd}', '3', '{$userSvorgv}')");
			}
			return;
		}
		public function AddNewManager($userID = false, $userPwd = false, $userSvorgv = ''){
			global $DB;
			if($userID && $userPwd){
				//table user: acc_type: 1=supper admin, 2=smod, 3=user
				//truong hop nay: acc_type = 2
				$DB->query_insert("INSERT INTO member(account, password, acc_type, svgv, active_status) VALUES ('{$userID}', '{$userPwd}', '2', '{$userSvorgv}', '1')");
			}
			return;
		}
		public function RegisterProcess(){
			//lay gia tri
			//luc nay chi can lay 1 mat khau, vi js da xac thuc 2 mat khau giong nhau
			$userID = $_REQUEST['user_id'];
			$userPwd = md5($_REQUEST['user_pass']);
			$userSvorgv = $_REQUEST['user_svgv'];
			//de tranh viec ten dang nhap trung nhau, truoc khi them vao ta se kiem tra coi ten user da co chua
			if($this->CheckId($userID)){
				//neu chua co nguoi nao su dung ten dang nhap nay, cho phep dang ki
				//o day tam bo qua email di 
				$this->AddNewUser($userID, $userPwd, $userSvorgv);
				$out = new HtmlOutput();
				$out->UserRegisterSucess();exit;
			}else{
				//da ton tai ten dang nhap, bao loi~ va yeu cau dang ki voi ten khac
				$out = new HtmlOutput();
				$out->UserRegisterFalseID();exit;
			}
			return;
		}
		public function MemberUnactiveList(){
			global $DB, $GLOB;
			//lay thong tin so trang
			if(isset($_REQUEST['page_number'])){
				$page_num = intval($_REQUEST['page_number']);
			}else{
				$page_num = 1;
			}
			$itemperPage = 10;
			//glb
			$GLOB->obj_page_num = $page_num;
			//get max record
			//copy nguyen function list book va edit lai
			if($data = $DB->query("SELECT sum(status) FROM member WHERE active_status='0' AND acc_type='3' ")){
				$total = $data[0]['sum(status)'];
			}else{
				$total = 1;
			}
			$totalPage = ceil($total/$itemperPage);
			$GLOB->obj_page_total = $totalPage;
			$res = array();
			//Gioi han phan trang
			$start = ($page_num-1)*$itemperPage;
			$GLOB->TableStart = $start+1;
			$sql_add = " active_status='0' AND acc_type='3' LIMIT {$start}, {$itemperPage} ";
			//get data
			if($data = $DB->query("SELECT * FROM member WHERE {$sql_add}")){
				$res = $data;
			}else{
				$res = false;
			}
			return $res;
		}
		public function MemberList(){
			global $DB, $GLOB;
			//lay thong tin so trang
			if(isset($_REQUEST['page_number'])){
				$page_num = intval($_REQUEST['page_number']);
			}else{
				$page_num = 1;
			}
			$itemperPage = 10;
			//glb
			$GLOB->obj_page_num = $page_num;
			//get max record
			//copy nguyen function list book va edit lai
			if($data = $DB->query("SELECT sum(status) FROM member WHERE active_status='1' AND acc_type='3' ")){
				$total = $data[0]['sum(status)'];
			}else{
				$total = 1;
			}
			$totalPage = ceil($total/$itemperPage);
			$GLOB->obj_page_total = $totalPage;
			$res = array();
			//Gioi han phan trang
			$start = ($page_num-1)*$itemperPage;
			$GLOB->TableStart = $start+1;
			$sql_add = " active_status='1' AND acc_type='3' LIMIT {$start}, {$itemperPage} ";
			//get data
			if($data = $DB->query("SELECT * FROM member WHERE {$sql_add}")){
				$res = $data;
			}else{
				$res = false;
			}
			return $res;
		}
		public function MangerList(){
			global $DB, $GLOB;
			//lay thong tin so trang
			if(isset($_REQUEST['page_number'])){
				$page_num = intval($_REQUEST['page_number']);
			}else{
				$page_num = 1;
			}
			$itemperPage = 10;
			//glb
			$GLOB->obj_page_num = $page_num;
			//get max record
			//copy nguyen function list book va edit lai
			if($data = $DB->query("SELECT sum(status) FROM member WHERE active_status='1' AND acc_type='2' ")){
				$total = $data[0]['sum(status)'];
			}else{
				$total = 1;
			}
			$totalPage = ceil($total/$itemperPage);
			$GLOB->obj_page_total = $totalPage;
			$res = array();
			//Gioi han phan trang
			$start = ($page_num-1)*$itemperPage;
			$GLOB->TableStart = $start+1;
			$sql_add = " active_status='1' AND acc_type='2' LIMIT {$start}, {$itemperPage} ";
			//get data
			if($data = $DB->query("SELECT * FROM member WHERE {$sql_add}")){
				$res = $data;
			}else{
				$res = false;
			}
			return $res;
		}
		/**
		 *	Active user
		 */
		public function ActiveMemberProcess(){
			global $DB;
			//lay id user 
			if(isset($_REQUEST['user_id'])){
				//co id user
				//xoa
				if($data = $DB->query_insert("UPDATE member SET active_status='1' WHERE id='{$_REQUEST['user_id']}'")){
					return true;
					//kich hoat thanh cong
				}else{
					return false;
					//ko kich hoat dc
				}
			}else{
				//ko co id, spam, bao loi 
				return false;
			}
		}
		
		/**
		 *	Xoa user
		 */
		public function DeleteMemberProcess(){
			global $DB;
			//lay id user 
			if(isset($_REQUEST['user_id'])){
				//co id user
				//xoa
				if($data = $DB->query_insert("DELETE FROM member WHERE id='{$_REQUEST['user_id']}'")){
					return true;
					//xoa thanh cong
				}else{
					return false;
					//ko xoa dc
				}
			}else{
				//ko co id, spam, bao loi 
				return false;
			}
		}
		
		public function AddMangerProcess(){
			$userID = $_REQUEST['user_id'];
			$userPwd = md5($_REQUEST['user_pass']);
			//de tranh viec ten dang nhap trung nhau, truoc khi them vao ta se kiem tra coi ten user da co chua
			if($this->CheckId($userID)){
				//neu chua co nguoi nao su dung ten dang nhap nay, cho phep dang ki
				$this->AddNewManager($userID, $userPwd, "no");
				return true;
			}else{
				//da ton tai ten dang nhap, bao loi~ va yeu cau dang ki voi ten khac
				return false;
			}
			return false;
		}
		
		/**
		 *	Lay ten user
		 */
		public function GetUserName($id = false){
			global $DB;
			if($id){
				if($data = $DB->query("SELECT * FROM member WHERE id='{$id}' ")){
					return $data[0]['account'];
				}else{
					return false;
				}
			}else{
				return false;
			}
		}
		/**
		 *	Lay thong tin nguoi muon la sinh vien hay giang vien
		 */
		public function GetUserSVGV($id = false){
			global $DB;
			if($id){
				if($data = $DB->query("SELECT * FROM member WHERE id='{$id}' ")){
					if($data[0]['svgv'] == 'sinhvien'){
						return "Sinh vien";
					}else if($data[0]['svgv'] == 'giangvien'){
						return "Giang vien";
					}else{
						return "No info";
					}
				}else{
					return false;
				}
			}else{
				return false;
			}
		}
	}
?>