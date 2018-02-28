<?php 

    if(isset($_POST['create_user'])) {
        
        
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_role = $_POST['user_role'];
        
//        $post_image = $_FILES['image']['name'];
//        $post_image_temp = $_FILES['image']['tmp_name'];  //  To specify the location to send the file to
        
        $username = $_POST['username'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        
//        $post_date = date('d-m-y'); //Current
        
        
//        move_uploaded_file($post_image_temp, "../images/$post_image");
        
        $query = "INSERT INTO users(user_firstname, user_lastname, user_role, username, user_email, user_password) ";
        $query .="VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_email}','{$user_password}')";
        
        $create_user = mysqli_query($connection, $query);    //TODO: Sanitise the query ....
        confirm($create_user);
    }

?>


  
<form action="" method="post" enctype="multipart/form-data">
   
   
    <div class="form-group">
    <label for="author">Firstname</label>
    <input type="text" class="form-control" name="user_firstname">
    </div>
    
    
    
    <div class="form-group">
    <label for="post_status">Lastname</label>
    <input type="text" class="form-control" name="user_lastname">
    </div>
    
    
    
<!--
    <div class="form-group">
    <label for="post_category">Post Category Id</label>
    <input type="text" class="form-control" name="post_category_id">
    </div>
-->
   
   
   
   <div class="form-group">
     <label for="post_category">User Role</label> <br/>
     <select name=user_role>
       <option value="select_role">Select role</option>
       <option value="admin">Admin</option>
       <option value="subscriber">Subscriber</option>
     </select>
    </div>



<!--
    <div class="form-group">
    <label for="post_image">Post Image</label>
    <input type="file" name="image">
    </div>
-->
    
    
    
    <div class="form-group">
    <label for="post_tags">Email</label>
    <input type="email" class="form-control" name="user_email">
    </div>
    
    
    
    <div class="form-group">
    <label for="post_tags">Username</label>
    <input type="text" class="form-control" name="username">
    </div>
    
    
    
    <div class="form-group">
    <label for="post_content">Password</label>
    <input type="password" class="form-control" name="user_password">
    </div>
    
    
    
    <div class="form-group">
    <input type="submit" class="btn btn-primary" name="create_user" value="Add User">
    </div>
    
    
</form>




















