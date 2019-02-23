<?php
include_once ('navbar.php');
include '../dbconect.php';
$db = getDBConnection();

?>


<html>

<head></head>
<body>
    <div class="container">

        <?php

            if(!isset($_SESSION['spot_id'])) {

                echo'<h1>Find A Spot <small>Pick a spot, any spot!</small></h1>';
                echo'<div id="group-div">';
                foreach ($db->query('select * from myriad_parking.parking_spots inner join myriad_parking.buildings
            on parking_spots.build_id = buildings.building_id') as $row) {
                    $active = $row['active_flag'];
                    $available = $row['available'];
                    if ($active == 1 && $available == 1) {
                        $building = $row['building_name'];
                        $spot_number = $row['spot_number'];
                        $spot_id = $row['spot_id'];
                        $level = $row['level'];
                        echo '<a name="spot-' . $spot_id . '" href="#" class="spots list-group-item list-group-item-action">' . $building . '-L' . $level . '-S' . $spot_number . '</a>';
                    }
                }
                echo '</div>';
            }
            else {
                $spot_id = $_SESSION['spot_id'];
                $sql = "select * from myriad_parking.PARKING_SPOTS inner join myriad_parking.BUILDINGS on parking_spots.build_id = buildings.building_id where myriad_parking.PARKING_SPOTS.SPOT_ID = '$spot_id';";
                $spotData = $db->query($sql);
                $row = $spotData->fetch();
                $building = $row['building_name'];
                $spot_number = $row['spot_number'];
                $level = $row['level'];

                echo "<h1>You already have a spot at: " . $building .' L-'. $level . ' S-'. $spot_number.  "</h1>";
            }
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

<script>
    $(function(){
        $(".spots").click(function (event) {
            $.redirect('reserve_spot.php',{spot: event.target.name})
        })
    });

</script>
</html>