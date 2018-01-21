<?php  include "includes/admin_header.php"?>

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
                            <small>Author</small>
                        </h1>
                        
                        <div class="col-xs-6">
                          
                           <!--ADD CATEGORY-->
                           <?php 
                                insertCategory(); 
                            ?>
                            
                            <!--DELETE CATEGORY-->
                            <?php 
                                 deleteCategory();
                            ?>
                           
                            <!--ADD CATEGORY HTML-->
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat-title">Add category</label>
                                    <input type="text" class="form-control" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="ADD">
                                </div>
                            </form>
                            
                            
                            <!-- UPDATE CATEGORY FORM Will Appear -->
                            <?php  
                                updateCategory();
                            ?>
                            
                            
                        </div>
                        
                        <!-- CATEGORY TABLE HTML-->
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover text-center" >
                                <thead>
                                    <tr>
                                        <th class="text-center">Id</th>
                                        <th class="text-center">Category</th>
                                        <th class="text-center">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    <!--FETCH ALL CATEGORIES-->
                                    <?php
                                        findAllCategories();
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>
                        
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