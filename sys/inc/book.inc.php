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
				$bookCat = 1;
			}
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
	}
?>