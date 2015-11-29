<!--Admin Main page-->
<div class="trangchuquantri">
	<div class="init">
		<?php include "public/html/admin_sidebar.php"; ?>
		<div class="quickstart">
			<!--Thong ke va cac bieu tuong truy cap nhanh vao chuc nang-->
			<p class="title"><a href="<?php echo ROOT_DOMAIN."/?site=admin";?>">Admin</a> <i class="fa fa-angle-double-right"></i> <a href="<?php echo ROOT_DOMAIN."/?site=admin&view=book&action=list_borrow&page_number=1";?>"> Danh sach muon sach</a></p>
			<div class="app-icon">
				<?php if($borrowList): 
					$stt = $GLOB->TableStart;
					$bookObject = new Book();
					$userObject = new Member();
				?>
					<div class="bangsach table_borrow">
						<div class="mainrow">
							<p class="table_stt" style="width: 5%;">STT</p>
							<p class="table_tensach" style="width: 25%;">Ten sach</p>
							<p class="table_nguoimuon" style="width: 25%;">Nguoi muon</p>
							<p class="table_svgv" style="width: 15%;">Thong tin</p>
							<p class="table_soluong" style="width: 15%;">So luong sach<br/>hien tai</p>
							<p class="table_thaotac" style="width: 15%;">Thao tac</p>
						</div>
						<?php foreach($borrowList as $oneBorrow):
							//lay ten sach
							$bookName = $bookObject->GetBookName($oneBorrow['book_id']);
							//lay ten user thue sach
							$userName = $userObject->GetUserName($oneBorrow['member_id']);
							//lay thong tin nguoi muon: sinh vien hay giang vien 
							$userSVGV = $userObject->GetUserSVGV($oneBorrow['member_id']);
							//lay so luong sach hien tai con trong kho = so luong nhap vao - so luong da cho thue
							//so luong sach
							$soluong = $bookObject->GetBookNumber($oneBorrow['book_id']);
							$dachothue = $bookObject->GetBookBorrowedNumber($oneBorrow['book_id']);
							$bookNumber = $soluong - $dachothue;
						?>
							<div class="row">
								<p class="table_stt" style="width: 5%;"><?php echo $stt; ?></p>
								<p class="table_tensach" style="width: 25%;"><?php echo $bookName; ?></p>
								<p class="table_nguoimuon" style="width: 25%;"><?php echo $userName; ?></p>
								<p class="table_svgv" style="width: 15%;"><?php echo $userSVGV; ?></p>
								<p class="table_soluong" style="width: 15%;"><?php echo $bookNumber; ?></p>
								<div class="table_thaotac" style="width: 15%;">
									<a class="thaotac chothue" href="<?php echo ROOT_DOMAIN."/?site=admin&view=book&action=apply_borrow&borrow_id=".$oneBorrow['id'];?>"><i class="fa fa-check"></i> Cho thue</a>
									<a class="thaotac xoa" href="<?php echo ROOT_DOMAIN."/?site=admin&view=book&action=delete_borrow&borrow_id=".$oneBorrow['id'];?>"><i class="fa fa-trash"></i> Xoa</a>
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
					echo $html->PhanTrang($GLOB->obj_page_num, $GLOB->obj_page_total, ROOT_DOMAIN."/?site=admin&view=book&action=list_borrow&page_number=");
				?>
				
				<script>
					$(function(){
						//xoa cho thue
						$(".table_borrow").find(".row").find('.table_thaotac').find(".xoa").click(function(e){
							e.preventDefault();
							if(confirm("Ban co chac muon xoa khong?")){
								$(".table_borrow").find(".row").removeClass("delete_this");
								$(this).parent().parent().addClass("delete_this");
								var _ActionLink = $(this).attr("href");
								$.ajax({
									method: "POST",
									url: _ActionLink,
									data: {abc:"1"},
								}).done(function(data){
									data = JSON.parse(data);
									if(data.status == 'success'){
										$(".table_borrow").find(".delete_this").fadeOut(300).remove();
									}else{
										alert("Da xay ra loi, vui long thu lai");
									}
								});
							}
						})
						//cho thue
						$(".table_borrow").find(".row").find('.table_thaotac').find(".chothue").click(function(e){
							e.preventDefault();
							//kiem tra neu so luong sach hien tai = 0 thi khong the cho thue
							var _Soluong = parseInt($(this).parent().parent().find(".table_soluong").html());
							if(_Soluong > 0){
								if(confirm("Ban co chac muon cho thue khong?")){
									$(".table_borrow").find(".row").removeClass("delete_this");
									$(this).parent().parent().addClass("delete_this");
									var _ActionLink = $(this).attr("href");
									$.ajax({
										method: "POST",
										url: _ActionLink,
										data: {abc:"1"},
									}).done(function(data){
										data = JSON.parse(data);
										if(data.status == 'success'){
											$(".table_borrow").find(".delete_this").fadeOut(300).remove();
										}else{
											alert("Da xay ra loi, vui long thu lai");
										}
									});
								}
							}else{
								alert("Sach nay da cho thue het");
							}
						})
					})
				</script>
			</div>
		</div>
	</div>
</div>
<!--/Admin Main page-->