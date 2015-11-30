<div class="thongtinuser">
	<div class="init">
		<h1 class="block-title">Thong tin user</h1>
		<div class="info-contain">
			<div class="form-add-book login-area"><form method="POST" action="<?php echo ROOT_DOMAIN."/?site=user&action=update_info";?>" enctype="multipart/form-data">
				<?php 
					if($userInfo){
						$user_hoten = $userInfo['name'];
						$user_ngaysinh = $userInfo['daybirth'];
						$user_email = $userInfo['email'];
						$user_lop = $userInfo['class'];
						$user_truong = $userInfo['school'];
						$user_avatar = $userInfo['avatar'];
					}else{
						$user_hoten = '';
						$user_ngaysinh = '';
						$user_email = '';
						$user_lop = '';
						$user_truong = '';
						$user_avatar = '';
					}
				?>
				<?php
					if($status != ''):
				?>
					<p class="x_status"><?php echo $status; ?></p>
				<?php endif; ?>
				<div class="form-wrap">
					<p class="label">Ho ten</p><input class="input-text user_hoten" name="user_hoten" type="text" value="<?php echo $user_hoten; ?>" placeholder="Ho ten" />
				</div>
				<div class="form-wrap">
					<p class="label">Ngay sinh</p><input class="input-text user_ngaysinh" name="user_ngaysinh" type="text" value="<?php echo $user_ngaysinh; ?>" placeholder="Ngay sinh" />
				</div>
				<div class="form-wrap">
					<p class="label">Email</p><input class="input-text user_email" name="user_email" type="text" value="<?php echo $user_email; ?>" placeholder="Email" />
				</div>
				<div class="form-wrap">
					<p class="label">Lop sinh hoat</p><input class="input-text user_lop" name="user_lop" type="text" value="<?php echo $user_lop; ?>" placeholder="Lop" />
				</div>
				<div class="form-wrap">
					<p class="label">Truong</p><input class="input-text user_truong" name="user_truong" type="text" value="<?php echo $user_truong; ?>" placeholder="Truong" />
				</div>
				<?php if($user_avatar != ''): ?>
				<div class="form-wrap">
					<p class="label">&nbsp;</p><img class="input-text image_preview" src="<?php echo ROOT_DOMAIN."/".$user_avatar; ?>" />
				</div>
				<?php endif; ?>
				<div class="form-wrap">
					<input class="user_avatar_old" name="user_avatar_old" type="hidden" value="<?php echo $user_avatar; ?>"/>
					<p class="label">Hinh dai dien</p><input class="input-text user_avatar" type="file" name="fileToUpload" id="fileToUpload">
				</div>
				<input class="form-submit submit-login" type="submit" name="submit" value="Cap nhat" />
				<a class="link_changepassword" href="<?php echo ROOT_DOMAIN."/?site=user&action=change_password";?>"><i class="fa fa-lock"></i> Doi mat khau</a>
			</form></div> 
		</div>
	</div>
</div>