<?php 

    if(isset($_POST['create_post'])){
        $post_title = $_POST['title'];
        $post_author = $_POST['author'];
        $post_category_id = $_POST['post_category'];
        $post_status = $_POST['post_status'];
        
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];  //  To specify the location to send the file to
        
        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        $post_date = date('d-m-y'); //Current
        // $post_comment_count = 4;  // Should be Auto ... To be implemented // DONE :Updates when we are posting a comment :)
        
        move_uploaded_file($post_image_temp, "../images/$post_image");
        
        $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) ";
        $query .="VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}')";
        
        $create_post = mysqli_query($connection, $query);    //TODO: Sanitise the query ....
        confirm($create_post);
        
        $new_post_id = mysqli_insert_id($connection);        // This will give the ID of the currnet inserted row ....................  :) 
        
        echo "<p class='bg-success'>Post Craeted <a href='../post.php?p_id={$new_post_id}'>View Post</a></p>";
    }

?>
  

  
<form action="" method="post" enctype="multipart/form-data">
   
    <div class="form-group">
    <label for="title">Post title</label>
    <input type="text" class="form-control" name="title">
    </div>
    
    
    
    
<!--
    <div class="form-group">
    <label for="post_category">Post Category Id</label>
    <input type="text" class="form-control" name="post_category_id">
    </div>
-->
   
   <div class="form-group">
     <label for="post_category">Post category</label> <br/>
     <select name=post_category>
        <?php 
        
            $query = "SELECT * FROM categories";
            $all_categories = mysqli_query($connection,$query);

            while($row = mysqli_fetch_assoc($all_categories)){
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                
                echo"<option ";
                //if($post_id_edit == $cat_id){echo "selected ";}  //  No need when we are creating new post.
                echo "value='{$cat_id}'>{$cat_title}</option>";
                
            }
        ?>
        
     </select>
    </div>
    
    
    
    
    <div class="form-group">
    <label for="author">Post Author</label>
    <input type="text" class="form-control" name="author">
    </div>
    
    
    
    
    <div class="form-group">
    <label for="post_status">Post Status</label> <br/>
    <select name="post_status">
        <option value="draft">Select Status</option>
        <option value="draft">Draft</option>
        <option value="publish">Publish</option>
    </select>
    </div>
    
    
    
    <div class="form-group">
    <label for="post_image">Post Image</label>
    <input type="file" name="image">
    </div>
    
    
    
    
    <div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input type="text" class="form-control" name="post_tags">
    </div>
    
    
    
    
    <div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea class="form-control" name="post_content" id="editor" cols="30" rows="10">
    </textarea>
    </div>
    
    
    
    <div class="form-group">
    
    <input type="submit" class="btn btn-primary" name="create_post" value="Publish">
    </div>
    
</form>




















