<div class="trangdangnhap">
	<div class="init">
		<div class="login-area">
			<form action="<?php echo ROOT_DOMAIN;?>" method="POST">
				<h1>Sign up</h1>
				<input type="hidden" name="site" value="user" />
				<input type="hidden" name="action" value="register_process" />
				<div class="form-wrap">
					<label>Account: </label>
					<input type="text" name="user_id" class="user_id" value="" placeholder="Your account" />
				</div>
				<div class="form-wrap">
					<label>Password: </label>
					<input type="password" class="user_pass" name="user_pass" value="" placeholder="Password" />
				</div>
				<div class="form-wrap">
					<label>Repeat Password: </label>
					<input type="password" class="user_pass_repeat" name="user_pass_repeat" value="" placeholder="Password repeat" />
				</div>
				<div class="form-wrap">
					<label>Ban la: </label>
					<select class="user_svgv" name="user_svgv">
						<option value="sinhvien">Sinh vien</option>
						<option value="giangvien">Giang vien</option>
					</select>
				</div>
				<input class="submit-login" type="submit" name="submit" value="Let's go" />
			</form>
		</div>
	</div>
</div>
<script src="public/js/register_validate.js"></script>