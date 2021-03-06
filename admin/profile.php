<?php  include "includes/admin_header.php"?>
    

<?php 
    if(isset($_SESSION['username'])) {
        
        $username = $_SESSION['username'];
        
        $query = "SELECT * FROM users WHERE username = '{$username}'";
        
        $query_users = mysqli_query($connection, $query);
        
        while($row = mysqli_fetch_array($query_users)) {
                $user_id = $row['user_id'];
                $username = $row['username'];
                $user_password = $row['user_password'];
                $user_firstname = $row['user_firstname'];
                $user_lastname = $row['user_lastname'];
                $user_email = $row['user_email'];
                $user_image = $row['user_image'];                 // TODO: Later.
                $user_role = $row['user_role'];
        }
        
    }
?>

     
      
<?php

     if(isset($_POST['update_profile'])) {
        
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_role = $_POST['user_role'];
        
//        $post_image = $_FILES['image']['name'];
//        $post_image_temp = $_FILES['image']['tmp_name'];  //  To specify the location to send the file to
        
//        $username = $_POST['username'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        
//        $post_date = date('d-m-y'); //Current
        
//        move_uploaded_file($post_image_temp, "../images/$post_image"); 
        
        $query = " UPDATE users SET ";
        $query .= "user_firstname = '{$user_firstname}', ";
        $query .= "user_lastname = '{$user_lastname}', ";
        $query .= "user_role = '{$user_role}', ";
        //$query .= "username = '{$username}', ";              // NOT ALLOWING THE USER TO CHANGE USERNAME.
        $query .= "user_email = '{$user_email}', ";
        $query .= "user_password = '{$user_password}' ";
        $query .= "WHERE username = '{$username}' ";
        
        $update_user = mysqli_query($connection, $query);    //TODO: Sanitise the query ....
        confirm($update_user);
        //header("Location:posts.php");   // Better stay on the same page
    }


?>
   


   
    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">

                       <h1 class="page-header">
                             Welcome to Admin
                            <small><?php echo $username; ?></small>
                       </h1>
                        
                       
                       <form action="" method="post" enctype="multipart/form-data">
   
                            <div class="form-group">
                            <label for="author">Firstname</label>
                            <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname ?>" >
                            </div>

                            <div class="form-group">
                            <label for="post_status">Lastname</label>
                            <input type="text" class="form-control" name="user_lastname"  value="<?php echo $user_lastname ?>" >
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
                                <option value="<?php echo $user_role ?>"><?php echo $user_role ?></option>
                                <?php 
                                 if($user_role == 'admin') {
                                     echo "<option value='subscriber'>subscriber</option>" ;
                                 } else {
                                    echo "<option value='admin'>admin</option>" ;
                                 }
                               ?>
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
                            <input type="email" class="form-control" name="user_email"  value="<?php echo $user_email ?>" >
                            </div>

                            
                            
<!--
                            NOT ALLOWING THE USER TO CHANGE THE USERNAME as we are using this as session and do all work.
                            <div class="form-group">
                            <label for="post_tags">Username</label>
                            <input type="text" class="form-control" name="username"  value="<?php echo $username ?>" >
                            </div>
-->


                           
                            <div class="form-group">
                            <label for="post_content">Password</label> 
                            <input type="password" class="form-control" name="user_password" value="<?php echo $user_password ?>">
                            </div>


                            <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="update_profile" value="Update Profile">
                            </div>

                        </form>
                       

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


<?php include "includes/admin_footer.php"?>