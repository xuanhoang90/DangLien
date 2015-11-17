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
		//Admin login
		public function Login(){
			global $GLOB;
			$GLOB->vars['page_title'] = "Admin Login";
			include "public/html/header.php";
			include "public/html/admin_login.php";
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
		public function Theloaisach(){
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
					$output .= "<option value='{$theloai['id']}'>{$theloai['name']}</option>";
				}
			}else{
				$output = "<option value='default'>Empty</option>";
			}
			return $output;
		}
	}
?>