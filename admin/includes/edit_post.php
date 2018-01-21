


<!--FILL EDIT POST FORM PHP-->
<?php  
    if(isset($_GET['p_id'])){
        $post_id_edit = $_GET['p_id'];
        
        $query = "SELECT * FROM posts WHERE post_id={$post_id_edit}";
        $edit_post = mysqli_query($connection,$query);

        $row = mysqli_fetch_assoc($edit_post);
        
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_status = $row['post_status'];
        $post_content = $row['post_content'];
        $post_category_id = $row['post_category_id'];
        $post_comment_count = $row['post_comment_count'];
        $post_content = $row['post_content'];
        
    }
?>
  

  
  
  <form action="" method="post" enctype="multipart/form-data">
   
    <div class="form-group">
    <label for="title">Post title</label>
    <input type="text" class="form-control" name="title" value="<?php echo $post_title; ?>" >
    </div>
    
    
    
    
    <div class="form-group">
    <label for="post_category">Post category</label> <br/> 
    <select name=post_category>  <!--DONE: being used in $_POST -->
        <?php 
        
            $query = "SELECT * FROM categories";
            $all_categories = mysqli_query($connection,$query);

            while($row = mysqli_fetch_assoc($all_categories)){
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                
                echo"<option ";
                if($post_category_id == $cat_id){echo "selected ";} // DONE : There is category column in posts table, there is no category_id ... we used Reltion to do this
                echo "value='{$cat_id}'>{$cat_title}</option>";
                
            }
        ?>
        
    </select>
    </div>
    
    
    
    
    <div class="form-group">
    <label for="author">Post Author</label>
    <input type="text" class="form-control" name="author" value="<?php echo $post_author; ?>">
    </div>
    
    
    
    
    <div class="form-group">
    <label for="post_status">Post Status</label>
    <input type="text" class="form-control" name="post_status" value="<?php echo $post_status; ?>">
    </div>
    
    
    
    
    <div class="form-group">
    <label for="post_image">Post Image</label>
    <input type="file" name="image">
    <img width=100 height=33 src="../images/<?php echo $post_image ?>" alt="">  <!--NOTE: Images are outside of admin folder-->
    </div>
    
    

    
    <div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags; ?>">
    </div>
    
    
    
    
    <div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea class="form-control" name="post_content" id="" cols="30" rows="10"><?php echo $post_content;?></textarea> <!--NO INDENTATION-->
    </div>
    
    
    
    <div class="form-group">
    <input type="submit" class="btn btn-primary" name="update_post" value="UPDATE">
    </div>
    
</form>




<!--EDIT POST PHP-->
<?php 

    if(isset($_POST['update_post'])){
        
        $update_id_edit = $_GET['p_id'];
        
        $post_title = $_POST['title'];
        $post_author = $_POST['author'];
        $post_category_id = $_POST['post_category'];  //We are setting post_category_id from Select-option Value VVI
        $post_status = $_POST['post_status'];
        
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];  //  To specify the location to send the file to
        
        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        $post_date = date('d-m-y'); //Current
        $post_comment_count = 4;  // TODO: Should be Auto ... To be implemented
        
        move_uploaded_file($post_image_temp, "../images/$post_image");
        
        //To display image even after the form is updated.
        if(empty($post_image)){
            $query4 = "SELECT * FROM posts WHERE post_id={$update_id_edit}";  
            $select_image = mysqli_query($connection, $query4);
            $row = mysqli_fetch_assoc($select_image);
            
            $post_image = $row['post_image'];
        }
        
        
        $query = " UPDATE posts SET ";
        $query .= "post_category_id = '{$post_category_id}', ";
        $query .= "post_title = '{$post_title}', ";
        $query .= "post_author = '{$post_author}', ";
        $query .= "post_date = now(), ";
        $query .= "post_image = '{$post_image}', ";
        $query .= "post_content = '{$post_content}', ";
        $query .= "post_tags = '{$post_tags}', ";
        $query .= "post_comment_count = {$post_comment_count}, ";
        $query .= "post_status = '{$post_status}' ";
        $query .= "WHERE post_id = {$update_id_edit} ";
        
        $update_post = mysqli_query($connection, $query);    //TODO: Sanitise the query ....
        confirm($update_post);
        //header("Location:posts.php");   // Better stay on the same page
    }

?>








