<?php
include_once ('navbar.php');
include '../dbconect.php';
$db = getDBConnection();

?>


<html>

<head></head>
<body>
    <div class="container">
        <h1>Find A Spot<small>Pick a spot, any spot!</small></h1>
        <div id="group-div">
        <?php
        foreach ($db->query('select * from myriad_parking.parking_spots inner join myriad_parking.buildings
    on parking_spots.build_id = buildings.building_id') as $row)
        {
            $active = $row['active_flag'];
            $available = $row['available'];
            if($active == 1 && $available == 1){
                $building = $row['building_name'];
                $spot_number = $row['spot_number'];
                $level = $row['level'];
                echo '<a href="#" class="list-group-item list-group-item-action">'.$building.'-L'.$level.'-S'.$spot_number.'</a>';
            }
        }
        ?>
        </div>
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