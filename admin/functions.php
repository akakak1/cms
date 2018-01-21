<?php  



function confirm($result){
    
    global $connection;
    
    if(!$result){
        die("QUERY FAILED." . mysqli_error($connection));
    }
}


function insertCategory(){
    
    global $connection;
    
    if(isset($_POST['submit'])){
        $cat_title = $_POST['cat_title'];
        if($cat_title == "" || empty($cat_title)){
            echo "This field should not be empty";
        } else {
            $query = "INSERT INTO categories(cat_title) ";
            $query .= "VALUE('{$cat_title}')";
            $create_category = mysqli_query($connection, $query);

            if(!$create_category){
                die("QUERY FAILED" . mysqli_error($connection));
            }
        }

    }                        
}


function findAllCategories(){
    
    global $connection;
    
    $query = "SELECT * FROM categories";
    $all_categories = mysqli_query($connection,$query);

    while($row = mysqli_fetch_assoc($all_categories)){
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo"<tr>";
        echo"<td>{$cat_id}</td>";
        echo"<td>{$cat_title}</td>";
        echo"<td><a class='btn btn-info' href='categories.php?delete={$cat_id}'>DELETE</a></td>";
        echo"<td><a class='btn btn-info' href='categories.php?update={$cat_id}'>UPDATE</a></td>";
        echo"</tr>";
    }
    
}


function deleteCategory(){
    
    global $connection;
    
    if(isset($_GET['delete'])){
         $delete_id = $_GET['delete'];
         $query= "DELETE FROM categories WHERE cat_id={$delete_id}";
         $delete_query = mysqli_query($connection, $query);
         header("Location:categories.php");  // Will refresh the page //dont forget to use ob_start
     }
}


function updateCategory(){
    
    global $connection;
    
    if(isset($_GET['update'])){
        include "includes/update_categories.php";
    }
}


?>