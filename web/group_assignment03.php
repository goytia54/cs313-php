<html>
<head>


</head>

<body>

<form method="post" action="gp_03.php">
    <input type="text" name="name" placeholder="Name">
    <br>
    <input type="text" name="email" placeholder="Email">
    <br>

    <?php
        $majors = array('Computer Science', 'Web Design and Development','Computer Information Technology'
        ,'Computer Engineering');

        foreach ($majors as $major){
            echo "<input type='radio' name='major' value='$major'>$major<br>";
        }
    ?>
    <!--    <input type="radio" name="major" value="Computer Science">Computer Science-->
<!--    <br>-->
<!--    <input type="radio" name="major" value="Web Design and Development">Web Design and Development-->
<!--    <br>-->
<!--    <input type="radio" name="major" value="Computer Information Technology">Computer Information Technology-->
<!--    <br>-->
<!--    <input type="radio" name="major" value="Computer Engineering">Computer Engineering-->
    <br>
    <textarea name="comment"></textarea>
    <br>
    <input type="checkbox" name="continents[]" value="na">North America
    <br>
    <input type="checkbox" name="continents[]" value="sa">South America
    <br>
    <input type="checkbox" name="continents[]" value="eu">Europe
    <br>
    <input type="checkbox" name="continents[]" value="asia">Asia
    <br>
    <input type="checkbox" name="continents[]" value="aus">Australia
    <br>
    <input type="checkbox" name="continents[]" value="afr">Africa
    <br>
    <input type="checkbox" name="continents[]" value="ant">Antarctica
    <br>
    <input type="submit" value="Submit">
</form>

</body>

</html>

