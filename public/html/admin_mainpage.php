<!--Admin Main page-->
<div class="trangchuquantri">
	<div class="init">
		<?php include "public/html/admin_sidebar.php"; ?>
		<div class="quickstart">
			<!--Thong ke va cac bieu tuong truy cap nhanh vao chuc nang-->
			<p class="title">Admin quick start</p>
			<div class="app-icon">
				<a class="app-item"><i class="fa fa-user-secret"></i> Danh sach quan tri vien (<span>10</span>)</a>
				<a class="app-item"><i class="fa fa-user"></i> Danh sach ban doc (<span>100000</span>)</a>
				<a class="app-item" href="<?php echo ROOT_DOMAIN."/?site=admin&view=book&action=list_book_cat&page_number=1";?>"><i class="fa fa-book"></i> Danh sach Sach (<span>999999</span>)</a>
			</div>
		</div>
	</div>
</div>
<!--/Admin Main page-->