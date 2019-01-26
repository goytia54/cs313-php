<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Checkout</title>
</head>
<body>
    <h1>Checkout Details</h1>
    <a href="cart.php">Back to Cart</a><br><br>
    <form action="confirm.php" method="post">
        <input type="text" name="first-name" placeholder="First Name">
        <input type="text" name="last-name" placeholder="Last Name"><br><br>
        <input type="text" name="street" placeholder="Street"><br><br>
        <input type="text" name="city" placeholder="City">
        <input type="text" name="state" placeholder="State"><br><br>
        <input type="text" name="zip" placeholder="Zip Code"><br>
        <input type="submit">
    </form>

</body>
</html>
