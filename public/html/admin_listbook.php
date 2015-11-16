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
			<?php 
				$tmp_cat = $_REQUEST['book_cat'];
				$tmp_catname = $BOOK->ChudeSach($tmp_cat);
			?>
			<p class="title"><a href="<?php echo ROOT_DOMAIN."/?site=admin";?>">Admin</a> <i class="fa fa-angle-double-right"></i> <a href="<?php echo ROOT_DOMAIN."/?site=admin&view=book&action=list_book_cat&page_number=1";?>"> Danh sach danh muc</a> <i class="fa fa-angle-double-right"></i> <a href="<?php echo ROOT_DOMAIN."/?site=admin&view=book&action=list_book&book_cat=".$tmp_cat."&page_number=1";?>"><?php echo $tmp_catname; ?></a></p>
			<div class="app-icon">
				<?php if($listBook): 
				
					$stt = $GLOB->TableStart;
				
				?>
					<div class="bangsach">
						<div class="mainrow">
							<p class="table_stt" style="width: 5%;">STT</p>
							<p class="table_tensach" style="width: 20%;">Ten sach</p>
							<p class="table_tacgia" style="width: 15%;">Tac gia</p>
							<p class="table_nhaxb" style="width: 15%;">Nha XB</p>
							<p class="table_namxb" style="width: 5%;">Nam<br/>XB</p>
							<p class="table_sotrang" style="width: 5%;">So<br/>trang</p>
							<p class="table_chude" style="width: 15%;">Chu de</p>
							<p class="table_soluong" style="width: 5%;">So<br/>luong</p>
							<p class="table_thaotac" style="width: 15%;">Thao tac</p>
						</div>
						<?php foreach($listBook as $oneBook):
							$tensach = $oneBook['name'];
							$tacgia = $oneBook['author'];
							$nhaxb = $oneBook['nhaxuatban'];
							$namxb = $oneBook['namxuatban'];
							$hinh = $oneBook['image'];
							$sotrang = $oneBook['sotrang'];
							$chude = $BOOK->ChudeSach($oneBook['parent']);
							$soluong = $oneBook['number'];
							$gia = $oneBook['price'];
							$mota = $oneBook['description'];
							$ngaythem = $oneBook['post_date'];
						?>
							<div class="row">
								<p class="table_stt" style="width: 5%;"><?php echo $stt; ?></p>
								<p class="table_tensach" style="width: 20%;"><?php echo $tensach; ?></p>
								<p class="table_tacgia" style="width: 15%;"><?php echo $tacgia; ?></p>
								<p class="table_nhaxb" style="width: 15%;"><?php echo $nhaxb; ?></p>
								<p class="table_namxb" style="width: 5%;"><?php echo $namxb; ?></p>
								<p class="table_sotrang" style="width: 5%;"><?php echo $sotrang; ?></p>
								<p class="table_chude" style="width: 15%;"><?php echo $chude; ?></p>
								<p class="table_soluong" style="width: 5%;"><?php echo $soluong; ?></p>
								<div class="table_thaotac" style="width: 15%;">
									<a class="thaotac sua" href="#"><i class="fa fa-edit"></i> Sua</a>
									<a class="thaotac xoa" href="#"><i class="fa fa-trash"></i> Xoa</a>
								</div>
							</div>
						<?php 
							$stt++;
							endforeach; 
						?>
					</div>
				<?php else: ?>
					<a class="app-item">Empty</a>
				<?php endif; ?>
				
				<?php
					$html = new HtmlOutput();
					echo $html->PhanTrang($GLOB->obj_page_num, $GLOB->obj_page_total, ROOT_DOMAIN."/?site=admin&view=book&action=list_book&book_cat=".$_REQUEST['book_cat']."&page_number=");
				?>
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