<?php include "db.php"; ?>
<?php session_start() ; ?>


<?php

if(isset($_POST['login'])) {
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);
    
    $query = "SELECT * FROM users WHERE username = '{$username}'";
    $select_user_query = mysqli_query($connection, $query);
    
    if(!$select_user_query) {
        die("QUERY FAILED". mysql_error($connection));
    }
    
    while($row = mysqli_fetch_array($select_user_query)){

        $db_user_id = $row['user_id'];
        $db_username = $row['username'];
        $db_user_password = $row['user_password'];
        $db_user_firstname = $row['user_firstname'];
        $db_user_lastname = $row['user_lastname'];
        $db_user_role = $row['user_role'];

    }
    
    $password = crypt($password,$db_user_password);        // DOUBT ::::::: I think here we should take "randSalt" in place of   $db_user_password   ............. vvvvviiiiiii
                                                                                            // I tried, but its not working.
    
    
    if($username == $db_username && $password == $db_user_password) {        // TODO : username or password is wrong then display an error in the form.
        
        $_SESSION['username'] = $db_username;
        $_SESSION['firstname'] = $db_user_firstname;
        $_SESSION['lastname'] = $db_user_lastname;
        $_SESSION['user_role'] = $db_user_role;
        
        header("Location: ../admin");
    } else {
        header("Location: ../index.php");
    }
    
}
?>