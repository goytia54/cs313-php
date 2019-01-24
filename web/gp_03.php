


<html>
<head>


</head>
<body>
<?php
$username = $_POST['name'];
$email = $_POST['email'];
$major = $_POST['major'];
$comments = $_POST['comment'];
$continents = $_POST['continents'];

$contMap = array('na'=>'North American','sa'=>'South American', 'eu'=>'Europe', 'asia'=>'Asia', 'afr'=>'Africa',
    'ant'=>'Antarctica', 'aus'=>'Australia');


echo "$username<br>";
echo "$email<br>";
echo "$major<br>";
echo "$comments<br>";
foreach ($continents as $con) {
    echo "$contMap[$con]<br>";
}

?>

</body>
</html>
