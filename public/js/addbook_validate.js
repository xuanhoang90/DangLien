$(function(){
	//17-11-2015
	//addbook form: validate
	
	
	//check int number 
	function isInt(n) {
	   return n % 1 === 0;
	}
	
	$(".form-add-book .form-submit").click(function(e){
		//huy bo viec post du lieu len sever neu nhu cac dieu kien sai
		//kiem tra cac dieu kien nhap
		//neu tat ca cac gia tri nhap dung -> cho phep submit
		
		//dat 1 gia tri lam co` de kiem tra lan luot cac gia tri, sai cho nao thi dung lai cho do
		var _GlobFlag = false;
		
		var _Form = $(".form-add-book");
		//lay gia tri ten sach
		var _StepCheck = $(".form-add-book").find(".book_name").val();
		//kiem tra ten sach
		if(_StepCheck != ""){//dung, da nhap ten sach
			_GlobFlag = true;
			$(".form-add-book").find(".book_name").css({"border":"1px solid #d4d4d4"});
		}else{
			_GlobFlag = false;
			alert("Vui long nhap ten sach");
			//huy bo viec submit
			e.preventDefault();
			$(".form-add-book").find(".book_name").focus().css({"border":"1px solid red"});
			return;
		}
		
		//lay gia tri ma so sach
		var _StepCheck = $(".form-add-book").find(".book_code").val();
		//kiem tra ma so sach
		if(isInt(_StepCheck) && _StepCheck.length == 5){//dung, da nhap ma so sach
			_GlobFlag = true;
			$(".form-add-book").find(".book_code").css({"border":"1px solid #d4d4d4"});
		}else{
			_GlobFlag = false;
			//huy bo viec submit
			alert("Vui long nhap ma so sach (5 so)");
			e.preventDefault();
			$(".form-add-book").find(".book_code").focus().css({"border":"1px solid red"});
			return;
		}
		
		//lay gia tri the loai sach
		var _StepCheck = $(".form-add-book").find(".theloaisach").val();
		//kiem tra the loai sach
		if(_StepCheck != "default"){//dung, da chon the loai sach
			_GlobFlag = true;
			$(".form-add-book").find(".theloaisach").css({"border":"1px solid #d4d4d4"});
		}else{
			_GlobFlag = false;
			//huy bo viec submit
			alert("Vui long chon the loai sach");
			e.preventDefault();
			$(".form-add-book").find(".theloaisach").focus().css({"border":"1px solid red"});
			return;
		}
		
		//lay gia tri ten tac gia
		var _StepCheck = $(".form-add-book").find(".book_author").val();
		//kiem tra ten tac gia
		if(_StepCheck != ""){//dung, da nhap ten tac gia
			_GlobFlag = true;
			$(".form-add-book").find(".book_author").css({"border":"1px solid #d4d4d4"});
		}else{
			_GlobFlag = false;
			//huy bo viec submit
			alert("Vui long nhap ten tac gia");
			e.preventDefault();
			$(".form-add-book").find(".book_author").focus().css({"border":"1px solid red"});
			return;
		}
		
		//lay gia tri Ma ISSN
		var _StepCheck = $(".form-add-book").find(".book_issn").val();
		//kiem tra Ma ISSN
		if(_StepCheck != ""){//dung, da nhap Ma ISSN
			_GlobFlag = true;
			$(".form-add-book").find(".book_issn").css({"border":"1px solid #d4d4d4"});
		}else{
			_GlobFlag = false;
			//huy bo viec submit
			alert("Vui long nhap Ma ISSN");
			e.preventDefault();
			$(".form-add-book").find(".book_issn").focus().css({"border":"1px solid red"});
			return;
		}
		
		//lay gia tri Ma DDC
		var _StepCheck = $(".form-add-book").find(".book_ddc").val();
		//kiem tra Ma DDC
		if(_StepCheck != ""){//dung, da nhap Ma DDC
			_GlobFlag = true;
			$(".form-add-book").find(".book_ddc").css({"border":"1px solid #d4d4d4"});
		}else{
			_GlobFlag = false;
			//huy bo viec submit
			alert("Vui long nhap Ma DDC");
			e.preventDefault();
			$(".form-add-book").find(".book_ddc").focus().css({"border":"1px solid red"});
			return;
		}
		
		//lay gia tri Nam xuat ban
		var _StepCheck = $(".form-add-book").find(".book_namxb").val();
		//kiem tra Nam xuat ban
		if(_StepCheck != ""){//dung, da nhap Nam xuat ban
			_GlobFlag = true;
			$(".form-add-book").find(".book_namxb").css({"border":"1px solid #d4d4d4"});
		}else{
			_GlobFlag = false;
			//huy bo viec submit
			alert("Vui long nhap Nam xuat ban");
			e.preventDefault();
			$(".form-add-book").find(".book_namxb").focus().css({"border":"1px solid red"});
			return;
		}
		
		//lay gia tri Nha xuat ban
		var _StepCheck = $(".form-add-book").find(".book_nhaxb").val();
		//kiem tra Nha xuat ban
		if(_StepCheck != ""){//dung, da nhap Nha xuat ban
			_GlobFlag = true;
			$(".form-add-book").find(".book_nhaxb").css({"border":"1px solid #d4d4d4"});
		}else{
			_GlobFlag = false;
			//huy bo viec submit
			alert("Vui long nhap Nha xuat ban");
			e.preventDefault();
			$(".form-add-book").find(".book_nhaxb").focus().css({"border":"1px solid red"});
			return;
		}
		
		//lay gia tri So trang
		var _StepCheck = $(".form-add-book").find(".book_sotrang").val();
		//kiem tra So trang
		if(_StepCheck != ""){//dung, da nhap So trang
			_GlobFlag = true;
			$(".form-add-book").find(".book_sotrang").css({"border":"1px solid #d4d4d4"});
		}else{
			_GlobFlag = false;
			//huy bo viec submit
			alert("Vui long nhap So trang");
			e.preventDefault();
			$(".form-add-book").find(".book_sotrang").focus().css({"border":"1px solid red"});
			return;
		}
		
		//lay gia tri Kich thuoc
		var _StepCheck = $(".form-add-book").find(".book_size").val();
		//kiem tra Kich thuoc
		if(_StepCheck != ""){//dung, da nhap Kich thuoc
			_GlobFlag = true;
			$(".form-add-book").find(".book_size").css({"border":"1px solid #d4d4d4"});
		}else{
			_GlobFlag = false;
			//huy bo viec submit
			alert("Vui long nhap Kich thuoc");
			e.preventDefault();
			$(".form-add-book").find(".book_size").focus().css({"border":"1px solid red"});
			return;
		}
		
		//lay gia tri So luong
		var _StepCheck = $(".form-add-book").find(".book_soluong").val();
		//kiem tra So luong
		if(_StepCheck != ""){//dung, da nhap So luong
			_GlobFlag = true;
			$(".form-add-book").find(".book_soluong").css({"border":"1px solid #d4d4d4"});
		}else{
			_GlobFlag = false;
			//huy bo viec submit
			alert("Vui long nhap So luong");
			e.preventDefault();
			$(".form-add-book").find(".book_soluong").focus().css({"border":"1px solid red"});
			return;
		}
		
		//lay gia tri Gia
		var _StepCheck = $(".form-add-book").find(".book_price").val();
		//kiem tra Gia
		if(_StepCheck != ""){//dung, da nhap Gia
			_GlobFlag = true;
			$(".form-add-book").find(".book_price").css({"border":"1px solid #d4d4d4"});
		}else{
			_GlobFlag = false;
			//huy bo viec submit
			alert("Vui long nhap Gia");
			e.preventDefault();
			$(".form-add-book").find(".book_price").focus().css({"border":"1px solid red"});
			return;
		}
		
		//lay gia tri Ngon ngu
		var _StepCheck = $(".form-add-book").find(".ngonngu").val();
		//kiem tra Ngon ngu
		if(_StepCheck != "default"){//dung, da nhap Ngon ngu
			_GlobFlag = true;
			$(".form-add-book").find(".ngonngu").css({"border":"1px solid #d4d4d4"});
		}else{
			_GlobFlag = false;
			//huy bo viec submit
			alert("Vui long nhap Ngon ngu");
			e.preventDefault();
			$(".form-add-book").find(".ngonngu").focus().css({"border":"1px solid red"});
			return;
		}
		
		//lay gia tri Tu khoa
		var _StepCheck = $(".form-add-book").find(".book_keyword").val();
		//kiem tra Tu khoa
		if(_StepCheck != ""){//dung, da nhap Tu khoa
			_GlobFlag = true;
			$(".form-add-book").find(".book_keyword").css({"border":"1px solid #d4d4d4"});
		}else{
			_GlobFlag = false;
			//huy bo viec submit
			alert("Vui long nhap Tu khoa");
			e.preventDefault();
			$(".form-add-book").find(".book_keyword").focus().css({"border":"1px solid red"});
			return;
		}
		
		//lay gia tri Chu de
		var _StepCheck = $(".form-add-book").find(".chudesach").val();
		//kiem tra Tu khoa
		if(_StepCheck != "default"){//dung, da nhap Chu de
			_GlobFlag = true;
			$(".form-add-book").find(".chudesach").css({"border":"1px solid #d4d4d4"});
		}else{
			_GlobFlag = false;
			//huy bo viec submit
			alert("Vui long nhap Chu de");
			e.preventDefault();
			$(".form-add-book").find(".chudesach").focus().css({"border":"1px solid red"});
			return;
		}
		
		//lay gia tri Tom tat
		var _StepCheck = $(".form-add-book").find(".book_description").val();
		//kiem tra Tom tat
		if(_StepCheck != ""){//dung, da nhap Tom tat
			_GlobFlag = true;
			$(".form-add-book").find(".book_description").css({"border":"1px solid #d4d4d4"});
		}else{
			_GlobFlag = false;
			//huy bo viec submit
			alert("Vui long nhap Tom tat");
			e.preventDefault();
			$(".form-add-book").find(".book_description").focus().css({"border":"1px solid red"});
			return;
		}
		
		//lay gia tri Kho luu tru
		var _StepCheck = $(".form-add-book").find(".kholuutru").val();
		//kiem tra Kho luu tru
		if(_StepCheck != "default"){//dung, da nhap Kho luu tru
			_GlobFlag = true;
			$(".form-add-book").find(".kholuutru").css({"border":"1px solid #d4d4d4"});
		}else{
			_GlobFlag = false;
			//huy bo viec submit
			alert("Vui long nhap Kho luu tru");
			e.preventDefault();
			$(".form-add-book").find(".kholuutru").focus().css({"border":"1px solid red"});
			return;
		}
		
		//cuoi cung ta xem flag co di den day hay khong,
		//neu true -> cho phep submit data, false thi ko
		
		if(_GlobFlag){
			//do nothing
		}else{
			alert("something went wrong!");
			e.preventDefault();
		}
		return;//complete validate
	})
})