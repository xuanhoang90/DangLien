<div class="gioithieusach">
	<div class="init">
		<h1 class="block-title">Tim kiem: <br/><span style="font-size: 17px; color: black;">Tu khoa: <?php echo $_REQUEST['s_key']; ?></span></h1>
		<div class="booklist">
			<?php
				//load danh sach sach theo kieu sap xep moi nhat
				$bookSearch = new Book();
				$bookData = $bookSearch->SearchBook();
				foreach($bookData as $oneBook):
			?>
				<div class="book-item">
					<div class="contain-image">
						<img src="<?php echo ROOT_DOMAIN.$oneBook['image']; ?>" />
						<?php if(isset($_SESSION['logined'])): 
							//check xem cuon sach nay user da muon chua
							if(!$bookSearch->CheckBorrow($_SESSION['member_id'], $oneBook['id'])){
								if($bookSearch->CheckAcpt($_SESSION['member_id'], $oneBook['id'])){
									echo '<a class="damuon" href="#"><i class="fa fa-check"></i> Da muon</a>';
								}else{
									echo "<a class='huymuon' href='". ROOT_DOMAIN."/?site=book&action=borrow_book_reject&book_id=".$oneBook['id']."'><i class='fa fa-mail-reply'></i> Huy muon</a>";
								}
							}else{
								echo "<a class='thuesach' href='". ROOT_DOMAIN."/?site=book&action=borrow_book&book_id=".$oneBook['id']."'><i class='fa fa-eyedropper'></i> Muon sach</a>";
							}
						?>
						<?php else: ?>
							<a class="thuesach" href="<?php echo ROOT_DOMAIN."/?site=book&action=borrow_book&book_id=".$oneBook['id'];?>"><i class="fa fa-eyedropper"></i> Muon sach</a>
						<?php endif; ?>
						<!--
						<a class="huymuon" href="<?php echo ROOT_DOMAIN."/?site=book&action=borrow_book_reject&book_id=".$oneBook['id'];?>"><i class="fa fa-mail-reply"></i> Huy muon</a>
						<a class="damuon" href="#"><i class="fa fa-check"></i> Da muon</a>
						-->
					</div>
					<a class="booklink" href="#"><?php echo $oneBook['name']; ?></a>
					<p><?php echo $oneBook['description']; ?></p>
				</div>
			<?php endforeach; ?>
			
			<?php
				$html = new HtmlOutput();
				echo $html->PhanTrang($GLOB->obj_page_num, $GLOB->obj_page_total, ROOT_DOMAIN."/?site=home&action=search&s_key=".$_REQUEST['s_key']."&page_number=");
			?>
		</div>
	</div>
</div>
<script>
	$(function(){
		$(document).on("click", ".book-item .thuesach", function(e){
			e.preventDefault();
			$(".book-item").removeClass("borrow-it");
			$(this).parent().parent().addClass("borrow-it");
			var _BorrowLink = $(this).attr("href");
			if(confirm("Ban se thue cuon sach nay?")){
				//ajax request
				$.ajax({
					method: "POST",
					url: _BorrowLink,
					data: {abc:"1"},
				}).done(function(data){
					data = JSON.parse(data);
					if(data.status == 'success'){
						alert(data.stt);
						$(".borrow-it").find(".thuesach").remove();
						$(".borrow-it").find(".contain-image").append('<a class="huymuon" href="<?php echo ROOT_DOMAIN."/?site=book&action=borrow_book_reject&book_id=".$oneBook['id'];?>"><i class="fa fa-mail-reply"></i> Huy muon</a>');
					}else{
						alert(data.stt);
					}
				});
			}else{
				//do nothing
			}
		})
		$(document).on("click", ".book-item .huymuon", function(e){
			e.preventDefault();
			$(".book-item").removeClass("borrow-it");
			$(this).parent().parent().addClass("borrow-it");
			var _BorrowLink = $(this).attr("href");
			if(confirm("Ban se khong muon cuon sach nay nua?")){
				//ajax request
				$.ajax({
					method: "POST",
					url: _BorrowLink,
					data: {abc:"1"},
				}).done(function(data){
					data = JSON.parse(data);
					if(data.status == 'success'){
						alert(data.stt);
						$(".borrow-it").find(".huymuon").remove();
						$(".borrow-it").find(".contain-image").append('<a class="thuesach" href="<?php echo ROOT_DOMAIN."/?site=book&action=borrow_book&book_id=".$oneBook['id'];?>"><i class="fa fa-eyedropper"></i> Muon sach</a>');
					}else{
						alert(data.stt);
					}
				});
			}else{
				//do nothing
			}
		})
	})
</script>