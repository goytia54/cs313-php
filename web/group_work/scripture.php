<html>
    <head>

    </head>
    <body>
    <?php
    include '../dbconect.php';

    try {
        $db = getDBConnection();
    }
    catch(Exception $exception){
        echo $exception->getMessage();
    }

    $searchBook = $_GET['book'];

    foreach ($db->query("select * from public.SCRIPTURES where book = '$searchBook'") as $row){
        $book = $row['book'];
        $chapter = $row['chapter'];
        $verse = $row['verse'];
        $content = $row['content'];
        $id = $row['id'];
        echo '<a href="scrip_details.php?id=' .$id. '">' . $book. ' '.$chapter.':'. $verse. '</a><br>';
    };
    ?>

    <form method="GET" action="scripture.php">
        <input type="text" name="book">

        <button type="submit">Submit</button>
    </form>

    </body>

</html>

