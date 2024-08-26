<?php 
session_start();
include_once 'php/config.php';
if(isset($_SESSION['unique_id'])){
    header("location: login.php");
}
include_once "header.php";
?>

<body>
    <div class="wrapper">
        <section class="form signup">
            <h1>RealTime Chat</h1>
            <form action="users.php" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="error-text"></div>
                <div class="name-details">
                    <div class="field input">
                        <label for="">First Name</label>
                        <input type="text" name="fname"
                        placeholder="First Name" required>
                    </div>
                    <div class="field input">
                        <label for="">Last Name</label>
                        <input type="text" name="lname"
                        placeholder="Last Name" required>
                    </div>
                </div>
                <div class="field input">
                    <label for="">Email Address</label>
                    <input type="text" name="email" 
                    placeholder="Enter your email" required>
                </div>
                <div class="field input">
                    <label for="">Password</label>
                    <input type="password" name="password"
                    placeholder="Enter New Password" required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field image">
                    <label for="">Profile Image</label>
                    <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
                </div>
                <div class="field button">
                    <input type="submit" name="submit" value="Continue to Chat">
                </div>

                <div class="link">
                    Already signed up? <a href="login.php">Login now</a>
                </div>

            </form>
        </section>
    </div>

    <script type="text/javascript" src="js/show-hide-pass.js"></script>
    <script type="text/javascript" src="js/signup.js"></script>
</body>

</html>