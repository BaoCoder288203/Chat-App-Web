<?php 
session_start();

include_once 'config.php';


$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if(!empty($email) && !empty($password)){
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
    if($sql->num_rows > 0){
        $row = mysqli_fetch_assoc($sql);
        $user_pwd = md5($password);
        $enc_pwd = $row['password'];

        if($user_pwd === $enc_pwd){
            $status = "Online";
            $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']} ");
            if($sql2){
                $_SESSION['unique_id'] = $row['unique_id'];
                echo "success";
            }
        }else{
            echo "Email or Password is Incorrect!";
            // header("location: ../login.php");
        }
    }else{
        echo "$email not found";
        // header("location: ../login.php");
    }
}else{
    echo "All input fields are required!";
    // header("location: ../login.php");
}

?>