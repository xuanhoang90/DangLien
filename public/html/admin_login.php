<div class="trangdangnhap">
	<div class="init">
		<div class="logo">
			<a href="<?php echo ROOT_DOMAIN;?>" class="logo-contain"><img src="/public/imgs/logo.png" /></a>
		</div>
		<div class="login-area">
			<form action="<?php echo ROOT_DOMAIN;?>?site=user&action=login_process" method="POST">
				<h1>Log in</h1>
				<input type="hidden" name="site" value="user" />
				<input type="hidden" name="action" value="login_process" />
				<div class="form-wrap">
					<label>Account: </label>
					<input type="text" name="user_id" value="" placeholder="Your account" />
				</div>
				<div class="form-wrap">
					<label>Password: </label>
					<input type="password" name="user_pass" value="" placeholder="Password" />
				</div>
				<?php if($GLOB->login_status != ""): ?>
					<p class="login_status"><?php echo $GLOB->login_status; ?></p>
				<?php endif; ?>
				<a href="<?php echo ROOT_DOMAIN;?>/?site=user&action=forget_pass" class="user-link"><i class="fa fa-unlock"></i> Quen mat khau?</a>
				<a href="<?php echo ROOT_DOMAIN;?>/?site=user&action=register" class="user-link"><i class="fa fa-leaf"></i> Dang ky tai khoan ban doc</a>
				<input class="submit-login" type="submit" name="submit" value="Let's go" />
			</form>
		</div>
	</div>
</div>