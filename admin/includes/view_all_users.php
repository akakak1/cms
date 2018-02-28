<table class="table table-bordered table-hover text-center">
    <thead>
        <tr>
            <th class="text-center">Id</th>
            <th class="text-center">Username</th>
            <th class="text-center">Firstname</th>
            <th class="text-center">Lastname</th>
            <th class="text-center">Email</th>
            <th class="text-center">Role</th>
            <th class="text-center">Change Role</th>
            <th class="text-center">EDIT</th>
            <th class="text-center">Delete</th>

        </tr>
    </thead>
    <tbody>
        
        <!--READ ALL COMMENTS PHP-->
        <?php
            $query = "SELECT * FROM users ORDER BY user_id DESC";
            $all_users = mysqli_query($connection,$query);

            while($row = mysqli_fetch_assoc($all_users)){
                $user_id = $row['user_id'];
                $username = $row['username'];
                $user_password = $row['user_password'];
                $user_firstname = $row['user_firstname'];
                $user_lastname = $row['user_lastname'];
                $user_email = $row['user_email'];
                $user_image = $row['user_image'];
                $user_role = $row['user_role'];
                

                echo"<tr>";
                echo"<td>{$user_id}</td>";
                echo"<td>{$username}</td>";
                echo"<td>{$user_firstname}</td>";
                echo"<td>{$user_lastname}</td>";
                echo"<td>{$user_email}</td>";
                echo"<td>{$user_role}</td>";
                echo"<td><select name=user_role>
                           <option value='select_role'>Select role</option>
                           <option value='admin'>Admin</option>
                           <option value='subscriber'>Subscriber</option>
                         </select>
                     </td>";
                
                
                // QUERY TO GET THE POST info RELATED TO THE POST
//                $query = "SELECT * FROM posts WHERE post_id= {$comment_post_id}";
//                $related_post = mysqli_query($connection, $query);
//                $row = mysqli_fetch_assoc($related_post);
//                $post_id= $row['post_id'];
//                $post_title =$row['post_title'];
//                echo"<td><a href='../post.php?p_id={$post_id}'>{$post_title}</a></td>";
//                
                echo"<td><a href='users.php?source=edit_user&edit_user={$user_id}'>EDIT</a></td>";
                echo"<td><a href='users.php?delete={$user_id}'>DELETE</a></td>";
                echo"</tr>";
                
            }
        ?>

    </tbody>
</table>


<!-- DELETE/APPROVE/UNAPPROVE COMMENT PHP -->
<?php




////////////////// ..................................... TO DO ................ /////////////////////////////////////////////
//    if(isset($_GET['user_role'])){
//        $change_role_id = $_GET['user_role'];
//        $new_user_role = $_GET['']
//        
//        $query3 = "UPDATE users SET user_role='Approved' WHERE user_id={$change_role_id}";
//        $approve_query = mysqli_query($connection, $query3);
//        header("Location:comments.php");
//    }
////////////////// ..................................... TO DO ................ /////////////////////////////////////////////





    if(isset($_GET['delete'])){
        $delete_user_id = $_GET['delete'];
        
        $query3 = "DELETE FROM users WHERE user_id = {$delete_user_id}";
        $delete_query = mysqli_query($connection, $query3);
        
    
            
        header("Location:users.php");
    }
?>













