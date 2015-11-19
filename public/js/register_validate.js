$(function(){
	//19-11-2015
	//register form: validate
	
	$(".trangdangnhap .submit-login").click(function(e){
		//o day chi co 4 tham so, lay gia tri 1 lan luon
		var _Form = $(".trangdangnhap").find(".login-area");
		var _UserID = _Form.find(".user_id").val();
		var _UserPwd = _Form.find(".user_pass").val();
		var _UserPwdR = _Form.find(".user_pass_repeat").val();
		var _UserEmail = _Form.find(".user_email").val();
		var _GlobFlag = false;
		if(_UserID.length >= 6){
			_GlobFlag = true;
			_Form.find(".user_id").css({"border":"1px solid #d4d4d4"});
		}else{
			_GlobFlag = false;
			alert("Vui long nhap ten dang nhap (it nhat 6 ki tu)!");
			//huy bo viec submit
			e.preventDefault();
			_Form.find(".user_id").focus().css({"border":"1px solid red"});
			return;
		}
		
		if(_UserPwd.length >= 6){
			_GlobFlag = true;
			_Form.find(".user_pass").css({"border":"1px solid #d4d4d4"});
		}else{
			_GlobFlag = false;
			alert("Vui long nhap mat khau (it nhat 6 ki tu)!");
			//huy bo viec submit
			e.preventDefault();
			_Form.find(".user_pass").focus().css({"border":"1px solid red"});
			return;
		}
		
		if(_UserPwdR.length >= 6){
			_GlobFlag = true;
			_Form.find(".user_pass_repeat").css({"border":"1px solid #d4d4d4"});
		}else{
			_GlobFlag = false;
			alert("Vui long nhap mat khau (repeat) (it nhat 6 ki tu)!");
			//huy bo viec submit
			e.preventDefault();
			_Form.find(".user_pass_repeat").focus().css({"border":"1px solid red"});
			return;
		}
		
		if(_UserPwdR == _UserPwd){
			_GlobFlag = true;
			_Form.find(".user_pass_repeat").css({"border":"1px solid #d4d4d4"});
		}else{
			_GlobFlag = false;
			alert("Mat khau lap lai chua dung");
			//huy bo viec submit
			e.preventDefault();
			_Form.find(".user_pass_repeat").focus().css({"border":"1px solid red"});
			return;
		}
		//email thi co cung dc ko thi thoi, validate email hoi cuc, de sau a lam.
		return;//complete validate
	})
})