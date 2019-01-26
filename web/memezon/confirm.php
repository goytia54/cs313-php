<?php
    session_start();
    $selected = $_SESSION['quantities'];
?>

<?php

    $name = $_POST['first-name'] . ' ' . $_POST['last-name'];
    $address = $_POST['street'] . ' ' . $_POST['city'] . ',' . $_POST['state'] . ' ' . $_POST['zip'];
    echo "<p>Thank you for your purchase!</p>";
    echo "<p>$name<br>$address</p>";

    foreach ($selected as $selection => $quantity) {
        if($quantity !== 0){
            echo "<p>$selection meme($quantity)</p>";
        }
    }
    $_SESSION['quantities'] = array('river' => 0, 'snoop' => 0, 'thanos' => 0, 'office' => 0);

?>