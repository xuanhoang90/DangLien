<!--Main menu-->
<div class="main-menu">
	<div class="init">
		<div class="logo">
			<a href="#" class="logo-contain"><img src="/public/imgs/logo.png" /></a>
		</div>
		<div class="menu-left">
			<a class="menu-item active" href="#"><i class="fa fa-home"></i> Home</a>
			<a class="menu-item" href="#">Book Category</a>
			<a class="menu-item" href="#">About</a>
			<a class="menu-item" href="#">Contact</a>
		</div>
		<div class="menu-right">
			<div class="search-form">
				<form action="#" method="GET">
					<input class="search-input" type="text" name="s_key" value="" placeholder="Type some thing to search..." /><i class="fa fa-search"></i>
					<input type="submit" name="submit" style="display: none;" value="OK" />
				</form>
			</div>
			<div class="user-area">
				<?php 
					if(isset($_SESSION['logined'])):
				?>
					<a href="#">Hello, Admin</a>
				<?php else: ?>
					<a href="#">Sign in / Sign up</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<!--End Main menu-->
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

<div class="present">
	<div class="init">
		<h1 class="block-title">Book store</h1>
		<div class="booklist">
			<div class="book-item">
				<img src="/public/imgs/test.jpg" />
				<h3>Pro PHP and jQuery</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
			</div>
			<div class="book-item">
				<img src="/public/imgs/test.jpg" />
				<h3>Pro PHP and jQuery</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
			</div>
			<div class="book-item">
				<img src="/public/imgs/test.jpg" />
				<h3>Pro PHP and jQuery</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
			</div>
			<div class="book-item">
				<img src="/public/imgs/test.jpg" />
				<h3>Pro PHP and jQuery</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
			</div>
			<div class="book-item">
				<img src="/public/imgs/test.jpg" />
				<h3>Pro PHP and jQuery</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
			</div>
			<div class="book-item">
				<img src="/public/imgs/test.jpg" />
				<h3>Pro PHP and jQuery</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
			</div>
			<div class="book-item">
				<img src="/public/imgs/test.jpg" />
				<h3>Pro PHP and jQuery</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
			</div>
			<div class="book-item">
				<img src="/public/imgs/test.jpg" />
				<h3>Pro PHP and jQuery</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
			</div>
		</div>
	</div>
</div>

<!--Footer-->
<div class="footer">
	<div class="init">
		<p>Dang Lien Book store</p>
		<p>Copyright @ 2015</p>
	</div>
</div>
<!--End footer-->