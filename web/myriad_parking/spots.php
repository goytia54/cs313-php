<?php
include_once ('navbar.php');
include '../dbconect.php';
$db = getDBConnection();

?>


<html>

<head></head>
<body>
<div id="group-div">
    <?php echo '<ul class="list-group">';
    foreach ($db->query('select * from myriad_parking.parking_spots inner join myriad_parking.buildings
on parking_spots.build_id = buildings.building_id') as $row)
    {
        $active = $row['active_flag'];
        $available = $row['available'];
        if($active == 1 && $available == 1){
            $building = $row['building_name'];
            $spot_number = $row['spot_number'];
            $level = $row['level'];
            echo '<li class="list-group-item">'.$building.'-L'.$level.'-S'.$spot_number.'</li>';
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
        margin-left: 100px;
    }
</style>
</html>