	<!-- Content -->
	<script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
    <script>
        tinymce.init({
        selector: 'textarea',
        menubar : 'false'
        });
    </script>
	<div class="container-fluid">
		<div class="row justify-content-center">
			
			<div class="col-md-7">
				<div class="card">
				  <div class="card-body">
				  	
				  	<h3>Edit Posts | <?php echo htmlspecialchars(strip_tags($posts['judul'])) ?></h3>
				  	<hr>
				  	<?php $error =  $this->session->flashdata('message');?>
				  	<div class="notif">
				  		<?php if(isset($error)): ?>
				  		<div class="alert alert-danger" role="alert">
						  <?php echo $error; ?>
						</div>
						<?php endif ?>
				  	</div>

				  	<?php echo form_open('posts/edit'); ?>
	                <?php echo form_input(['name' => 'id', 'type' => 'hidden', 'value' =>  $posts['id']]); ?>
	                    <?php echo form_input(['name' => 'judul', 'class' => 'form-control', 'value' =>  $posts['judul'] , 'style' => 'margin:0 0 5px 0']); ?>
	                    <?php echo form_input(['name' => 'slug', 'class' => 'form-control', 'value' => $posts['slug'], 'style' => 'margin:0 0 5px 0']); ?>
	                    <select name="category" class="form-control" style="margin:0 0 5px 0" placeholder="">
	                        <?php foreach($category as $cat): ?>
	                            <option value="<?php echo $cat['id'] ?>" <?php if($cate['id'] == $cat['id']){echo "selected";} ?>><?php echo $cat['nama'] ?></option>
	                        <?php endforeach; ?>
	                    </select>
	                    <?php echo form_textarea(['name' => 'body', 'class' => 'form-control', 'value' => $posts['body'], 'style' => 'margin:0 0 5px 0']); ?>
	                    <?php echo form_submit(['value' => 'Update', 'class' => 'btn btn-primary btn-block', 'style' => 'margin-top:5px;']); ?>
	                <?php echo form_close(); ?>

				  </div>
				</div>	
			</div>

		</div>
	</div>