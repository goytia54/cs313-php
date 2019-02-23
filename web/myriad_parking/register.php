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
            <form class="form-horizontal" action="register.php" method="post">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="username">Username:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" placeholder="I.e myriadboss, 6 characters or more" name="username">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="first-name">First Name:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="first-name" placeholder="Enter a first name, 2 characters or more" name="first-name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="last-name">Last Name:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="last-name" placeholder="Enter a last name, 2 characters or more" name="last-name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Email:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" placeholder="I.e. someone@myriad.com" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Password:</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password, 8 characters or more" name="pwd">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="confirmpwd">Confirm Password:</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="confirmpwd" placeholder="Confirm password" name="confirmpwd">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                </div>
                <?php
                if($_SERVER['REQUEST_METHOD'] === 'POST'){
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $firstName = $_POST['first-name'];
                    $lastName = $_POST['last-name'];
                    $pwd = $_POST['pwd'];
                    $confirmpwd = $_POST['confirmpwd'];
                    $error = null;

                    //see if username or email exists
                    $user_data = $db->query("SELECT * FROM myriad_parking.parking_users WHERE email = '$email' or user_name = '$username' order by user_id");
                    if($user_data->rowCount() > 0){

                        foreach ($user_data as $user_row) {
                            $exist_username = (string)$user_row['user_name'];
                            $exist_email = (string)$user_row['email'];

                            if (strcmp($exist_username, $username) === 0) {
                                $error = "Username is not available, please choose another";
                                break;
                            } else if (strcmp($email, $exist_email) === 0) {
                                $error = "Email is not available, please choose another";
                                break;
                            }
                        }
                    }

                    else if(strlen($username) < 6){
                        $error = "Username is not long enough";
                    }
                    else if(strlen($firstName) < 2 ){
                        $error = "First Name is not long enough";
                    }

                    else if (strlen($lastName) < 2){
                        $error = "Last Name is not long enough";
                    }
                    else if(strlen($pwd) < 8){
                        $error = "Password should be 8 characters or longer";
                    }
                    else if( $pwd != $confirmpwd ){
                        $error = "Passwords don't match";
                    }

                    if(isset($error))
                    {
                        echo "<div class='alert alert-danger'><strong>$error</strong></div>";
                    }
                    else{
                        $sql = "INSERT INTO myriad_parking.parking_users (user_name, first_name, last_name, email, password) values(?,?,?,?,?)";
                        $hashedPwd = password_hash($pwd,PASSWORD_DEFAULT);
                        $db->prepare($sql)->execute([$username,$firstName,$lastName,$email,$hashedPwd]);
                        $_SESSION['authorized'] = true;
                        $row = $user_data->fetch();
                        $_SESSION['user_name'] = $username;
                        $_SESSION['name'] = $firstName . ' ' . $lastName;
                        $_SESSION['email'] = $email;
                        $_SESSION['spot_id'] = '';
                        header('Location: account.php');
                    }
                }
                ?>

            </form>
        </div>

    </body>
</html>

