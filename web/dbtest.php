<?php
    try
    {
        $dbUrl = getenv('DATABASE_URL');
        $dbOpts = parse_url($dbUrl);

        $dbHost = $dbOpts["host"];
        $dbPort = $dbOpts["port"];
        $dbUser = $dbOpts["user"];
        $dbPassword = $dbOpts["pass"];
        $dbName = ltrim($dbOpts["path"],'/');

        $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $ex)
    {
        echo 'Error!: ' . $ex->getMessage();
        $user = 'postgres';
        $password = 'yud72heo';
        $db = new PDO('pgsql:host=localhost;dbname=mydb', $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    foreach ($db->query('SELECT * FROM myriad_parking.PARKING_USERS') as $row)
    {
        echo 'user: ' . $row['user_id'];
        echo ' password: ' . $row['user_name'];
        echo '<br/>';
    }

?>