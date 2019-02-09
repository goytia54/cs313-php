<?php
    session_start();
    $authorized = $_SESSION['authorized'];
?>
<html>
<head>
    <title>Myriad Parking</title>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="import" href="navbar.php" id="templates">
</head>
<body>
    <div class="container">
        <h1>Myriad Parking</h1>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="spots.php">Find A Spot</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="groups.php">Search Groups</a>
            </li>
            <li class="nav-item">
            <?php
                if (!isset($authorized) || !$authorized) {
                    echo '<a class="nav-link"  href="login.php">Login</a>';
                    $_SESSION['authorized'] = false;
                } else {
                    echo '<a class="nav-link" href="account.php">My Account</a>';
                }
            ?>
            </li>

        </ul>
    </div>
</body>

<style>

</style>

</html>
