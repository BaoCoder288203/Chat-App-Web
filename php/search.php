<?php 

session_start();

include_once 'config.php';

$outgoing_id = $_SESSION['unique_id'];
// Kiểm tra xem searchTerm có tồn tại không
if (isset($_POST['searchTerm'])) {
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
} else {
    $searchTerm = ''; // Có thể gán giá trị mặc định hoặc xử lý lỗi tại đây
}

$sql = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} AND (fname LIKE '%{$searchTerm}%'
            OR lname LIKE '%{$searchTerm}%')";

$output = "";

$query = mysqli_query($conn, $sql);
if(mysqli_num_rows($query) > 0)
{
    include_once 'data.php';
}else{
    $output .= 'No users found!';
}

echo $output;
?>