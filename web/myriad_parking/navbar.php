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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="../libraries/jquery.redirect.js"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="import" href="navbar.php" id="templates">
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="navbar-brand" href="index.php">Myriad Parking</a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="spots.php">Find A Spot</a>
            </li>
        </ul>
        <ul class="nav navbar-nav ml-auto">
            <?php
                if (!isset($authorized) || !$authorized) {
                    echo '<a class="nav-link"  href="register.php">Register</a>';
                    echo '<a class="nav-link"  href="login.php">Login</a>';
                    $_SESSION['authorized'] = false;
                } else {
                    echo '<li class="nav-item"><a class="nav-link" href="account.php">My Account</a></li>';
                    echo '<li class="nav-item"><a class="nav-link" href="logout.php">Sign Out</a></li>';
                }
            ?>
        </ul>
    </nav>
    <div class="jumbotron">
        <h1>Welcome to Myriad Parking Application</h1>
        <p>Finding Parking Should'nt Be That Hard</p>
    </div>
</body>

</html>


