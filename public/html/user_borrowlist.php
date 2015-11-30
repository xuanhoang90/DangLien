<!--Admin Main page-->
<div class="trangchuquantri">
	<div class="init">
		<div class="quickstart" style="width: 80% !important; display: block !important; margin: 10px auto !important;">
			<p class="user_borrow_list_title">Danh sach muon sach</p>
			<div class="app-icon">
				<?php if($userBorrowList): 
					$stt = $GLOB->TableStart;
					$bookObject = new Book();
				?>
					<div class="bangsach table_borrow">
						<div class="mainrow">
							<p class="table_stt" style="width: 10%;">STT</p>
							<p class="table_tensach" style="width: 30%;">Ten sach</p>
							<p class="table_trangthai" style="width: 30%;">Tinh trang</p>
							<p class="table_thaotac" style="width: 25%;">Thao tac</p>
						</div>
						<?php foreach($userBorrowList as $oneBorrow):
							//lay ten sach
							$bookName = $bookObject->GetBookName($oneBorrow['book_id']);
							if($oneBorrow['acpt'] == '0'){
								$tinhtrang = 'Dang cho duyet';
							}elseif($oneBorrow['acpt'] == '1'){
								$tinhtrang = 'Da muon';
							}else{
								$tinhtrang = '...';
							}
						?>
							<div class="row">
								<p class="table_stt" style="width: 10%;"><?php echo $stt; ?></p>
								<p class="table_tensach" style="width: 30%;"><?php echo $bookName; ?></p>
								<p class="table_trangthai" style="width: 30%;"><?php echo $tinhtrang; ?></p>
								<div class="table_thaotac" style="width: 25%;">
									<?php if($oneBorrow['acpt'] == '0'): ?><a class="thaotac huymuon" href="<?php echo ROOT_DOMAIN."/?site=book&action=borrow_book_reject&book_id=".$oneBorrow['book_id'];?>"><i class="fa fa-mail-reply"></i> Huy muon</a><?php endif; ?>
									<?php if($oneBorrow['acpt'] == '1'): ?><a class="thaotac damuon" href="#" style="cursor: default;"><i class="fa fa-check"></i> Da muon</a><?php endif; ?>
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
						$(".table_borrow").find(".row").find('.table_thaotac').find(".huymuon").click(function(e){
							e.preventDefault();
							if(confirm("Ban co chac muon huy muon sach khong?")){
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
					})
				</script>
			</div>
		</div>
	</div>
</div>
<!--/Admin Main page-->