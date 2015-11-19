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
	 *	BOOK
	 ******************************/
	$BOOK = new Book();
	class Book{
		public function __construct(){
			return true;
		}
		/**
		 *	Ham nay load danh sach Sach, co phan trang
		 */
		public function LoadListBook(){
			global $DB, $GLOB;
			//lay thong tin so trang
			if(isset($_REQUEST['page_number'])){
				$page_num = intval($_REQUEST['page_number']);
			}else{
				$page_num = 1;
			}
			$bookperPage = 10;
			//lay thong tin danh muc sach
			if(isset($_REQUEST['book_cat'])){
				$bookCat = $_REQUEST['book_cat'];
			}else{
				$bookCat = 1;
			}
			//glb
			$GLOB->obj_page_num = $page_num;
			//get max record
			if($data = $DB->query("SELECT sum(status) FROM book WHERE parent='{$bookCat}' ")){
				$total = $data[0]['sum(status)'];
			}else{
				$total = 1;
			}
			$totalPage = ceil($total/$bookperPage);
			$GLOB->obj_page_total = $totalPage;
			$res = array();
			//Gioi han phan trang
			$start = ($page_num-1)*$bookperPage;
			$GLOB->TableStart = $start+1;
			$sql_add = " parent='{$bookCat}' LIMIT {$start}, {$bookperPage} ";
			//get data
			if($data = $DB->query("SELECT * FROM book WHERE {$sql_add}")){
				$res = $data;
			}else{
				$res = false;
			}
			return $res;
		}
		/**
		 *	Ham lay ten chu de sach
		 */
		public function ChudeSach($id = false){
			global $DB;
			if($id){
				if($data = $DB->query("SELECT name FROM book_category WHERE id='{$id}' ")){
					return $data[0]['name'];
				}else{
					return "Khong co chu de";
				}
			}else{
				return "Khong co chu de";
			}
		}
		
		/**
		 *	Load thong tin sach
		 */
		public function LoadBookData($id = false){
			global $DB;
			if($id){
				if($data = $DB->query("SELECT * FROM book WHERE id='{$id}' ")){
					return $data[0];
				}else{
					return false;
				}
			}else{
				return false;
			}
		}
		
		/**
		 *	Ham nay load danh muc Sach, co phan trang
		 */
		public function LoadListBookCategory(){
			global $DB, $GLOB;
			//lay thong tin so trang
			if(isset($_REQUEST['page_number'])){
				$page_num = intval($_REQUEST['page_number']);
			}else{
				$page_num = 1;
			}
			$bookperPage = 10;
			//glb
			$GLOB->obj_page_num = $page_num;
			//get max record
			if($data = $DB->query("SELECT sum(status) FROM book_category")){
				$total = $data[0]['sum(status)'];
			}else{
				$total = 1;
			}
			$totalPage = ceil($total/$bookperPage);
			$GLOB->obj_page_total = $totalPage;
			$res = array();
			//Gioi han phan trang
			$start = ($page_num-1)*$bookperPage;
			$GLOB->TableStart = $start+1;
			$sql_add = " LIMIT {$start}, {$bookperPage} ";
			//get data
			if($data = $DB->query("SELECT * FROM book_category {$sql_add}")){
				$res = $data;
			}else{
				$res = false;
			}
			return $res;
		}
		//ham nay load database danh sach cac chu de sach
		public function Theloaisach(){
			global $DB;
			if($data = $DB->query("SELECT * FROM book_category")){
				return $data;
			}else{
				return false;
			}
		}
		//save data
		public function AddBookProcess(){
			global $DB;
			//save hinh anh
			$target_dir = "uploads/images/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				$image = "/".$target_file;
			}else{
				$image = "";
			}
			//get data
			$book_name = $_REQUEST['book_name'];
			$book_code = $_REQUEST['book_code'];
			$theloaisach = $_REQUEST['theloaisach'];
			$book_author = $_REQUEST['book_author'];
			$book_issn = $_REQUEST['book_issn'];
			$book_ddc = $_REQUEST['book_ddc'];
			$book_namxb = $_REQUEST['book_namxb'];
			$book_nhaxb = $_REQUEST['book_nhaxb'];
			$book_sotrang = $_REQUEST['book_sotrang'];
			$book_size = $_REQUEST['book_size'];
			$book_soluong = $_REQUEST['book_soluong'];
			$book_price = $_REQUEST['book_price'];
			$ngonngu = $_REQUEST['ngonngu'];
			$book_keyword = $_REQUEST['book_keyword'];
			$chudesach = $_REQUEST['chudesach'];
			$book_description = $_REQUEST['book_description'];
			$kholuutru = $_REQUEST['kholuutru'];
			$submit = $_REQUEST['submit'];
			//save
			$today = date('Y-m-d H:i:s');
			$member_id = $_SESSION['member_id'];
			if($DB->query_insert("INSERT INTO book(name, author, parent, image, description, price, number, post_date, post_by, nhasanxuat, sotrang, namsanxuat, maso_sach, theloai, ma_issn, ma_ddc, kichthuoc, ngonngu, tukhoa, kholuutru) VALUES ('{$book_name}', '{$book_author}', '{$chudesach}', '{$image}', '{$book_description}', '{$book_price}', '{$book_soluong}', '{$today}', '{$member_id}', '{$book_nhaxb}', '{$book_sotrang}', '{$book_namxb}', '{$book_code}', '{$theloaisach}', '{$book_issn}', '{$book_ddc}', '{$book_size}', '{$ngonngu}', '{$book_keyword}', '{$kholuutru}')")){
				return true;
			}else{
				return false;
			}
		}
		//save edit data
		//khi edit minh co them 2 gia tri an la id va old_image
		//lay 2 gia tri do
		public function EditBookProcess(){
			global $DB;
			//save hinh anh
			$book_old_image = $_REQUEST['book_old_image'];
			//kiem tra coi co up hinh moi ko, neu ko co thi lay hinh cu
			if($_FILES["fileToUpload"]["name"]){
				$target_dir = "uploads/images/";
				$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
					$image = "/".$target_file;
				}else{
					//upload loi~ thi lay hinh cu
					$image = $book_old_image;
				}
			}else{
				//ko co upload hinh moi , lay hinh cu
				$image = $book_old_image;
			}
			//get data
			$book_id = $_REQUEST['book_id'];
			$book_name = $_REQUEST['book_name'];
			$book_code = $_REQUEST['book_code'];
			$theloaisach = $_REQUEST['theloaisach'];
			$book_author = $_REQUEST['book_author'];
			$book_issn = $_REQUEST['book_issn'];
			$book_ddc = $_REQUEST['book_ddc'];
			$book_namxb = $_REQUEST['book_namxb'];
			$book_nhaxb = $_REQUEST['book_nhaxb'];
			$book_sotrang = $_REQUEST['book_sotrang'];
			$book_size = $_REQUEST['book_size'];
			$book_soluong = $_REQUEST['book_soluong'];
			$book_price = $_REQUEST['book_price'];
			$ngonngu = $_REQUEST['ngonngu'];
			$book_keyword = $_REQUEST['book_keyword'];
			$chudesach = $_REQUEST['chudesach'];
			$book_description = $_REQUEST['book_description'];
			$kholuutru = $_REQUEST['kholuutru'];
			$submit = $_REQUEST['submit'];
			//save
			$today = date('Y-m-d H:i:s');
			$member_id = $_SESSION['member_id'];
			//o day ko insert ma la update
			if($DB->query_insert("UPDATE book SET `name`='{$book_name}', `author`='{$book_author}', `parent`='{$chudesach}', `image`='{$image}', `description`='{$book_description}', `price`='{$book_price}', `number`='{$book_soluong}', `post_date`='{$today}', `post_by`='{$member_id}', `nhasanxuat`='{$book_nhaxb}', `sotrang`='{$book_sotrang}', `namsanxuat`='{$book_namxb}', `maso_sach`='{$book_code}', `theloai`='{$theloaisach}', `ma_issn`='{$book_issn}', `ma_ddc`='{$book_ddc}', `kichthuoc`='{$book_size}', `ngonngu`='{$ngonngu}', `tukhoa`='{$book_keyword}', `kholuutru`='{$kholuutru}' WHERE id='{$book_id}'")){
				return true;
			}else{
				return false;
			}
		}
		
		/**
		 *	Xoa sach
		 */
		public function DeleteBookProcess(){
			global $DB;
			//lay id sach 
			if(isset($_REQUEST['book_id'])){
				//co id sach
				//xoa
				if($data = $DB->query_insert("DELETE FROM book WHERE id='{$_REQUEST['book_id']}'")){
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
		
		//save data
		public function AddBookCategoryProcess(){
			global $DB;
			//get data
			$bookcate_name = $_REQUEST['bookcate_name'];
			$today = date('Y-m-d H:i:s');
			$member_id = $_SESSION['member_id'];
			if($DB->query_insert("INSERT INTO book_category(name, date_created, created_by) VALUES ('{$bookcate_name}', '{$today}', '{$member_id}')")){
				return true;
			}else{
				return false;
			}
		}
		
		/**
		 *	Ham nay load danh sach Sach, co phan trang
		 */
		public function LoadListBook12(){
			global $DB, $GLOB, $BOOK;
			//lay thong tin so trang
			if(isset($_REQUEST['page_number'])){
				$page_num = intval($_REQUEST['page_number']);
			}else{
				$page_num = 1;
			}
			$bookperPage = 12;
			//glb
			$GLOB->obj_page_num = $page_num;
			//get max record
			if($data = $DB->query("SELECT sum(status) FROM book")){
				$total = $data[0]['sum(status)'];
			}else{
				$total = 1;
			}
			$totalPage = ceil($total/$bookperPage);
			$GLOB->obj_page_total = $totalPage;
			//lay thong tin danh muc sach
			if(isset($_REQUEST['book_cat'])){
				$bookCat = $_REQUEST['book_cat'];
			}else{
				$bookCat = "all";
			}
			$res = array();
			//Gioi han phan trang
			$start = ($page_num-1)*$bookperPage;
			$GLOB->TableStart = $start+1;
			if($bookCat == "all"){
				//ko gioi han chu de
				$sql_add = " ORDER BY id DESC LIMIT {$start}, {$bookperPage} ";
			}else{
				$sql_add = " WHERE parent='{$bookCat}' ORDER BY id DESC LIMIT {$start}, {$bookperPage} ";
			}
			//get data
			if($data = $DB->query("SELECT * FROM book {$sql_add} ")){
				$res = $data;
			}else{
				$res = false;
			}
			return $res;
		}
	}
?>