<div class="trangdangnhap">
	<div class="init">
		<div class="login-area">
			<form action="<?php echo ROOT_DOMAIN."/?site=user&action=change_password_process";?>" method="POST">
				<h1>Thay doi mat khau</h1>
				<?php
					if($status != ''):
				?>
					<p class="x_status"><?php echo $status; ?></p>
				<?php endif; ?>
				<div class="form-wrap">
					<label>Mat khau cu: </label>
					<input type="password" class="user_pass_old" name="user_pass_old" value="" placeholder="Password" />
				</div>
				<div class="form-wrap">
					<label>Mat khau moi: </label>
					<input type="password" class="user_pass_new" name="user_pass_new" value="" placeholder="Password" />
				</div>
				<div class="form-wrap">
					<label>Xac nhan mat khau moi: </label>
					<input type="password" class="user_pass_new_repeat" name="user_pass_new_repeat" value="" placeholder="Password repeat" />
				</div>
				<input class="submit-login" type="submit" name="submit" value="Update" />
			</form>
		</div>
	</div>
</div>
<script>
	$(function(){
		$(".submit-login").click(function(e){
			var _OldPwd = $(".user_pass_old").val();
			var _NewPwd = $(".user_pass_new").val();
			var _NewPwdRp = $(".user_pass_new_repeat").val();
			if(_OldPwd != ''){
				if(_NewPwd != ''){
					if(_NewPwdRp != ''){
						if(_NewPwd != _NewPwdRp){
							e.preventDefault();
							alert("Mat khau xac nhan khong khop");
							$(".user_pass_new_repeat").focus();
						}else{
							//do nothing
						}
					}else{
						e.preventDefault();
						alert("Vui long nhap mat khau xac nhan");
						$(".user_pass_new_repeat").focus();
					}
				}else{
					e.preventDefault();
					alert("Vui long nhap mat khau moi");
					$(".user_pass_new").focus();
				}
			}else{
				e.preventDefault();
				alert("Vui long nhap mat khau cu");
				$(".user_pass_old").focus();
			}
		})
	})
</script>