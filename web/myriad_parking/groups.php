<?php
    include 'dbconect.php';
    $db = getDBConnection();

    foreach ($db->query('SELECT * FROM myriad_parking.GROUPS') as $row)
    {
        echo 'groups: ' . $row['group_name'];
        echo '<br/>';
    }

    ?>