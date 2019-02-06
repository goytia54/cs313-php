<?php
    include_once ('navbar.php');
    include 'dbconect.php';
    $db = getDBConnection();

?>


<html>

    <head></head>
    <body>
        <div id="group-div">
            <?php echo '<ul class="list-group">';
                foreach ($db->query('SELECT * FROM myriad_parking.GROUPS') as $row)
                {
                $group = $row['group_name'];
                echo '<li class="list-group-item">' .$group . '</li>';
                }
                echo '</ul>';
            ?>
        </div>

    </body>
    <style>
        #group-div{
            width: 200px;
            height: 300px;
        }
    </style>
</html>
