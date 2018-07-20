    <!-- Content -->
    <div class="container-fluid">
        <div class="row justify-content-center">
            
            <div class="col-md-7">
                <div class="card">
                  <div class="card-body">
                    <h3>Post preview | <?php echo htmlspecialchars(strip_tags($posts['judul'])); ?></h3>
                    <hr>
                    
                    <p class="lead">
                        <?php echo htmlspecialchars(strip_tags($posts['body'])); ?>
                    </p>

                    <hr>
                    <label>URL => <a href="<?php echo site_url('blog/'.$posts['slug']) ?>" target="_blank"><?php echo site_url('blog/'.$posts['slug']) ?></a> </label>
                    <br>
                    <label>Category => <?php if($posts['category'] == NULL){
                        echo "Uncategorized";
                    }else{
                        echo $cate['nama'];
                    } //echo $posts['category'];
                    ?> </label>
                    <br>
                    <label>Upload => <?php echo date('j F Y H:i:s', strtotime($posts['created_at'])); ?></label>
                    <br>
                    <label>Edit => <?php echo date('j F Y H:i:s', strtotime($posts['updated_at'])); ?></label>
                    <br>
                    <a href="<?php echo site_url('posts/edit/'.$posts['id']) ?>" class="btn btn-primary btn-block">Edit</a>
                    <a href="<?php echo site_url('posts/delete/'.$posts['id']) ?>" class="btn btn-danger btn-block">Delete</a>
                    <hr>

                  </div>
                </div>  
            </div>

        </div>
    </div>