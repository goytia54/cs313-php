<?php
    include 'dbtest.php';

    $db = getDBConnection();
    foreach ($db->query('SELECT * FROM myriad_parking.PARKING_USERS') as $row)
    {
        echo 'user: ' . $row['user_id'];
        echo ' password: ' . $row['user_name'];
        echo '<br/>';
    }
