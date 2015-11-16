<!--Main menu-->
<div class="menu-chinh">
	<div class="init">
		<div class="logo">
			<a href="<?php echo ROOT_DOMAIN;?>" class="logo-contain"><img src="/public/imgs/logo.png" /></a>
		</div>
		<div class="menu-left">
			<a class="menu-item active" href="<?php echo ROOT_DOMAIN;?>"><i class="fa fa-home"></i> Home</a>
			<a class="menu-item" href="<?php echo ROOT_DOMAIN;?>">Book Category</a>
			<a class="menu-item" href="<?php echo ROOT_DOMAIN;?>">About</a>
			<a class="menu-item" href="<?php echo ROOT_DOMAIN;?>">Contact</a>
		</div>
		<div class="menu-right">
			<div class="search-form">
				<form action="<?php echo ROOT_DOMAIN;?>" method="GET">
					<input class="search-input" type="text" name="s_key" value="" placeholder="Type some thing to search..." /><i class="fa fa-search"></i>
					<input type="submit" name="submit" style="display: none;" value="OK" />
				</form>
			</div>
			<div class="user-area">
				<?php 
					if(isset($_SESSION['logined'])):
				?>
					<a class="title">Hello, admin <i class="fa fa-chevron-down"></i></a>
					<div class="user-menu">
						<a class="item" href="<?php echo ROOT_DOMAIN;?>">Tai khoan</a>
						<a class="item" href="<?php echo ROOT_DOMAIN;?>?site=user&action=logout">Thoat</a>
					</div>
				<?php else: ?>
					<a class="title">Thanh vien <i class="fa fa-chevron-down"></i></a>
					<div class="user-menu">
						<a class="item" href="<?php echo ROOT_DOMAIN;?>?site=user&action=login&next=home">Dang nhap</a>
						<a class="item" href="<?php echo ROOT_DOMAIN;?>?site=user&action=register">Dang ky</a>
						<hr/>
						<a class="item" href="<?php echo ROOT_DOMAIN;?>/?site=user&action=login&next=dashboard">Admin login</a>
						<a class="item" href="<?php echo ROOT_DOMAIN;?>/?site=user&action=login&next=dashboard">Smod login</a>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<!--End Main menu-->

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

<!--Footer-->
<div class="footer">
	<div class="init">
		<p>Dang Lien Book store</p>
		<p>Copyright @ 2015</p>
	</div>
</div>
<!--End footer-->