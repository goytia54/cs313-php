<?php
    include_once('navbar.php');
    include '../dbconect.php';
    session_start();
    $authorized = $_SESSION['authorized'];
    $db = getDBConnection();
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['add-spot']) && isset($authorized) && $authorized ){
            $data = [
                'avail' => 0,
                'spot' => $_POST['add-spot']
            ];
            $spot_id = $_POST['add-spot'];
            $sql = "update myriad_parking.PARKING_SPOTS SET available = :avail  where spot_id = :spot";
            $db->prepare($sql)->execute($data);

            $sql = "update myriad_parking.PARKING_MAPPING SET spot_id = ? where user_id = ?";
            $db->prepare($sql)->execute([$_POST['add-spot'],$_SESSION['user_id']]);
            $_SESSION['spot_id'] = $spot_id;

            header('Location: index.php');
        }
        else if(!isset($authorized) || !$authorized ) {
            header('Location: login.php');
        }
    } else {
        header('Location: spots.php');
    }

?>

<html>
<head>

</head>
<body>
    <div class="container">
        <form action="reserve_spot.php" method="post">


            <?php
            $spot = intval(explode('-',$_POST['spot'])[1]);
            $sql = "select * from myriad_parking.PARKING_SPOTS inner join myriad_parking.BUILDINGS on parking_spots.build_id = buildings.building_id where myriad_parking.PARKING_SPOTS.SPOT_ID = '$spot';";
            $spotData = $db->query($sql);
            $row = $spotData->fetch();
            $building = $row['building_name'];
            $spot_number = $row['spot_number'];
            $level = $row['level'];
            echo '<h3>Reserve '. $building . ' L-'.$level . ' S-' . $spot_number . '?</h3>';
            echo '<button name="add-spot" class="btn btn-primary" value="'.
                $spot
                .'" type="submit">Reserve Spot</button>'
            ?>
            <a href="spots.php" class="btn btn-danger" role="button">Cancel</a>
        </form>
    </div>

</body>
</html>
