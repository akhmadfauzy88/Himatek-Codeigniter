	<!-- Content -->
	<div class="container-fluid">
		<div class="row justify-content-center">
			
			<div class="col-md-7">
				<div class="card">
				  <div class="card-body">
				  	<div style="width: 50%; float: left;">
				  		<h3>All Posts</h3>
				  	</div>
				  	<div style="width: 50%; float: left;">
				  		<a href="<?php echo base_url(); ?>posts/create" class="btn btn-success" style="float: right;">Create New Posts</a>
				  	</div>
				  	<hr class="fix">
				  	<?php $error =  $this->session->flashdata('message');?>
				  	<div class="notif">
				  		<?php if(isset($error)): ?>
				  		<div class="alert alert-success" role="alert">
						  <?php echo $error; ?>
						</div>
						<?php endif ?>
				  	</div>
				  	<table class="table">
					  <thead>
					    <tr>
					      <th scope="col">ID</th>
					      <th scope="col">Judul</th>
					      <th scope="col">Body</th>
					      <th scope="col">Aksi</th>
					    </tr>
					  </thead>
					  <tbody>
					    <?php foreach ($posts as $post): ?>
                        <tr>
                        <th scope="row"><?php echo $post['id'] ?></th>
                        <td><?php echo $post['judul'] ?></td>
                        <td>
                            <?php echo substr(htmlspecialchars(strip_tags($post['body'])),0,50) ?>
                            <?php
                                if (strlen($post['body']) > "50") {
                                    echo "...";
                                } else {
                                    echo "";
                                }
                            ?>
                        </td>
                        	<td><a href="<?php echo site_url('posts/view/'.$post['id']) ?>" class="btn btn-primary">View</a></td>
                        </tr>
                    	<?php endforeach; ?>
					  </tbody>
					</table>

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