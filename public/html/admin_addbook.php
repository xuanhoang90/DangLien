<!--Admin Main page-->
<div class="trangchuquantri">
	<div class="init">
		<?php include "public/html/admin_sidebar.php"; ?>
		<div class="quickstart">
			<!--Thong ke va cac bieu tuong truy cap nhanh vao chuc nang-->
			<p class="title">Thêm sách</p>
			<div class="app-icon">
				<div class="form-add-book"><form method="POST" action="<?php echo ROOT_DOMAIN."/?site=admin&view=book&action=addbook_process";?>" enctype="multipart/form-data">
					<div class="form-wrap">
						<p class="label">Ten sach</p><input class="input-text book_name" name="book_name" type="text" value="" placeholder="Book name" />
					</div>
					<div class="form-wrap">
						<p class="label">Hinh dai dien</p><input class="input-text" type="file" name="fileToUpload" id="fileToUpload">
					</div>
					<div class="form-wrap">
						<p class="label">Ma so</p><input class="input-text book_code" name="book_code" type="text" value="" placeholder="Ma so" />
					</div>
					<div class="form-wrap">
						<p class="label">The loai</p>
						<select class="theloaisach input-select" name="theloaisach">
							<option value="default">-----------The loai sach----------</option>
							<option value="sach">Sach</option>
							<option value="bao">Bao</option>
							<option value="tapchi">Tap chi</option>
							<option value="sachgk">Sach giao khoa</option>
						</select>
					</div>
					<div class="form-wrap">
						<p class="label">Tac gia</p><input class="input-text book_author" name="book_author" type="text" value="" placeholder="Tac gia" />
					</div>
					<div class="form-wrap">
						<p class="label">Ma ISSN</p><input class="input-text book_issn" name="book_issn" type="text" value="" placeholder="Ma ISSN" />
					</div>
					<div class="form-wrap">
						<p class="label">Ma DDC</p><input class="input-text book_ddc" name="book_ddc" type="text" value="" placeholder="Ma DDC" />
					</div>
					<div class="form-wrap">
						<p class="label">Nam xuat ban</p><input class="input-text book_namxb" name="book_namxb" type="text" value="" placeholder="Nam xuat ban" />
					</div>
					<div class="form-wrap">
						<p class="label">Nha xuat ban</p><input class="input-text book_nhaxb" name="book_nhaxb" type="text" value="" placeholder="Nha xuat ban" />
					</div>
					<div class="form-wrap">
						<p class="label">So trang</p><input class="input-text book_sotrang" name="book_sotrang" type="text" value="" placeholder="So trang" />
					</div>
					<div class="form-wrap">
						<p class="label">Kich thuoc</p><input class="input-text book_size" name="book_size" type="text" value="" placeholder="Kich thuoc" />
					</div>
					<div class="form-wrap">
						<p class="label">So luong</p><input class="input-text book_soluong" name="book_soluong" type="text" value="" placeholder="So luong" />
					</div>
					<div class="form-wrap">
						<p class="label">Gia</p><input class="input-text book_price" name="book_price" type="text" value="" placeholder="Gia" />
					</div>
					<div class="form-wrap">
						<p class="label">Ngon ngu</p>
						<select class="ngonngu input-select" name="ngonngu">
							<option value="default">-----------Ngon ngu----------</option>
							<option value="vi">Tieng Viet</option>
							<option value="en">English</option>
						</select>
					</div>
					<div class="form-wrap">
						<p class="label">Tu khoa</p><input class="input-text book_keyword" name="book_keyword" type="text" value="" placeholder="Tu khoa" />
					</div>
					<div class="form-wrap">
						<p class="label">Chu de</p>
						<select class="chudesach input-select" name="chudesach">
							<option value="default">-----------Chu de----------</option>
							<?php //load chu de sach
								$html = new HtmlOutput();
								echo $html->Theloaisach();
								//se tu dong load danh sach cac chu de co trong database ra de chon
							?>
						</select>
					</div>
					<div class="form-wrap">
						<p class="label">Tom tat</p>
						<textarea name="book_description" class="input-area book_description" placeholder="Tom tat" value=""></textarea>
					</div>
					<div class="form-wrap">
						<p class="label">Kho luu tru</p>
						<select class="kholuutru input-select" name="kholuutru">
							<option value="default">-----------Kho luu tru----------</option>
							<option value="1">Kho 1</option>
							<option value="2">Kho 2</option>
						</select>
					</div>
					
					<input class="form-submit" type="submit" name="submit" value="Go" />
				</form></div> 
			</div>
		</div>
	</div>
</div>
<!--/Admin Main page-->
<script src="public/js/addbook_validate.js"></script>