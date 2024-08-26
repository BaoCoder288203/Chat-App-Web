<?php 
session_start();

require_once 'header.php';
if(isset($_SESSION['unique_id'])){
    header("location: users.php");
}
?>

<body>
    <div class="wrapper">
        <section class="form login">
            <h1>Realtime Chat App</h1>
            <form action="php/login.php" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="error-text"><?= $_SESSION['error']?></div>

                <div class="field input">
                    <label for="">Email Address</label>
                    <input type="text" name="email" placeholder="Enter Your Email" required>
                </div>
                <div class="field input">
                    <label for="">Password</label>
                    <input type="password" name="password" placeholder="Enter Your Password" required>
                    <i class="fas fa-eye"></i>
                </div>

                <div class="field button">
                    <input type="submit" name="submit" value="Continue to Chat">
                </div>
            </form>
            <div class="link">Not yet signed up?<a href="index.php">Signup now</a></div>
        </section>
    </div>
    <script type="text/javascript" src="js/show-hide-pass.js"></script>
    <script type="text/javascript" src="js/login.js"></script>
</body>
</html>