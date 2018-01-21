<table class="table table-bordered table-hover text-center">
    <thead>
        <tr>
            <th class="text-center">Id</th>
            <th class="text-center">Author</th>
            <th class="text-center">Content</th>
            <th class="text-center">Email</th>
            <th class="text-center">Status</th>
            <th class="text-center">In Response to</th>
            <th class="text-center">Date</th>
            <th class="text-center">Approve</th>
            <th class="text-center">Unapprove</th>
            <th class="text-center">Delete</th>
        </tr>
    </thead>
    <tbody>
        
        <!--READ ALL COMMENTS PHP-->
        <?php
            $query = "SELECT * FROM comments ORDER BY comment_id DESC";
            $all_comments = mysqli_query($connection,$query);

            while($row = mysqli_fetch_assoc($all_comments)){
                $comment_id = $row['comment_id'];
                $comment_post_id = $row['comment_post_id'];
                $comment_author = $row['comment_author'];
                $comment_email = $row['comment_email'];
                $comment_content = $row['comment_content'];
                $comment_status = $row['comment_status'];
                $comment_date = $row['comment_date'];
                

                echo"<tr>";
                echo"<td>{$comment_id}</td>";
                echo"<td>{$comment_author}</td>";
                echo"<td>{$comment_content}</td>";
                echo"<td>{$comment_email}</td>";
                echo"<td>{$comment_status}</td>";
                
                // QUERY TO GET THE POST info RELATED TO THE POST
                $query = "SELECT * FROM posts WHERE post_id= {$comment_post_id}";
                $related_post = mysqli_query($connection, $query);
                $row = mysqli_fetch_assoc($related_post);
                $post_id= $row['post_id'];
                $post_title =$row['post_title'];
                echo"<td><a href='../post.php?p_id={$post_id}'>{$post_title}</a></td>";
                
                echo"<td>{$comment_date}</td>";
                echo"<td><a href='comments.php?approve={$comment_id}'>APPROVE</a></td>";
                echo"<td><a href='comments.php?unapprove={$comment_id}'>UNAPPROVE</a></td>";
                echo"<td><a href='comments.php?delete={$comment_id}'>DELETE</a></td>";
                echo"</tr>";
            }
        ?>

    </tbody>
</table>


<!-- DELETE/APPROVE/UNAPPROVE COMMENT PHP -->
<?php   

    if(isset($_GET['approve'])){
        $approve_comment_id = $_GET['approve'];
        
        $query3 = "UPDATE comments SET comment_status='Approved' WHERE comment_id={$approve_comment_id}";
        $approve_query = mysqli_query($connection, $query3);
        header("Location:comments.php");
    }
    

    
    if(isset($_GET['unapprove'])){
        $unapprove_comment_id = $_GET['unapprove'];
        
        $query3 = "UPDATE comments SET comment_status='Unapproved' WHERE comment_id={$unapprove_comment_id}";
        $unapprove_query = mysqli_query($connection, $query3);
        header("Location:comments.php");
    }



    if(isset($_GET['delete'])){
        $delete_comment_id = $_GET['delete'];
        
        $query3 = "DELETE FROM comments WHERE comment_id={$delete_comment_id}";
        $delete_query = mysqli_query($connection, $query3);
        
        $query6 = "UPDATE posts SET post_comment_count = post_comment_count-1 WHERE post_id={$post_id}";
        mysqli_query($connection, $query6);
            
        header("Location:comments.php");
    }
?>













