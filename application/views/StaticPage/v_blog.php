	<!-- Content -->
	<div class="container-fluid">
		<div class="row justify-content-center">
			
			<div class="col-md-7">
				<div class="card">
				  <div class="card-body">
				    <h3><?php echo htmlspecialchars(strip_tags($posts['judul'])); ?></h3>
				    <small class="no-mg">Posted <?php echo date('j F Y', strtotime($posts['created_at'])) ?> By Admin</small>
				    <hr class="no-mg-top">
				    <div class="img-featured-post"></div>
				    <p class="lead" id="body">
				    	<?php echo htmlspecialchars(strip_tags($posts['body'])); ?>
				    </p>
				  </div>
				</div>	
			</div>
			<div class="col-md-3">
				<div class="card">
				  <div class="card-body" align="center">
				    <h5 align="left">Hello Guest</h5>
				    <hr>
				    <span class="centered"><a href="#" class="btn btn-success">Login</a></span>
				  </div>
				</div>	
			</div>

		</div>
	</div>