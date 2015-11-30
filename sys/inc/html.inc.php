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
		//HomePage
		public function Home(){
			global $GLOB;
			$GLOB->vars['page_title'] = "DangLienLib";
			include "public/html/header.php";
			include "public/html/home.php";
			include "public/html/footer.php";
			return true;
		}
		//Search
		public function Search(){
			global $GLOB, $BOOK;
			$GLOB->vars['page_title'] = "DangLienLib";
			include "public/html/header.php";
			include "public/html/search.php";
			include "public/html/footer.php";
			return true;
		}
		//Admin login
		public function Login(){
			global $GLOB;
			$GLOB->vars['page_title'] = "Admin Login";
			include "public/html/header.php";
			include "public/html/admin_login.php";
			include "public/html/footer.php";
			return true;
		}
		//Admin login
		public function Register(){
			global $GLOB;
			$GLOB->vars['page_title'] = "Sign Up";
			include "public/html/header.php";
			include "public/html/user_register.php";
			include "public/html/footer.php";
			return true;
		}
		//AdminMainPage
		public function AdminMainPage(){
			global $GLOB;
			$GLOB->vars['page_title'] = "DangLienLib";
			include "public/html/header.php";
			include "public/html/admin_mainpage.php";
			include "public/html/footer.php";
			return true;
		}
		//trang danh sach Sach
		public function AdminListBook(){
			global $GLOB, $DB, $BOOK;
			$GLOB->vars['page_title'] = "Danh sach Sach";
			//load danh sach sach
			$listBook = $BOOK->LoadListBook();
			include "public/html/header.php";
			include "public/html/admin_listbook.php";
			include "public/html/footer.php";
			return true;
		}
		//trang them sach
		public function AdminAddBook(){
			global $GLOB;
			$GLOB->vars['page_title'] = "Them sach";
			include "public/html/header.php";
			include "public/html/admin_addbook.php";
			include "public/html/footer.php";
			return true;
		}
		//trang sua sach
		public function AdminEditBook(){
			global $GLOB, $BOOK;
			$GLOB->vars['page_title'] = "Them sach";
			//edit thi clone cai add, nhung phai load data cua sach can sua
			$idBook = $_REQUEST['book_id'];
			include "public/html/header.php";
			if($data = $BOOK->LoadBookData($idBook)){
				//neu sach co trong thu vien thi moi cho edit, tranh truong hop nhap id sai
				//echo "<pre>";print_r($data);exit;
				include "public/html/admin_editbook.php";
			}else{
				include "public/html/admin_editbook_nodata.php";
			}
			include "public/html/footer.php";
			return true;
		}
		//trang danh sach Sach
		public function AdminListBookCategory(){
			global $GLOB, $DB, $BOOK;
			$GLOB->vars['page_title'] = "Danh sach Sach";
			//load danh sach sach
			$listBook = $BOOK->LoadListBookCategory();
			include "public/html/header.php";
			include "public/html/admin_listbookcategory.php";
			include "public/html/footer.php";
			return true;
		}
		//trang them sach
		public function AdminAddBookCategory(){
			global $GLOB;
			$GLOB->vars['page_title'] = "Them sach";
			include "public/html/header.php";
			include "public/html/admin_addbookcategory.php";
			include "public/html/footer.php";
			return true;
		}
		//ham phan trang
		public function PhanTrang($hientai = 1, $tong = 1, $link = ""){
			$html = "";
			$trangtruoc = $hientai - 1;
			$trangsau = $hientai + 1;
			if($trangtruoc <= 0){
				$trangtruoc = 1;
			}
			if($trangsau > $tong){
				$trangsau = $tong;
			}
			$html .=<<<HERE
				<div class="phantrang">
HERE;
			$html .=<<<HERE
				<a class="trang" href="{$link}{$trangtruoc}"><i class="fa fa-angle-double-left"></i></a>
HERE;
			for($i = 5; $i > 0; $i--){
				$trang = $hientai - $i;
				if($trang > 0){
					$html .=<<<HERE
						<a class="trang" href="{$link}{$trang}">{$trang}</a>
HERE;
				}
			}
			$html .=<<<HERE
				<a class="trang current" href="{$link}{$hientai}">{$hientai}</a>
HERE;
			for($i = 1; $i < 5; $i++){
				$trang = $hientai + $i;
				if($trang <= $tong){
					$html .=<<<HERE
						<a class="trang" href="{$link}{$trang}">{$trang}</a>
HERE;
				}
			}
			$html .=<<<HERE
				<a class="trang" href="{$link}{$trangsau}"><i class="fa fa-angle-double-right"></i></a>
HERE;
			$html .=<<<HERE
				</div>
HERE;
			return $html;
		}
		
		//ham nay se load danh sach cac the loai sach dang co ra de chon khi nhap sach moi
		public function Theloaisach($selected = false){
			global $DB, $BOOK;
			$output = "";
			/**
			 *	if($data = $BOOK->Theloaisach())//neu co data, tuc la database co cac the loai sach thi echo ra, neu ko co data thi -> empty
			 *	$data = $BOOK->Theloaisach(): ta se goi class Book, truy van den ham theloaisach de lay database, neu no tra ve data thi minh echo ra cac option
			 *	Neu khong the echo empty
			 *	ham` nay duoc goi. o ben file html nhu sau
			 */
			if($data = $BOOK->Theloaisach()){
				foreach($data as $theloai){
					$add = "";
					if($selected){
						if($theloai['id'] == $selected){
							$add = "selected='true'";
						}
					}
					$output .= "<option {$add} value='{$theloai['id']}'>{$theloai['name']}</option>";
				}
			}else{
				$output = "<option value='default'>Empty</option>";
			}
			return $output;
		}
		//trang thong bao them sach thanh cong
		public function AdminAddBookSuccess(){
			global $GLOB;
			$GLOB->vars['page_title'] = "DangLienLib";
			$addbook_status = "Them sach thanh cong";
			include "public/html/header.php";
			include "public/html/admin_status_addbook.php";
			include "public/html/footer.php";
			return true;
		}
		//trang thong bao them sach that bai: da xay ra loi
		public function AdminAddBookFalse(){
			global $GLOB;
			$GLOB->vars['page_title'] = "DangLienLib";
			$addbook_status = "Them sach da xay ra loi, vui long thu lai";
			include "public/html/header.php";
			include "public/html/admin_status_addbook.php";
			include "public/html/footer.php";
			return true;
		}
		
		//trang thong bao sua sach thanh cong
		public function AdminEditBookSuccess(){
			global $GLOB;
			$GLOB->vars['page_title'] = "DangLienLib";
			$addbook_status = "Sua sach thanh cong";
			include "public/html/header.php";
			include "public/html/admin_status_addbook.php";
			include "public/html/footer.php";
			return true;
		}
		//trang thong bao sua sach that bai: da xay ra loi
		public function AdminEditBookFalse(){
			global $GLOB;
			$GLOB->vars['page_title'] = "DangLienLib";
			$addbook_status = "Sua sach da xay ra loi, vui long thu lai";
			include "public/html/header.php";
			include "public/html/admin_status_addbook.php";
			include "public/html/footer.php";
			return true;
		}
		
		//trang thong bao them danh muc sach thanh cong
		public function AdminAddBookCategorySuccess(){
			global $GLOB;
			$GLOB->vars['page_title'] = "DangLienLib";
			$addbook_status = "Them danh muc sach thanh cong";
			include "public/html/header.php";
			include "public/html/admin_status_addbookcategory.php";
			include "public/html/footer.php";
			return true;
		}
		//trang thong bao them danh muc sach that bai: da xay ra loi
		public function AdminAddBookCategoryFalse(){
			global $GLOB;
			$GLOB->vars['page_title'] = "DangLienLib";
			$addbook_status = "Them danh muc sach da xay ra loi, vui long thu lai";
			include "public/html/header.php";
			include "public/html/admin_status_addbookcategory.php";
			include "public/html/footer.php";
			return true;
		}
		
		
		//trang thong bao dang ki tai khoan thanh cong
		public function UserRegisterSucess(){
			global $GLOB;
			$GLOB->vars['page_title'] = "DangLienLib";
			$addbook_status = "Dang ki thanh cong";
			include "public/html/header.php";
			include "public/html/user_register_status_ok.php";
			include "public/html/footer.php";
			return true;
		}
		//trang thong bao Tai khoan da ton tai
		public function UserRegisterFalseID(){
			global $GLOB;
			$GLOB->vars['page_title'] = "DangLienLib";
			$addbook_status = "Tai khoan da ton tai";
			include "public/html/header.php";
			include "public/html/user_register_status_false.php";
			include "public/html/footer.php";
			return true;
		}
		
		//trang quen mat khau
		public function FogetPassword(){
			global $GLOB;
			$GLOB->vars['page_title'] = "DangLienLib";
			$addbook_status = "";
			include "public/html/header.php";
			include "public/html/user_forget_pass.php";
			include "public/html/footer.php";
			return true;
		}
		
		//List user chua kich hoat
		public function AdminListMemberUnactive(){
			global $GLOB, $USER;
			//lay thong tin danh sach user chua kich hoat, truong hop nay thi cung phai phan trang, vi doi khi nhieu qua, load se lau, vi du 2 - 3 trieu user chua kich hoat
			$GLOB->vars['page_title'] = "DangLienLib";
			include "public/html/header.php";
			$memberList = $USER->MemberUnactiveList();
			include "public/html/admin_user_unactive.php";
			include "public/html/footer.php";
			return true;
		}
		
		//List user
		public function AdminListMember(){
			global $GLOB, $USER;
			$GLOB->vars['page_title'] = "DangLienLib";
			include "public/html/header.php";
			$memberList = $USER->MemberList();
			include "public/html/admin_user_normal.php";
			include "public/html/footer.php";
			return true;
		}
		
		//Add manager
		public function AdminAddManager(){
			global $GLOB, $USER;
			$GLOB->vars['page_title'] = "DangLienLib";
			include "public/html/header.php";
			include "public/html/admin_addsmod.php";
			include "public/html/footer.php";
			return true;
		}
		
		//Hacker
		public function HackerGetOut(){
			global $GLOB, $USER;
			$GLOB->vars['page_title'] = "DangLienLib";
			include "public/html/header.php";
			include "public/html/admin_hacker_getout.php";
			include "public/html/footer.php";
			return true;
		}
		
		//Hacker
		public function AddMangerProcessStatus($status = ""){
			global $GLOB, $USER;
			$GLOB->vars['page_title'] = "DangLienLib";
			include "public/html/header.php";
			include "public/html/admin_addmanager_status.php";
			include "public/html/footer.php";
			return true;
		}
		
		//List manager
		public function AdminListManger(){
			global $GLOB, $USER;
			$GLOB->vars['page_title'] = "DangLienLib";
			include "public/html/header.php";
			$memberList = $USER->MangerList();
			include "public/html/admin_user_manager.php";
			include "public/html/footer.php";
			return true;
		}
		
		//danh sach ban doc muon sach
		public function AdminListBookBorrow(){
			global $GLOB, $BOOK;
			$GLOB->vars['page_title'] = "DangLienLib";
			include "public/html/header.php";
			$borrowList = $BOOK->BorrowList();
			include "public/html/admin_book_borrow_list.php";
			include "public/html/footer.php";
			return true;
		}
		
		//trang thong tin user
		public function UserInformation($status = ''){
			global $GLOB, $USER;
			$GLOB->vars['page_title'] = "DangLienLib";
			include "public/html/header.php";
			$userInfo = $USER->GetUserData();
			include "public/html/user_info.php";
			include "public/html/footer.php";
			return true;
		}
		
		//trang thay doi mat khau
		public function UserChangePassword($status = ''){
			global $GLOB, $USER;
			$GLOB->vars['page_title'] = "DangLienLib";
			include "public/html/header.php";
			include "public/html/user_changepassword.php";
			include "public/html/footer.php";
			return true;
		}
		
		//trang danh sach sach muon
		public function UserBorrowList(){
			global $GLOB, $USER;
			$GLOB->vars['page_title'] = "DangLienLib";
			include "public/html/header.php";
			$userBorrowList = $USER->GetUserBorrowList();
			include "public/html/user_borrowlist.php";
			include "public/html/footer.php";
			return true;
		}
	}
?>