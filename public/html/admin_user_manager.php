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
			<p class="title"><a href="<?php echo ROOT_DOMAIN."/?site=admin";?>">Admin</a> <i class="fa fa-angle-double-right"></i> <a href="<?php echo ROOT_DOMAIN."/?site=admin&view=member&action=list_manager&page_number=1";?>"> Danh sach quan tri vien</a> </p>
			<div class="app-icon">
				<?php if($memberList): 
				
					$stt = $GLOB->TableStart;
				
				?>
					<div class="bangsach unactive_user">
						<div class="mainrow">
							<p class="table_stt" style="width: 10%;">STT</p>
							<p class="table_useracc" style="width: 30%;">Member ID</p>
							<p class="table_act" style="width: 30%;">Thao tac</p>
						</div>
						<?php foreach($memberList as $oneMem):
							$user_id = $oneMem['account'];
							if($oneMem['svgv'] == 'sinhvien'){
								$svgv = "Sinh vien";
							}else{
								$svgv = "Giang vien";
							}
						?>
							<div class="row">
								<p class="table_stt" style="width: 10%;"><?php echo $stt; ?></p>
								<p class="table_useracc" style="width: 30%;"><?php echo $user_id; ?></p>
								<div class="table_thaotac" style="width: 30%;">
									<a class="thaotac xoa" href="<?php echo ROOT_DOMAIN."/?site=admin&view=member&action=delete_user&user_id=".$oneMem['id'];?>"><i class="fa fa-trash"></i> Xoa</a>
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
					echo $html->PhanTrang($GLOB->obj_page_num, $GLOB->obj_page_total, ROOT_DOMAIN."/?site=admin&view=member&action=unactive_user=".$_REQUEST['book_cat']."&page_number=");
				?>
			</div>
			<script>
				$(function(){
					//xoa user
					$(".unactive_user").find(".row").find('.table_thaotac').find(".xoa").click(function(e){
						e.preventDefault();
						if(confirm("Ban co chac muon xoa khong?")){
							$(".unactive_user").find(".row").removeClass("delete_this");
							$(this).parent().parent().addClass("delete_this");
							var _ActionLink = $(this).attr("href");
							$.ajax({
								method: "POST",
								url: _ActionLink,
								data: {abc:"1"},
							}).done(function(data){
								data = JSON.parse(data);
								if(data.status == 'success'){
									$(".unactive_user").find(".delete_this").fadeOut(300).remove();
								}else{
									alert("Da xay ra loi, vui long thu lai");
								}
							});
						}
					})
				})
			</script>
		</div>
	</div>
</div>
<!--/Admin Main page-->