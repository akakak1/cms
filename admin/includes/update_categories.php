   <!-- UPDATE CATEGORY FORM FILL -->
    <?php  

        if(isset($_GET['update'])){

            $cat_id_update = $_GET['update'];

            $query = "SELECT * FROM categories WHERE cat_id={$cat_id_update}";
            $update_categories = mysqli_query($connection,$query);

            $row = mysqli_fetch_assoc($update_categories); //No need of while loop here. we have only one row
            $cat_title_update = $row['cat_title'];
        }
      ?>

    <?php 

        if(isset($_POST['update_cat'])){
             $update_cat_id = $_GET['update'];
             $update_cat_title = $_POST['update_cat_title'];

             $query2="UPDATE categories SET cat_title='{$update_cat_title}' WHERE cat_id={$update_cat_id}";
             $delete_query = mysqli_query($connection,$query2);

             if(!$delete_query){
                    die("QUERY FAILED" . mysqli_error($connection));
                }
            header("Location:categories.php");
        }
    ?>


    <!--UPDATE CATEGORY HTML-->
    <form action="" method="post">
        <div class="form-group">
          <label for="cat-title">Update category</label>
          <input value="<?php if(isset($cat_title_update)){ echo $cat_title_update;}; ?>"
                           type="text" class="form-control" name="update_cat_title">
        </div>
        <div class="form-group">
           <input class="btn btn-primary" type="submit" name="update_cat" value="UPDATE">
        </div>
    </form>