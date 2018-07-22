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
				  	
				  	<h3>Create New Posts</h3>
				  	<hr>
				  	<?php $error =  $this->session->flashdata('message');?>
				  	<div class="notif">
				  		<?php if(isset($error)): ?>
				  		<div class="alert alert-danger" role="alert">
						  <?php echo $error; ?>
						</div>
						<?php endif ?>
				  	</div>

				  	<?php echo form_open('posts/store', ['data-parsley-validate' => '']); ?>
                    	<?php echo form_input(['name' => 'judul', 'class' => 'form-control', 'placeholder' => 'Judul', 'style' => 'margin:0 0 5px 0', 'required' => '', 'minlength' => '5']); ?>
                   		<?php echo form_input(['name' => 'slug', 'class' => 'form-control', 'placeholder' => 'Url (Misal : posting-singkat)', 'style' => 'margin:0 0 5px 0', 'required' => '', 'minlength' => '5']); ?>
                     	<select name="category" class="form-control" style="margin:0 0 5px 0">
                        <?php foreach($category as $cat): ?>
                            <option value="<?php echo $cat['id'] ?>"><?php echo $cat['nama'] ?></option>
                        <?php endforeach; ?>
                    	</select>
                    <?php echo form_textarea(['name' => 'body', 'class' => 'form-control', 'placeholder' => 'Isi Konten', 'style' => 'margin:0 0 5px 0', 'required' => '']); ?>
                    <?php echo form_submit(['value' => 'Post', 'class' => 'btn btn-success btn-block', 'style' => 'margin-top:5px;']); ?>
                	<?php echo form_close(); ?>

				  </div>
				</div>	
			</div>

	</div>