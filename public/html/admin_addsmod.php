<!--Admin Main page-->
<div class="trangchuquantri">
	<div class="init">
		<?php include "public/html/admin_sidebar.php"; ?>
		<div class="quickstart">
			<!--Thong ke va cac bieu tuong truy cap nhanh vao chuc nang-->
			<p class="title">Thêm quan tri vien</p>
			<div class="app-icon trangdangnhap">
				<div class="form-add-book login-area"><form method="POST" action="<?php echo ROOT_DOMAIN."/?site=admin&view=member&action=addmember_process";?>">
					<div class="form-wrap">
						<p class="label">Ten dang nhap</p><input class="input-text user_id" name="user_id" type="text" value="" placeholder="User name" />
					</div>
					<div class="form-wrap">
						<p class="label">Mat khau</p><input type="password" class="input-text user_pass" name="user_pass" value="" placeholder="Password" />
					</div>
					<div class="form-wrap">
						<p class="label">Nhap lai mat khau</p><input type="password" class="input-text user_pass_repeat" name="user_pass_repeat" value="" placeholder="Password repeat" />
					</div>
					<input class="form-submit submit-login" type="submit" name="submit" value="Go" />
				</form></div> 
			</div>
		</div>
	</div>
</div>
<script src="public/js/register_validate.js"></script>
<!--/Admin Main page-->