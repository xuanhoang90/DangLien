<!--Admin Main page-->
<div class="trangchuquantri">
	<div class="init">
		<?php include "public/html/admin_sidebar.php"; ?>
		<div class="quickstart">
			<!--Thong ke va cac bieu tuong truy cap nhanh vao chuc nang-->
			<p class="title"><?php echo $addbook_status; ?></p>
			<div class="app-icon">
				<div class="addbook_status">
					<a class="action return_to_list" href="<?php echo ROOT_DOMAIN."/?site=admin&view=book&action=list_book_cat";?>"><i class="fa fa-arrow-circle-left"></i> Tro ve danh sach</a>
					<a class="action return_to_list" href="<?php echo ROOT_DOMAIN."/?site=admin&view=book&action=add_book";?>"><i class="fa fa-edit"></i> Them sach</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!--/Admin Main page-->
<script src="public/js/addbook_validate.js"></script>