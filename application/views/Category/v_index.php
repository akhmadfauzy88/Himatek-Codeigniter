    <!-- Content -->
    <div class="container-fluid">
        <div class="row justify-content-center">
            
            <div class="col-md-7">
                <div class="card">
                  <div class="card-body">
                    <h3>All Categories</h3>
                    <hr>
                    
                    <?php $message =  $this->session->flashdata('message');?>
                    <div class="notif">
                        <?php if(isset($message)): ?>
                        <div class="alert alert-success" role="alert">
                          <?php echo $message; ?>
                        </div>
                        <?php endif ?>
                    </div>
                    
                    <?php $message0 =  $this->session->flashdata('message0');?>
                    <div class="notif">
                        <?php if(isset($message0)): ?>
                        <div class="alert alert-danger" role="alert">
                          <?php echo $message0; ?>
                        </div>
                        <?php endif ?>
                    </div>
                    
                    <table class="table" >
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Category</th>
                          <th scope="col">Created At</th>
                          <th scope="col">Updated At</th>
                          <th scope="col">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($cat as $category): ?>
                        <tr>
                        <td style="vertical-align: middle;"><?php echo $category['id'] ?></th>
                        <td style="vertical-align: middle;"><?php echo $category['nama'] ?></td>
                        <td style="vertical-align: middle;"><?php echo date('j F Y H:i:s', strtotime($category['created_at'])); ?></td>
                        <td style="vertical-align: middle;"><?php echo date('j F Y H:i:s', strtotime($category['updated_at'])); ?></td>
                        <td>
                            <?php echo form_open('categories/update') ?>
                                <?php echo form_input(['name' => 'id', 'type' => 'hidden', 'value' => $category['id']])?>
                                <?php echo form_input(['name' => 'cate', 'class' => 'form-control', 'style' => 'margin: 0 0 5px 0; width:50%'])?>
                                <?php echo form_submit(['value' => 'Update', 'class' => 'btn btn-warning', 'style' => 'width:25%;']); ?>
                                <a href="<?php echo site_url('categories/delete/'.$category['id']) ?>" class="btn btn-danger" style="width: 25%">Delete</a>
                            <?php echo form_close() ?>
                        </td>
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
                    <h5 align="left">Create New Category</h5>
                    <hr>
                    <?php $error =  $this->session->flashdata('error');?>
                    <div class="notif">
                        <?php if(isset($error)): ?>
                        <div class="alert alert-danger" role="alert">
                          <?php echo $error; ?>
                        </div>
                        <?php endif ?>
                    </div>
                    <?php echo form_open('categories/store') ?>
                        <?php echo form_input(['name' => 'category', 'class' => 'form-control', 'style' => 'margin: 0 0 5px 0'])?>
                        <?php echo form_submit(['value' => 'Create', 'class' => 'btn btn-success btn-block']); ?>
                    <?php echo form_close() ?>
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