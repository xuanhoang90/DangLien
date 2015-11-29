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
								<p class="table_tensach" style="width: 20%;"><img style="width: 30px;height: 30px; padding: 2px; border: 1px solid #d4d4d4;" src="<?php echo ROOT_DOMAIN.$hinh;?>" /> <?php echo $tensach; ?></p>
								<p class="table_tacgia" style="width: 15%;"><?php echo $tacgia; ?></p>
								<p class="table_nhaxb" style="width: 15%;"><?php echo $nhaxb; ?></p>
								<p class="table_namxb" style="width: 5%;"><?php echo $namxb; ?></p>
								<p class="table_sotrang" style="width: 5%;"><?php echo $sotrang; ?></p>
								<p class="table_chude" style="width: 15%;"><?php echo $chude; ?></p>
								<p class="table_soluong" style="width: 5%;"><?php echo $soluong; ?></p>
								<div class="table_thaotac" style="width: 15%;">
									<a class="thaotac sua" href="<?php echo ROOT_DOMAIN."/?site=admin&view=book&action=edit_book&book_id=".$oneBook['id'];?>"><i class="fa fa-edit"></i> Sua</a>
									<a class="thaotac xoa" href="<?php echo ROOT_DOMAIN."/?site=admin&view=book&action=delete_book&book_id=".$oneBook['id'];?>"><i class="fa fa-trash"></i> Xoa</a>
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
				
				<script>
					$(function(){
						//xoa sach
						$(".bangsach").find(".row").find('.table_thaotac').find(".xoa").click(function(e){
							e.preventDefault();
							if(confirm("Ban co chac muon xoa sach khong?")){
								$(".bangsach").find(".row").removeClass("delete_this");
								$(this).parent().parent().addClass("delete_this");
								var _ActionLink = $(this).attr("href");
								$.ajax({
									method: "POST",
									url: _ActionLink,
									data: {abc:"1"},
								}).done(function(data){
									data = JSON.parse(data);
									if(data.status == 'success'){
										$(".bangsach").find(".delete_this").fadeOut(300).remove();
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
</div>
<!--/Admin Main page-->