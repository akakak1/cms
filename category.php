

<!--
NOTE: This file has been created after creating the index.php completely, thats why the individual posts link are
taking to the desired post page
-->

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
    
                    if(isset($_GET['category'])){
                        $the_post_category_id = $_GET['category'];
                    }

                    $query = "SELECT * FROM posts WHERE post_category_id={$the_post_category_id}";
                    $all_posts = mysqli_query($connection,$query);

                    while($row = mysqli_fetch_assoc($all_posts)){
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = substr($row['post_content'], 0,100) . " ...."; //Excerpt
                        
                ?>
                
                    <h2>
                        <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a>
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


                <!-- Pager --> <!-- removed -->
                

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php  include "includes/sidebar.php" ?>    <!-- NOTE: this sidebar is shared by index,post and category -->        
            

        </div>
        <!-- /.row -->

        <hr>

<?php  include "includes/footer.php" ?>