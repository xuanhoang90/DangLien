<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo $GLOB->vars['page_title']; ?></title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap 3.3.4 -->
		<script src="public/js/jquery-2.1.4.min.js"></script>
		<link rel="stylesheet" type="text/css" href="public/bootstrap/css/bootstrap.min.css"/>
		<!-- Font Awesome Icons -->
		<link rel="stylesheet" type="text/css" href="public/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="public/css/ionicons.min.css">
		<link rel="stylesheet" type="text/css" href="public/css/style.css">
		<link rel="stylesheet" type="text/css" href="public/x-slider/magic.css">
		<link rel="stylesheet" type="text/css" href="public/x-slider/x-slider.css">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="main-contain">
			<!--Main menu-->
			<div class="menu-chinh">
				<div class="init">
					<div class="logo">
						<a href="<?php echo ROOT_DOMAIN;?>" class="logo-contain"><img src="/public/imgs/logo.png" /></a>
					</div>
					<div class="menu-left">
						<?php 
							if(isset($_SESSION['acc_type']) && $_SESSION['acc_type'] == '1'):
						?>
							<a class="menu-item" href="<?php echo ROOT_DOMAIN;?>/?site=admin"><i class="fa fa-cogs"></i> Admin</a>
						<?php endif; ?>
						<?php 
							if(isset($_SESSION['acc_type']) && $_SESSION['acc_type'] == '2'):
						?>
							<a class="menu-item" href="<?php echo ROOT_DOMAIN;?>/?site=admin"><i class="fa fa-cogs"></i> Admin</a>
						<?php endif; ?>
						<a class="menu-item" href="<?php echo ROOT_DOMAIN;?>"><i class="fa fa-home"></i> Home</a>
						<a class="menu-item" href="<?php echo ROOT_DOMAIN;?>">Book Category</a>
						<a class="menu-item" href="<?php echo ROOT_DOMAIN;?>">About</a>
						<a class="menu-item" href="<?php echo ROOT_DOMAIN;?>">Contact</a>
					</div>
					<div class="menu-right">
						<div class="search-form">
							<form action="<?php echo ROOT_DOMAIN;?>?site=home&action=search" method="GET">
								<input type="hidden" name="site" value="home" />
								<input type="hidden" name="action" value="search" />
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
									<?php if($_SESSION['acc_type'] == '3' || $_SESSION['acc_type'] == '2'): ?><a class="item" href="<?php echo ROOT_DOMAIN;?>?site=user&action=info">Tai khoan</a><?php endif; ?>
									<?php if($_SESSION['acc_type'] == '3'): ?><a class="item" href="<?php echo ROOT_DOMAIN;?>?site=user&action=borrowlist">Sach muon</a><?php endif; ?>
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