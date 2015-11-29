<!--Admin Main page-->
<div class="trangchuquantri">
	<div class="init">
		<?php include "public/html/admin_sidebar.php"; ?>
		<div class="quickstart">
			<!--Thong ke va cac bieu tuong truy cap nhanh vao chuc nang-->
			<p class="title"><a href="<?php echo ROOT_DOMAIN."/?site=admin";?>">Admin</a> <i class="fa fa-angle-double-right"></i> Danh muc sach</p>
			<div class="app-icon">
				<?php if($listBook): 
				
					$stt = $GLOB->TableStart;
				
				?>
					<div class="bangsach">
						<div class="mainrow table_danhmucsach">
							<p class="table_stt" style="width: 10%;">STT</p>
							<p class="table_danhmuc" style="width: 60%;">Ten sach</p>
							<p class="table_thaotac" style="width: 30%;">Thao tac</p>
						</div>
						<?php foreach($listBook as $oneBook):
							$danhmuc = $oneBook['name'];
							$id_danhmuc = $oneBook['id'];
						?>
							<div class="row">
								<p class="table_stt" style="width: 10%;"><?php echo $stt; ?></p>
								<p class="table_danhmuc" style="width: 60%;"><a href="<?php echo ROOT_DOMAIN."/?site=admin&view=book&action=list_book&book_cat=".$id_danhmuc."&page_number=1";?>"><?php echo $danhmuc; ?></a></p>
								<div class="table_thaotac" style="width: 30%;">
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