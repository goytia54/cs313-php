<?php
    session_start();
    include_once ('navbar.php');
    include '../dbconect.php';
    $db = getDBConnection();
    $authorized = $_SESSION['authorized'];
    if (isset($authorized) && $authorized){
        header('Location: account.php');
}
?>

<html>
<head>

</head>
<body>
    <div class="container">
        <form class="form-horizontal" action="login.php" method="post">
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email:</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Password:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Submit</button>
                </div>
            </div>
            <?php
                $email = $_POST['email'];
                $pwd = $_POST['pwd'];
                if(isset($email) && isset($pwd)) {
                    echo '<div class="alert alert-danger"><strong>Incorrect Email or Password! Try again.</strong></div>';
                }
            ?>

        </form>
    </div>

    <?php
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        $user_data = $db->query("SELECT * FROM myriad_parking.parking_users WHERE email = '$email' and password = '$pwd'");
        if ($user_data->rowCount() == 1){
            $_SESSION['authorized'] = true;
            $row = $user_data->fetch();
            $_SESSION['user_name'] = $row['user_name'];
            $_SESSION['name'] = $row['first_name'] . ' ' . $row['last_name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['spot_id'] = $row['spot_id'];
            header('Location: spots.php');
        }
    ?>
</body>
</html>
