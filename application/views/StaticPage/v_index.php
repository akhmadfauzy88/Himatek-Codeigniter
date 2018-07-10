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
				    <h5 align="left">Hello Guest</h5>
				    <hr>
				    <span class="centered"><a href="<?php  ?>" class="btn btn-success">Login</a></span>
				  </div>
				</div>	
			</div>

		</div>
	</div>