		<div class="sidebar">
			<!--Menu doc-->
			<p class="title">Admin menu</p>
			<div class="menu">
				<p class="label">Book</p>
				<a class="item" href="<?php echo ROOT_DOMAIN."/?site=admin&view=book&action=list_book_cat";?>"><i class="fa fa-list"></i> Danh sach</a>
				<a class="item" href="<?php echo ROOT_DOMAIN."/?site=admin&view=book&action=add_book";?>"><i class="fa fa-edit"></i> Them</a>
				<p class="label">Danh muc sach</p>
				<a class="item" href="<?php echo ROOT_DOMAIN."/?site=admin&view=book&action=list_book_cat";?>"><i class="fa fa-list"></i> Danh sach</a>
				<a class="item" href="<?php echo ROOT_DOMAIN."/?site=admin&view=book&action=add_book_cat";?>"><i class="fa fa-edit"></i> Them</a>
				<p class="label">Ban doc muon sach</p>
				<a class="item" href="<?php echo ROOT_DOMAIN."/?site=admin&view=book&action=list_borrow";?>"><i class="fa fa-list"></i> Danh sach</a>
				<?php if($_SESSION['acc_type'] == '1'): ?>
				<p class="label">Quan tri vien</p>
				<a class="item" href="<?php echo ROOT_DOMAIN."/?site=admin&view=member&action=list_manager";?>"><i class="fa fa-list"></i> Danh sach</a>
				<a class="item" href="<?php echo ROOT_DOMAIN."/?site=admin&view=member&action=add_manager";?>"><i class="fa fa-edit"></i> Them</a>
				<?php endif; ?>
				<p class="label">Member</p>
				<a class="item" href="<?php echo ROOT_DOMAIN."/?site=admin&view=member&action=list_user";?>"><i class="fa fa-list"></i> Danh sach</a>
				<a class="item" href="<?php echo ROOT_DOMAIN."/?site=admin&view=member&action=unactive_user";?>"><i class="fa fa-unlock-alt"></i> Chua kich hoat</a>
			</div>
		</div>