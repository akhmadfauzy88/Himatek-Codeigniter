<!DOCTYPE html>
<html>
<!-- Header -->
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/parsley.css">
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url() ?>assets/img/Himatek-Circle.png"/>
	<title>Himatek | <?php echo htmlspecialchars($Judul) ?></title>
</head>

<body>
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-md-10" id="header">
				<a href="<?php echo base_url(); ?>">
					<img src="<?php echo base_url(); ?>assets/img/Himatek-Circle-1.png" class="img-fluid" alt="Responsive image">
				</a>
				<blockquote class="blockquote text-center">
					<p class="mb-0" style="color: #018c16; font-size: 30px;">"Green Your Mind !!"</p>
				</blockquote>
				
				<hr>
				<div class="navi">
					<a href="<?php echo base_url(); ?>">Home</a>
					<a href="<?php echo base_url(); ?>about">About</a>
					<a href="#">Contact</a>
					<a href="#" style="color: grey">HimatekOS</a>
					<hr>
					<?php if(isset($_SESSION['spicy_chicken']) && $_SESSION['spicy_chicken']['logged_in'] == TRUE): ?>
						<br>
						<label style="word-spacing: 1px;">Auth Nav</label>
						<hr>
						<a href="<?php echo base_url(); ?>posts">Posts</a>
						<a href="<?php echo base_url(); ?>categories">Categories</a>					
					<?php endif; ?>
				</div>
				<hr>
			</div>
		</div>
	</div>