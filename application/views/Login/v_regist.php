<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<div class="card">
				<div class="card-body">
					<h3>Regist</h3>
					<hr>

					<div class="notif">
						<?php $error =  $this->session->flashdata('message');?>
				  		<?php if(isset($error)): ?>
				  		<div class="alert alert-danger" role="alert">
						  <?php echo $error; ?>
						</div>
						<?php endif ?>
				  	</div>
					
					<?php echo form_open('login/user', ['data-parsley-validate' => '']); ?>
						<?php echo form_input(['name' => 'nama', 'class' => 'form-control', 'placeholder' => 'Nama Lengkap', 'id' => 'login', 'required' => '']) ?>
						<?php echo form_input(['name' => 'email', 'class' => 'form-control', 'placeholder' => 'Email', 'id' => 'login', 'required' => '']) ?>
						<?php echo form_password(['name' => 'password', 'class' => 'form-control', 'placeholder' => 'Password', 'id' => 'login', 'required' => '']) ?>
						<?php echo form_password(['name' => 'passwordf', 'class' => 'form-control', 'placeholder' => 'Confirm Password', 'id' => 'login', 'required' => '']) ?>
						<?php echo form_submit(['value' => 'Login', 'class' => 'btn btn-success btn-block']) ?>
					<?php echo form_close(); ?>	
				</div>
			</div>
		</div>
	</div>
</div>