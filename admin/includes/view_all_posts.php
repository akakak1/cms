<?php 

if(isset($_POST['checkBoxArray'])) {              // Here we dont need []
    foreach($_POST['checkBoxArray'] as $checkBoxValue) {        // note: we will get values.
        $bulk_options = $_POST['bulk_options'];
        
        switch($bulk_options) {
            case 'publish':
                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id= {$checkBoxValue}";
                $updated_post = mysqli_query($connection, $query);
                confirm($updated_post);
            
            break;
            case 'draft':
                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id= {$checkBoxValue}";
                $updated_post = mysqli_query($connection, $query);
                confirm($updated_post);
            
            break;
            case 'delete':
                $query = "DELETE FROM posts WHERE post_id= {$checkBoxValue}";     // DELETE *   will give error in mariaDB
                $updated_post = mysqli_query($connection, $query);
                confirm($updated_post);
            
            break;
        }
    }
}


?>

<form action="" method="post">

       <table class="table table-bordered table-hover text-center">

           
           <div id="bulkOptionsContainer" style="padding:0px; margin-bottom: 10px;" class="col-xs-4">    <!-- Why is sb-admin.css not working ?-->
               <select class="form-control" name="bulk_options" id="">
                   <option value="">Select Options</option>
                   <option value="publish">Publish</option>
                   <option value="draft">Draft</option>
                   <option value="delete">Delete</option>
               </select>
           </div>
           
           
           <div class="col-xs-4" id="bulkOptionsButton">
               <input type="submit" class="btn btn-success" value="Apply">
               <a href="posts.php?source=add_post" class="btn btn-primary">Add New</a>
           </div>
           
           
           
            <thead>
                <tr>
                    <th><input id="selectAllBoxes" type="checkbox"></th>
                    <th class="text-center">Id</th>
                    <th class="text-center">Title</th>
                    <th class="text-center">Author</th>
                    <th class="text-center">Category</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Image</th>
                    <th class="text-center">Tags</th>
                    <th class="text-center">Comments</th>
                    <th class="text-center">Date</th>
                    <th class="text-center">View Post</th>
                    <th class="text-center">Edit</th>
                    <th class="text-center">Delete</th>
                </tr>
            </thead>
            <tbody>

                <?php
                    $query = "SELECT * FROM posts ORDER BY post_id DESC";
                    $all_posts = mysqli_query($connection,$query);

                    while($row = mysqli_fetch_assoc($all_posts)){
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_tags = $row['post_tags'];
                        $post_status = $row['post_status'];
                        $post_category_id = $row['post_category_id'];
                        $post_comment_count = $row['post_comment_count'];
                        $post_content = $row['post_content'];


                        echo"<tr>";
                ?>     
                        
                        <td><input type='checkbox' class='checkBox' name='checkBoxArray[]' value='<?php echo $post_id; ?>'></td>
                <?php
                    
                        echo"<td>{$post_id}</td>";
                        echo"<td>{$post_title}</td>";
                        echo"<td>{$post_author}</td>";

                        //To find the category name from categories table for each post.
                        $query2 = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
                        $get_category = mysqli_query($connection, $query2);
                        $row = mysqli_fetch_assoc($get_category);
                        //$cat_id= $row['cat_id'];
                        $cat_title = $row['cat_title'];
                        echo"<td>{$cat_title}</td>";  //DONE: Display category, not id, make Relation


                        echo"<td>{$post_status}</td>";
                        echo"<td><img width='100' height='33' src='../images/{$post_image}'/></td>";
                        echo"<td>{$post_tags}</td>";
                        echo"<td>{$post_comment_count}</td>";
                        echo"<td>{$post_date}</td>";
                        echo"<td><a href='../post.php?p_id={$post_id}'>View</a></td>";
                        echo"<td><a href='posts.php?source=edit_post&p_id={$post_id}'>EDIT</a></td>";
                        echo"<td><a  onClick=\"javascript: return confirm('Delete the post?'); \"  href='posts.php?delete={$post_id}'>DELETE</a></td>";
                        echo"</tr>";
                    }
                ?>

            </tbody>
        </table>
       
</form>
   
   


<!-- DELETE POST PHP -->
<?php   
    if(isset($_GET['delete'])){
        $delete_post_id = $_GET['delete'];
        
        $query3 = "DELETE FROM posts WHERE post_id={$delete_post_id}";
        $delete_query = mysqli_query($connection, $query3);
        header("Location:posts.php");
    }
?>













