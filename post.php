<?php  include "includes/db.php" ?>
<?php  include "includes/header.php" ?>
    

   
    <!-- Navigation -->
    <?php  include "includes/navigation.php"?>
    

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                
                
                <!-- TO DISPLAY ALL POSTS -->
                <?php 
                    
                    if(isset($_GET['p_id'])){
                        $the_post_id = $_GET['p_id'];
                    }

                    $query = "SELECT * FROM posts WHERE post_id={$the_post_id}";
                    $all_posts = mysqli_query($connection,$query);

                    while($row = mysqli_fetch_assoc($all_posts)){  // TODO: Since there is only one post we dont need while loop
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];
                        
                ?>
                
                    <h2>
                        <a href="#"><?php echo $post_title ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php"><?php echo $post_author ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                    <hr>
                    <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                    <hr>
                    <p><?php echo $post_content ?></p>
                    <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                    <hr>
                    
                <?php  } ?>
                
                
                
                <!-- Blog Comments -->
                
                
                <!--TO CREATE A COMMENT RELATED TO THE POST-->
                <?php 
                    if(isset($_POST['create_comment'])) {
                        $the_post_id = $_GET['p_id'];
                        
                        $comment_author = $_POST['comment_author'];
                        $comment_email = $_POST['comment_email'];
                        $comment_content = $_POST['comment_content'];
                        
                        $query = "INSERT INTO comments(comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) ";
                        $query .= "VALUES ($the_post_id, '{$comment_author}', '{$comment_email}', '{$comment_content}', 'Unapproved', now())";
                        
                        $create_comment = mysqli_query($connection, $query);
                        
                        if(!$create_comment){
                            die("QUERY FAILED" . mysqli_error($connection));
                        }
                        //TO UPDATE THE COMMENT COUNT
                        $query3 = "UPDATE posts SET post_comment_count = post_comment_count+1 WHERE post_id = {$the_post_id}";
                        mysqli_query($connection, $query3);
                        
                        header("Location:post.php?p_id={$the_post_id}");
                    }
                ?>

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="post">
                       
                       <div class="form-group">
                           <label for="Author">Your name:</label>
                            <input type="text" class="form-control" name="comment_author">
                        </div>
                        
                        <div class="form-group">
                           <label for="Email">Your Email:</label>
                            <input type="email" class="form-control" name="comment_email">
                        </div>
                        
                        <div class="form-group">
                            <label for="Content">Content:</label>
                            <textarea class="form-control" rows="3" name="comment_content"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
                
                
                
                <?php
                    $query3 = "SELECT * FROM comments WHERE comment_post_id={$the_post_id} ";
                    $query3 .= "AND comment_status='Approved' ";
                    $query3 .= "ORDER BY comment_id DESC";
                    
                    $all_comments = mysqli_query($connection, $query3);
                    
                    while($row = mysqli_fetch_assoc($all_comments)){
                        $comment_author =$row['comment_author'];
                        $comment_date = $row['comment_date'];
                        $comment_content = $row['comment_content'];
                ?>

               
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">
                           <?php echo $comment_author; ?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>
                        <?php echo $comment_content; ?>
                    </div>
                </div>

              <?php } ?>
              
               
              <!-- Pager --> <!-- removed -->
                

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php  include "includes/sidebar.php" ?>    <!-- NOTE: this sidebar is shared by index,post and category -->     
            

        </div>
        <!-- /.row -->

        <hr>

<?php  include "includes/footer.php" ?>