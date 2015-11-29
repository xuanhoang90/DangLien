<!--X Slider-->
<div class="x-slider">
	<div class="slider">
		<div class="x-item">
			<img src="/public/imgs/slider/1.png" />
		</div>
		<div class="x-item">
			<img src="/public/imgs/slider/2.jpg" />
		</div>
		<div class="x-item">
			<img src="/public/imgs/slider/3.jpg" />
		</div>
		<div class="x-item">
			<img src="/public/imgs/slider/4.png" />
		</div>
		<div class="x-item">
			<img src="/public/imgs/slider/5.jpg" />
		</div>
	</div>
	<div class="nav-btn">
		<span class="xbtn active"></span>
		<span class="xbtn"></span>
		<span class="xbtn"></span>
		<span class="xbtn"></span>
		<span class="xbtn"></span>
	</div>
	<div class="x-btn">
		<span class="act next"><i class="fa fa-angle-right"></i></span>
		<span class="act prev"><i class="fa fa-angle-left"></i></span>
	</div>
</div>
<!--End XSlider-->

<div class="gioithieusach">
	<div class="init">
		<h1 class="block-title">Book store</h1>
		<div class="booklist">
			<?php
				//load danh sach sach theo kieu sap xep moi nhat
				$book12 = new Book();
				$bookData12 = $book12->LoadListBook12();
				foreach($bookData12 as $oneBook):
			?>
				<div class="book-item">
					<div class="contain-image">
						<img src="<?php echo ROOT_DOMAIN.$oneBook['image']; ?>" />
						<?php if(isset($_SESSION['logined'])): 
							//check xem cuon sach nay user da muon chua
							if(!$book12->CheckBorrow($_SESSION['member_id'], $oneBook['id'])){
								if($book12->CheckAcpt($_SESSION['member_id'], $oneBook['id'])){
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
				echo $html->PhanTrang($GLOB->obj_page_num, $GLOB->obj_page_total, ROOT_DOMAIN."/?page_number=");
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