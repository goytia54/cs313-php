<?php
session_start();
$selected = $_SESSION['quantities'];

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $deleted = $_POST['deleted'];
    foreach ($selected as $selection => $quantity) {
        if($_SESSION['quantities'][$selection] > 0 && isset($deleted) && in_array($selection, $deleted ) ){
            $_SESSION['quantities'][$selection] -= 1;
        }
    }
    $selected = $_SESSION['quantities'];
}
?>


<?php
    echo "<a href='browse.php'>Browse Memes</a>";
    echo "<form method='post' action='cart.php'><input type='submit' value='Remove from Cart'><br>";
    $totalquant = 0;
    foreach ($selected as $selection => $quantity) {
        if($quantity !== 0){
            echo "<input type='checkbox' name='deleted[]' value='$selection'>$selection meme ($quantity)<br>";
            $totalquant += 1;
        }
    }
    echo"</form>";
    if(isset($selected) and $totalquant > 0)
        echo"<a href='checkout.php'>Continue To Checkout</a>";
    else {
        echo"No Items in Cart, add items to checkout";
    }
?>

<?php

?>

