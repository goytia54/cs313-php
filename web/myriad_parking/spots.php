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
    foreach ($db->query('SELECT * FROM myriad_parking.PARKING_SPOTS') as $row)
    {
        $active = $row['active_flag'];
        $available = $row['available'];
        if($active == 1 && $available == 1){
            $building = $row['build_id'];
            $spot_number = $row['spot_number'];
            $level = $row['level'];
            echo '<li class="list-group-item">'.$building. '-'.$level.'-'.$spot_number.'-'.'</li>';
        }
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