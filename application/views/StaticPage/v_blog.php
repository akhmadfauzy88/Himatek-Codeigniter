	<!-- Content -->
	<div class="container-fluid">
		<div class="row justify-content-center">
			
			<div class="col-md-7">
				<div class="card">
				  <div class="card-body">
				    <h3><?php echo htmlspecialchars(strip_tags($posts['judul'])); ?></h3>
				    <small class="no-mg">
				    	<img src="<?php echo base_url();?>assets/img/icon/calendar.png" width="20px"> <?php echo date('j F Y', strtotime($posts['created_at'])) ?> 
				    	<img src="<?php echo base_url();?>assets/img/icon/user.png" width="20px"> <?php echo $author['nama']; ?> 
				    	<img src="<?php echo base_url();?>assets/img/icon/category.png" width="20px"> <?php if ($posts['category'] == NULL) {
				    	echo "Uncategorized";
				    }else{
				    	echo $cate['nama']; } ?> Category</small>
				    <hr class="">
				    <div class="img-featured-post"></div>
				    <p class="lead" id="body">
				    	<?php echo htmlspecialchars(strip_tags($posts['body'])); ?>
				    </p>
				  </div>
				</div>
				<br>
				<div class="card">
				  <div class="card-body">
				    

				    <div class="comment">
					<h3> <?php echo $commen['total']; ?> Comment</h3>

					<?php foreach ($commen['komen'] as $com): ?>
					<div class="comment-show">
						<div class="person">
							<div class="comment-img"></div>
							<h5>
								<?php echo $com['nama']; ?>
								<br>
								<small><?php echo date('j F Y', strtotime($com['created_at'])); ?></small>
							</h5>
						</div>
						<p class="lead">
							<?php echo $com['comment']; ?>
						</p>
					</div>
					<?php endforeach; ?>
					<hr>
					<div class="notif">
						<?php $error =  $this->session->flashdata('message');?>
				  		<?php if(isset($error)): ?>
				  		<div class="alert alert-success" role="alert">
						  <?php echo $error; ?>
						</div>
						<?php endif ?>
				  	</div>
					<?php echo form_open('comment/store') ?>
						<?php echo form_input(['name' => 'id', 'type' => 'hidden', 'value' => $posts['id']])?>
						<?php echo form_input(['name' => 'slug', 'type' => 'hidden', 'value' => $posts['slug']])?>
                        <?php echo form_input(['name' => 'email', 'class' => 'form-control', 'placeholder' => 'Email*', 'style' => 'margin: 0 0 5px 0;'])?>
                        <?php echo form_input(['name' => 'nama', 'class' => 'form-control', 'placeholder' => 'Nama*', 'style' => 'margin: 0 0 5px 0;'])?>
                        <?php echo form_textarea(['name' => 'comment', 'class' => 'form-control', 'placeholder' => 'Komentar*', 'style' => 'margin:0 0 5px 0', 'required' => '']); ?>
                        <?php echo form_submit(['value' => 'Comment', 'class' => 'btn btn-success btn-block']); ?>
                    <?php echo form_close() ?>
                    <small style="color:grey">*Required (Email tidak akan dipublish)</small>
					</div>
				   

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