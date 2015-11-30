<!--Admin Main page-->
<div class="trangchuquantri">
	<div class="init">
		<?php include "public/html/admin_sidebar.php"; ?>
		<div class="quickstart">
			<!--Thong ke va cac bieu tuong truy cap nhanh vao chuc nang-->
			<p class="title">Sua sách</p>
			<div class="app-icon">
				<div class="form-add-book"><form method="POST" action="<?php echo ROOT_DOMAIN."/?site=admin&view=book&action=editbook_process";?>" enctype="multipart/form-data">
					<input class="book_old_image" name="book_old_image" type="hidden" value="<?php echo $data['image']; ?>"/>
					<input class="book_id" name="book_id" type="hidden" value="<?php echo $data['id']; ?>"/>
					<div class="form-wrap">
						<p class="label">Ten sach</p><input class="input-text book_name" name="book_name" type="text" value="<?php echo $data['name']; ?>" placeholder="Book name" />
					</div>
					<?php if($data['image'] != ''): ?>
					<div class="form-wrap">
						<p class="label">&nbsp;</p><img class="input-text image_preview" src="<?php echo ROOT_DOMAIN."/".$data['image']; ?>" />
					</div>
					<?php endif; ?>
					<div class="form-wrap">
						<p class="label">Hinh dai dien</p><input class="input-text" type="file" name="fileToUpload" id="fileToUpload">
					</div>
					<div class="form-wrap">
						<p class="label">Ma so</p><input class="input-text book_code" name="book_code" type="text" value="<?php echo $data['maso_sach']; ?>" placeholder="Ma so" />
					</div>
					<div class="form-wrap">
						<p class="label">The loai</p>
						<select class="theloaisach input-select" name="theloaisach">
							<option value="default">-----------The loai sach----------</option>
							<?php
								//luu lai cac cap gia tri vao 1 chuoi~
								//o day khi load lai the loai, thi cai ma ta da chon cho sach nay la $data['theloai']
								//ta co 3 the loai: sach, bao chi, sach giao khoa
								//gio kiem tra tung cai 1 xem gia tri cua no co giong voi cai ta da chon hay ko, nhu vay se viet ddai` dong
								//ta luu ca 3 cai vao 1 mang va echo no ra lan luot, trong khi echo thi kiem tra xem gia tri cua no co giong cai ma ta da chon truoc do hay ko
								//neu giong thi echo them selected='true', ko thi thoi
								$tmp_theloai = array(
									'sach' => 'Sach',
									'bao' => 'Bao',
									'tapchi' => 'Tap chi',
									'sachgk' => 'Sach giao khoa',
								);
								//gio kiem tra xem gia tri da chon truoc do la gi va cho no trang thai selected
								$selected = $data['theloai'];
								foreach($tmp_theloai as $key=>$value){
									if($key == $selected){
										$checked = "selected='true'";
									}else{
										$checked = "";
									}
									echo '<option '.$checked.' value="'.$key.'">'.$value.'</option>';
								}
							?>
						</select>
					</div>
					<div class="form-wrap">
						<p class="label">Tac gia</p><input class="input-text book_author" name="book_author" type="text" value="<?php echo $data['author']; ?>" placeholder="Tac gia" />
					</div>
					<div class="form-wrap">
						<p class="label">Ma ISSN</p><input class="input-text book_issn" name="book_issn" type="text" value="<?php echo $data['ma_issn']; ?>" placeholder="Ma ISSN" />
					</div>
					<div class="form-wrap">
						<p class="label">Ma DDC</p><input class="input-text book_ddc" name="book_ddc" type="text" value="<?php echo $data['ma_ddc']; ?>" placeholder="Ma DDC" />
					</div>
					<div class="form-wrap">
						<p class="label">Nam xuat ban</p><input class="input-text book_namxb" name="book_namxb" type="text" value="<?php echo $data['namsanxuat']; ?>" placeholder="Nam xuat ban" />
					</div>
					<div class="form-wrap">
						<p class="label">Nha xuat ban</p><input class="input-text book_nhaxb" name="book_nhaxb" type="text" value="<?php echo $data['nhasanxuat']; ?>" placeholder="Nha xuat ban" />
					</div>
					<div class="form-wrap">
						<p class="label">So trang</p><input class="input-text book_sotrang" name="book_sotrang" type="text" value="<?php echo $data['sotrang']; ?>" placeholder="So trang" />
					</div>
					<div class="form-wrap">
						<p class="label">Kich thuoc</p><input class="input-text book_size" name="book_size" type="text" value="<?php echo $data['kichthuoc']; ?>" placeholder="Kich thuoc" />
					</div>
					<div class="form-wrap">
						<p class="label">So luong</p><input class="input-text book_soluong" name="book_soluong" type="text" value="<?php echo $data['number']; ?>" placeholder="So luong" />
					</div>
					<div class="form-wrap">
						<p class="label">Gia</p><input class="input-text book_price" name="book_price" type="text" value="<?php echo $data['price']; ?>" placeholder="Gia" />
					</div>
					<div class="form-wrap">
						<p class="label">Ngon ngu</p>
						<select class="ngonngu input-select" name="ngonngu">
							<option value="default">-----------Ngon ngu----------</option>
							<?php
								$tmp_ngonngu = array(
									'vi' => 'Tieng Viet',
									'en' => 'English',
								);
								//gio kiem tra xem gia tri da chon truoc do la gi va cho no trang thai selected
								$selected = $data['ngonngu'];
								foreach($tmp_ngonngu as $key=>$value){
									if($key == $selected){
										$checked = "selected='true'";
									}else{
										$checked = "";
									}
									echo '<option '.$checked.' value="'.$key.'">'.$value.'</option>';
								}
							?>
						</select>
					</div>
					<div class="form-wrap">
						<p class="label">Tu khoa</p><input class="input-text book_keyword" name="book_keyword" type="text" value="<?php echo $data['tukhoa']; ?>" placeholder="Tu khoa" />
					</div>
					<div class="form-wrap">
						<p class="label">Chu de</p>
						<select class="chudesach input-select" name="chudesach">
							<option value="default">-----------Chu de----------</option>
							<?php //load chu de sach
								$html = new HtmlOutput();
								echo $html->Theloaisach($data['parent']);
							?>
						</select>
					</div>
					<div class="form-wrap">
						<p class="label">Tom tat</p>
						<textarea name="book_description" class="input-area book_description" placeholder="Tom tat"><?php echo $data['description']; ?></textarea>
					</div>
					<div class="form-wrap">
						<p class="label">Kho luu tru</p>
						<select class="kholuutru input-select" name="kholuutru">
							<option value="default">-----------Kho luu tru----------</option>
							<?php
								$tmp_kholuutru = array(
									'1' => 'Kho 1',
									'2' => 'Kho 2',
								);
								//gio kiem tra xem gia tri da chon truoc do la gi va cho no trang thai selected
								$selected = $data['kholuutru'];
								foreach($tmp_kholuutru as $key=>$value){
									if($key == $selected){
										$checked = "selected='true'";
									}else{
										$checked = "";
									}
									echo '<option '.$checked.' value="'.$key.'">'.$value.'</option>';
								}
							?>
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