<?php 
session_start();

include_once 'config.php';

$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_escape_string($conn, $_POST['password']);

if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password) ){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE
        email = '$email'");
        if($sql->num_rows > 0){
            echo "$email - This email already exist!";
        }else{
            if(isset($_FILES['image'])){
                $img_name = $_FILES['image']['name'];
                $img_type = $_FILES['image']['type'];
                $tmp_name = $_FILES['image']['tmp_name'];

                $img_explode = explode('.', $img_name);
                $img_ext = end($img_explode);
                $extensions = array("jpeg", "jpg", "png", "gif");

                if(in_array($img_ext, $extensions) === false){
                    echo "Please select an image file - jpeg, jpg, png, gif.";
                }else{
                    $type = ["image/jpeg","image/jpg","image/png","image/gif"];
                    if(in_array($img_type, $type) === true){
                        $time = time();
                        $new_image_name = $time.$img_name;

                        if(move_uploaded_file($tmp_name, "images/".$new_image_name)){
                            $ran_id = rand(time(), 100000000);
                            $status = "Online";
                            $encrypt_pass = md5($password);

                            $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status)
                                VALUES ({$ran_id}, '{$fname}','{$lname}','{$email}','{$encrypt_pass}','{$new_image_name}','{$status}') ");

                            if($insert_query){
                                $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");

                                if($select_sql2->num_rows > 0){
                                    $result = mysqli_fetch_assoc($select_sql2);
                                    $_SESSION['unique_id'] = $result['unique_id'];
                                    echo 'success';
                                }
                            }else{
                                echo "Something went wrong, Please try again!";
                            }

                        }else{
                            echo "Something went wrong. Please try again! ";
                        }
                    }else{
                        echo "Please select an image file - jpeg, jpg, png, gif.";
                    }
                }
            }
        }
    }else{
        echo "$email in not a valid email!";
    }
}else{
    echo "Please fill in all fields";
}

?>