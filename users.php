<?php 
    session_start();

    include_once 'php/config.php';
    if(!isset($_SESSION['unique_id'])){
        header("location: login.php");
    }
    include_once 'header.php';
?>

<body>
    <div class="wrapper">
        <section class="users">
        <?php
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");

            if($sql->num_rows > 0){
                $row = $sql->fetch_assoc();
            }
                $fullname = $row['lname'] . $row['fname'];
        ?>
            <h1>
                <div class="content">
                    <img src="php/images/<?= $row['img']?>" alt="">
                        <div class="details">
                            <span><?= $fullname?></span>
                            <p><?= $row['status']?></p>
                        </div>
                </div>
                <a href="php/logout.php?logout_id=<?= $row['unique_id'];?>" class="logout">Logout</a>
   
            </h1>
            <div class="search">
                <span class="text">Select an user to start chat</span>
                <input type="text" placeholder="Enter your name to search...">
                <button><i class="fas fa-search"></i></button>
            </div>
            <div class="users-list">

            </div>
        </section>
    </div>

    <script src="js/users.js"></script>
</body>
</html>