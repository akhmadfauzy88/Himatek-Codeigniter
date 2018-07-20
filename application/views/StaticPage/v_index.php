	<!-- Content -->
	<div class="container-fluid">
		<div class="row justify-content-center">
			
			<div class="col-md-7">
				<div class="card">
				  <div class="card-body">
				  	<?php foreach($posts as $post): ?>
				    	<h3><?php echo $post['judul']; ?></h3>
				    	<small class="no-mg">Posted <?php echo date('j F Y', strtotime($post['created_at'])) ?> By Admin</small>
				    	<hr class="no-mg-top">
				    	<div class="img-featured"></div>
				    	<p class="lead" id="body">
				    		<?php echo substr(htmlspecialchars(strip_tags($post['body'])),0,300); ?>
				    		<?php
                                if (strlen($post['body']) > "300") {
                                    echo "...";
                                } else {
                                    echo "";
                                } 
                            ?>
				    	</p>
				    	<div class="show-post">
							<a class="btn btn-success" href="<?php echo site_url('blog/'.$post['slug']) ?>">Read More</a>
						</div>
				    <?php endforeach; ?>

				  </div>
				</div>	
			</div>
			<div class="col-md-3">
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