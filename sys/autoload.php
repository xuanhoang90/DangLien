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
				//kiem tra phan nhanh 1: site
				//sau do lua chon doi tuong dc truy van va di den function xu ly
				//khi sang cac function tuong ung cua doi tuong -> xet tiep phan nhanh 2 la action
				//tuy vao action se load tiep function de xu ly van de`
				//e hieu roi a  
				case 'home':
					$this->HomePage();
					break;
				case 'user':
					$this->User();
					break;
				case 'book':
					$this->BookFront();
					break;
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
			switch($_REQUEST['action']){
				case 'search':
					$out = new HtmlOutput();
					$out->Search();exit;
					break;
				default:
					$out = new HtmlOutput();
					$out->Home();exit;
					break;
			}
			return;
		}
		public function Admin(){
			if(isset($_SESSION['logined'])){
				if($_SESSION['acc_type'] == '1' || $_SESSION['acc_type'] == '2'){
					if(isset($_REQUEST['view'])){
						switch($_REQUEST['view']){
							case 'book':
								$this->BookManager();
								break;
							case 'member':
								$this->MemberManager();
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
					$out->HackerGetOut();exit;
					return;
				}
			}else{
				$out = new HtmlOutput();
				$out->Login();exit;
				return;
			}
		}
		public function BookFront(){
			global $BOOK;
			switch($_REQUEST['action']){
				case 'borrow_book':
					if(isset($_SESSION['logined'])){
						//thue sach 
						$res = array();
						//check max value
						if($BOOK->UserMaxValue()){
							$res = array("status"=>'false', "stt" => "Ban da thue voi so luong toi da, khong the thue them!");
							echo json_encode($res);exit;
						};
						if($BOOK->BorrowBook()){
							$res = array("status"=>'success', "stt" => "Thanh cong, vui long cho nguoi quan tri xac nhan!");
						}else{
							$res = array("status"=>'false', "stt" => "Chua thue duoc, thu lai coi");
						}
						echo json_encode($res);exit;
					}else{
						$res = array();
						$res = array("status"=>'false', "stt" => "Dang nhap chua ma doi muon");
						echo json_encode($res);exit;
					}
					break;
				case 'borrow_book_reject':
					if(isset($_SESSION['logined'])){
						//bo thue sach 
						$res = array();
						if($BOOK->BorrowBookReject()){
							$res = array("status"=>'success', "stt" => "Thanh cong!");
						}else{
							$res = array("status"=>'false', "stt" => "Da xay ra loi, Vui long thu lai sau");
						}
						echo json_encode($res);exit;
					}else{
						$res = array();
						$res = array("status"=>'false', "stt" => "Vui long dang nhap");
						echo json_encode($res);exit;
					}
					break;
				default:
					$this->HomePage();
					break;
			}
		}
		public function User(){
			global $USER;
			switch($_REQUEST['action']){
				case 'login':
					if(isset($_SESSION['logined'])){
						$this->HomePage();
					}else{
						$out = new HtmlOutput();
						$out->Login();exit;
					}
					break;
				case 'borrowlist':
					if(isset($_SESSION['logined'])){
						$out = new HtmlOutput();
						$out->UserBorrowList();exit;
					}else{
						$out = new HtmlOutput();
						$out->Login();exit;
					}
					break;
				case 'info':
					if(isset($_SESSION['logined'])){
						$out = new HtmlOutput();
						$out->UserInformation();exit;
					}else{
						$out = new HtmlOutput();
						$out->Login();exit;
					}
					break;
				case 'change_password':
					if(isset($_SESSION['logined'])){
						$out = new HtmlOutput();
						$out->UserChangePassword();exit;
					}else{
						$out = new HtmlOutput();
						$out->Login();exit;
					}
					break;
				case 'change_password_process':
					if(isset($_SESSION['logined'])){
						if($USER->UserChangePasswordProcess()){
							$out = new HtmlOutput();
							$out->UserChangePassword('<i class="fa fa-check"></i> Doi mat khau thanh cong');exit;
						}else{
							$out = new HtmlOutput();
							$out->UserChangePassword('<i class="fa fa-exclamation-circle"></i> Doi mat khau that bai');exit;
						}
					}else{
						$out = new HtmlOutput();
						$out->Login();exit;
					}
					break;
				case 'update_info':
					if(isset($_SESSION['logined'])){
						if($USER->InformationUpdate()){
							$out = new HtmlOutput();
							$out->UserInformation('<i class="fa fa-check"></i> Cap nhat thong tin thanh cong');exit;
						}else{
							$out = new HtmlOutput();
							$out->UserInformation('<i class="fa fa-exclamation-circle"></i> Cap nhat thong tin that bai, vui long thu lai');exit;
						}
					}else{
						$out = new HtmlOutput();
						$out->Login();exit;
					}
					break;
				case 'register':
					if(isset($_SESSION['logined'])){
						$this->HomePage();
					}else{
						$out = new HtmlOutput();
						$out->Register();exit;
					}
					break;
				case 'register_process':
					if(isset($_SESSION['logined'])){
						$this->HomePage();
					}else{
						$USER->RegisterProcess();
					}
					break;
				case 'forget_pass':
					if(isset($_SESSION['logined'])){
						$this->HomePage();
					}else{
						$out = new HtmlOutput();
						$out->FogetPassword();exit;
					}
					break;
				case 'login_process':
					if(isset($_SESSION['logined'])){
						$this->HomePage();
					}else{
						$USER->LoginProcess();
					}
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
		public function MemberManager(){
			global $USER;
			if(isset($_REQUEST['action'])){
				switch($_REQUEST['action']){
					case 'list_user':
						//hien thi danh sach user
						$out = new HtmlOutput();
						$out->AdminListMember();exit;
						break;
					case 'unactive_user':
						//danh sach user chua kich hoat
						$out = new HtmlOutput();
						$out->AdminListMemberUnactive();exit;
						break;
					case 'unactive_user_active':
						$res = array();
						if($USER->ActiveMemberProcess()){
							$res = array("status"=>'success');
						}else{
							$res = array("status"=>'false');
						}
						echo json_encode($res);exit;
						break;
					case 'delete_user':
						$res = array();
						if($USER->DeleteMemberProcess()){
							$res = array("status"=>'success');
						}else{
							$res = array("status"=>'false');
						}
						echo json_encode($res);exit;
						break;
					case 'add_manager':
						//check admin 
						if($_SESSION['acc_type'] == '1'){
							$out = new HtmlOutput();
							$out->AdminAddManager();exit;
						}else{
							$out = new HtmlOutput();
							$out->HackerGetOut();exit;
						}
						break;
					case 'addmember_process':
						//check admin 
						if($_SESSION['acc_type'] == '1'){
							$out = new HtmlOutput();
							if($USER->AddMangerProcess()){
								$out->AddMangerProcessStatus("Thanh cong");exit;
							}else{
								$out->AddMangerProcessStatus("That bai, vui long lam lai!");exit;
							}
						}else{
							$out = new HtmlOutput();
							$out->HackerGetOut();exit;
						}
						break;
					case 'list_manager':
						//hien thi danh sach quan tri vien
						//check admin 
						if($_SESSION['acc_type'] == '1'){
							$out = new HtmlOutput();
							$out->AdminListManger();exit;
						}else{
							$out = new HtmlOutput();
							$out->HackerGetOut();exit;
						}
						break;
					default:
						$out = new HtmlOutput();
						$out->AdminListMember();exit;
						break;
				}
			}else{
				$out = new HtmlOutput();
				$out->AdminListMember();exit;
			}
		}
		public function BookManager(){
			global $BOOK;
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
					case 'delete_book':
						$res = array();
						if($BOOK->DeleteBookProcess()){
							$res = array("status"=>'success');
						}else{
							$res = array("status"=>'false');
						}
						echo json_encode($res);exit;
						break;
					case 'edit_book':
						$out = new HtmlOutput();
						$out->AdminEditBook();exit;
						break;
					case 'addbook_process':
						if($BOOK->AddBookProcess()){
							$out = new HtmlOutput();
							$out->AdminAddBookSuccess();exit;
						}else{
							$out = new HtmlOutput();
							$out->AdminAddBookFalse();exit;
						}
						break;
					case 'editbook_process':
						if($BOOK->EditBookProcess()){
							$out = new HtmlOutput();
							$out->AdminEditBookSuccess();exit;
						}else{
							$out = new HtmlOutput();
							$out->AdminEditBookFalse();exit;
						}
						break;
					case 'list_book_cat':
						$out = new HtmlOutput();
						$out->AdminListBookCategory();exit;
						break;
					case 'list_borrow':
						$out = new HtmlOutput();
						$out->AdminListBookBorrow();exit;
						break;
					case 'apply_borrow':
						$res = array();
						if($BOOK->ApplyBorrowProcess()){
							$res = array("status"=>'success');
						}else{
							$res = array("status"=>'false');
						}
						echo json_encode($res);exit;
						break;
					case 'delete_borrow':
						$res = array();
						if($BOOK->DeleteBorrowProcess()){
							$res = array("status"=>'success');
						}else{
							$res = array("status"=>'false');
						}
						echo json_encode($res);exit;
						break;
					case 'add_book_cat':
						$out = new HtmlOutput();
						$out->AdminAddBookCategory();exit;
						break;
					case 'addbookcategory_process':
						if($BOOK->AddBookCategoryProcess()){
							$out = new HtmlOutput();
							$out->AdminAddBookCategorySuccess();exit;
						}else{
							$out = new HtmlOutput();
							$out->AdminAddBookCategoryFalse();exit;
						}
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