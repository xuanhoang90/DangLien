<!--Admin Main page-->
<div class="trangchuquantri">
	<div class="init">
		<?php include "public/html/admin_sidebar.php"; ?>
		<div class="quickstart">
			<!--Thong ke va cac bieu tuong truy cap nhanh vao chuc nang-->
			<p class="title">Thêm danh muc sách</p>
			<div class="app-icon">
				<div class="form-add-book"><form method="POST" action="<?php echo ROOT_DOMAIN."/?site=admin&view=book&action=addbookcategory_process";?>">
					<div class="form-wrap">
						<p class="label">Ten danh muc sach</p><input class="input-text bookcate_name" name="bookcate_name" type="text" value="" placeholder="Book category name" />
					</div>
					<input class="form-submit" type="submit" name="submit" value="Go" />
				</form></div> 
			</div>
		</div>
	</div>
</div>
<!--/Admin Main page-->