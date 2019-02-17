<?php
    session_start();
    include_once ('navbar.php');
    include '../dbconect.php';

    $authorized = $_SESSION['authorized'];
    if (!isset($authorized) || !$authorized){
        header('Location: login.php');
    }
    $db = getDBConnection();
?>


<html>

<head>


</head>

<body>
    <div class="container">
        <div class="card" style="width:400px">
            <img class="card-img-top" src="../photos/myriad.png" alt="Card image">
            <div class="card-body">
                <?php
                $username = $_SESSION['user_name'];
                $name = $_SESSION['name'];
                $email = $_SESSION['email'];
                $spot_id = $_SESSION['spot_id'];
                echo"<h4 class='card-title'>$name</h4>";
                echo"<p class='card-text'>";
                echo"Username: $username<br>";
                echo"Email: $email<br>";
                echo"</p>";
                ?>
            </div>
        </div>
    </div>
</body>

</html>