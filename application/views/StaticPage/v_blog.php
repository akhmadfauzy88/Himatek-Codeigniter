	<!-- Content -->
	<div class="container-fluid">
		<div class="row justify-content-center">
			
			<div class="col-md-7">
				<div class="card">
				  <div class="card-body">
				    <h3><?php echo htmlspecialchars(strip_tags($posts['judul'])); ?></h3>
				    <small class="no-mg">Posted <?php echo date('j F Y', strtotime($posts['created_at'])) ?> By Admin In <?php if ($posts['category'] == NULL) {
				    	echo "Uncategorized";
				    }else{
				    	echo $cate['nama']; } ?> Category</small>
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
				  <div class="card-body" align="center" style="text-align: left">
				    <h5>Recent Posts</h5>
				    <hr>
				    <?php foreach ($recent as $rc): ?>
				    	<span>[<?php echo date('d F Y', strtotime($rc['created_at'])); ?>] </span><a href="<?php echo site_url('blog/'.$rc['slug']) ?>"><?php echo $rc['judul'] ?></a>
				    	<br>
				    <?php endforeach; ?>
				  </div>
				</div>

				<br>

				<div class="card">
				  <div class="card-body" align="center">
				    <?php if(isset($_SESSION['spicy_chicken'])): ?>
				    	<h5 align="left">Hello <?php echo $_SESSION['spicy_chicken']['nama'] ?></h5>
				    	<hr>
				    	<span class="centered">
				    		<a href="<?php base_url() ?>logout" class="btn btn-danger">
				    			<?php echo form_open('logout') ?>
				    				<?php echo form_input(['name' => 'chicken_wings', 'type' => 'hidden', 'value' => $this->encryption->encrypt('113')])?>
				    				<?php echo form_submit(['value' => 'Logout', 'class' => 'btn btn-danger btn-block']); ?>
				    			<?php echo form_close() ?>
				    		</a>
				    	</span>
				    <?php else: ?>
				    	<h5 align="left">Hello Guest</h5>
				    	<hr>
				    	<span class="centered"><a href="<?php echo base_url() ?>login" class="btn btn-success">Login</a></span>
					<?php endif; ?>
				  </div>
				</div>

			</div>

		</div>
	</div>